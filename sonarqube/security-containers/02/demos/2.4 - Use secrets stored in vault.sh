################################################################################
# COURSE:     DevOps Security: Security Best Practices
# MODULE:     Manage Sensitive Data
# DEMO:       Use Secrets Stored in Vault
# AUTHOR:     Antonio Jesus Piedra
################################################################################

# Using a secret management tool is the recommended approach for storing your
# secrets

# Store secrets in vault
vault kv put secret/database username="ps-user" password="vault-pass"

# For your app, you should create a token. To do this, create a Vault policy
# that grants only the necessary permissions to your application. Check the
# provided policy definition at vault-db-app-policy.hcl
# Note: The policy only gives read access over the secret/data/database path.

# Create the policy for the application
vault policy write db-app-policy vault-db-app-policy.hcl

# Ensure the policy has been created
vault policy list

# Once the policy is created, create a new token for the application using
# that policy. The new token will be able to read the database secret
vault token create -policy=db-app-policy

# Save the token in your host environment, we will then mount the token into
# the container for vault to use.
sudo mkdir -p /vault/tokens
sudo chmod -R 777 /vault/tokens
echo "<YOUR-TOKEN>" > /vault/tokens/db-app

# Before your app starts, your container will use the vault cli to obtain the
# secrets. To authenticate to vault, it will use the token created before.
# You need to tell vault things like where is the token stored or what secrets
# it needs to retrieve. For that, you will have a vault agent configuration.
# Check the vault-agent-config.hcl file

# Update the code for the app
    with open("/app/secrets/db_user") as f:
        username = f.read().strip()
    with open("/app/secrets/db_pass") as f:
        password = f.read().strip()

# Prepare the vault binary
cp /usr/bin/vault .

# Adjust the dockerfile to run the docker binary
  # Copy vault binary
  COPY vault /usr/local/bin/
  # Create directory to store token to connect to Vault
  RUN mkdir -p /vault/secrets
  # Copy the Vault Agent config
  COPY vault-agent-config.hcl /vault/config.hcl

# Adjust the entrypoint of the dockerfile to run vault first
ENTRYPOINT ["/bin/sh", "-c", "vault agent -config /vault/config.hcl & sleep 5 && python app.py"]

# Build the new container image
docker build -t db-app:0.0.3 .

# Run the application
docker run --name db-app-vault \
  -v /vault/tokens/db-app:/vault/secrets/token \
  --network "host" \
  -d db-app:0.0.3

# Check the container logs
docker logs db-app-vault

# Delete the container
docker rm -f db-app-vault
