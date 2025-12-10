################################################################################
# COURSE:     DevOps Security: Security Best Practices
# MODULE:     Respond to Security Incidents
# DEMO:       Install and Configure Falco
# AUTHOR:     Antonio Jesus Piedra
################################################################################

# Falco is an open-source runtime security tool that monitors system calls and
# detects abnormal behavior in containers, pods, and cloud-native environments.

# Download the falco GPG key
curl -fsSL https://falco.org/repo/falcosecurity-packages.asc | \
  sudo gpg --dearmor -o /usr/share/keyrings/falco-archive-keyring.gpg

# Add falco to sources.list
echo "deb [signed-by=/usr/share/keyrings/falco-archive-keyring.gpg] \
  https://download.falco.org/packages/deb stable main" | \
  sudo tee -a /etc/apt/sources.list.d/falcosecurity.list

# Run apt update to refresh the list of available packages
sudo apt-get update

# Install falco
sudo apt-get install -y falco

# Create a file for falco to save the events and update the perms
sudo touch /var/log/falco.json && sudo chmod 777 /var/log/falco.json

# Configure falco. Changes:
#  - file_output to be /var/log/falco.json
#  - json_output to be true
sudo vim /etc/falco/falco.yaml

# After doing the config changes, restart the falco service
sudo systemctl restart falco

# Ensure the service was successfully restarted and it's up and running
sudo systemctl status falco -n 1 --no-pager
