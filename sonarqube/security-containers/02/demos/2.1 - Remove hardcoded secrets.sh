################################################################################
# COURSE:     DevOps Security: Security Best Practices
# MODULE:     Manage Sensitive Data
# DEMO:       Remove Hardcoded Secrets
# AUTHOR:     Antonio Jesus Piedra
################################################################################

# The first step on securing your secrets is removing them in your code.

# In the sample application, the secrets are harcoded:
#  - App code: app.py

# Review the Dockerfile to be used for building your container image

# Build container image (change to the relevant directory if required)
docker build -t db-app:0.0.1 .

# Run the app
docker run --name db-app -d db-app:0.0.1

# Check logs. Credentials are printed to logs - Do NOT do this.
docker logs db-app

# Connect to container
docker exec -it db-app sh

# Check app code
cat /app/app.py

# Credentials are in the code. Avoid harcoding the secrets in your app, anyone
# with access to the Git repo can see them too!

# Disconnect from the container
exit

# Remove container
docker rm -f db-app
