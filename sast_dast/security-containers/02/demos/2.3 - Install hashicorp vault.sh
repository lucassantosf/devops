################################################################################
# COURSE:     DevOps Security: Security Best Practices
# MODULE:     Manage Sensitive Data
# DEMO:       Install HashiCorp Vault
# AUTHOR:     Antonio Jesus Piedra
################################################################################

# HashiCorp Vault is a widely used secret management tool.

# Official docs: https://developer.hashicorp.com/vault/install

# Get GPG key for HashiCorp Vault
wget -O - https://apt.releases.hashicorp.com/gpg | \
  sudo gpg --dearmor -o /usr/share/keyrings/hashicorp-archive-keyring.gpg

# Add HashiCorp to sources list
echo "deb [arch=$(dpkg --print-architecture) \
  signed-by=/usr/share/keyrings/hashicorp-archive-keyring.gpg] \
  https://apt.releases.hashicorp.com \
  $(grep -oP '(?<=UBUNTU_CODENAME=).*' /etc/os-release || lsb_release -cs) main" \
  | sudo tee /etc/apt/sources.list.d/hashicorp.list

# Update packages and install
sudo apt update && sudo apt install vault

# Run the vault server
vault server -dev &

# Export the vault token
export VAULT_TOKEN='<ROOT-TOKEN>'

# Export the vault address
export VAULT_ADDR='http://127.0.0.1:8200'

# Check connection
curl $VAULT_ADDR/v1/sys/health
