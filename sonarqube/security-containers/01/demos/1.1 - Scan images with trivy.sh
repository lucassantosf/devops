################################################################################
# COURSE:     DevOps Security: Security Best Practices
# MODULE:     Implement Container Security Best Practices
# DEMO:       Scan Images with Trivy
# AUTHOR:     Antonio Jesus Piedra
################################################################################

# TIP:
# If in VSCode, you can create a shortcut for "Run Selected Text in Active Terminal":
#  1. Open Command Palette: Ctrl + Shift + P
#  2. Set your desired key combination, like: Ctrl + Shift + R

# Official Trivy docs https://trivy.dev/latest/getting-started/installation

# Download the trivy public key and add it for apt-get to use
wget -qO - https://aquasecurity.github.io/trivy-repo/deb/public.key | \
  gpg --dearmor | sudo tee /usr/share/keyrings/trivy.gpg > /dev/null

# Add new repository to sources.list
echo "deb [signed-by=/usr/share/keyrings/trivy.gpg] \
   https://aquasecurity.github.io/trivy-repo/deb generic main" | \
   sudo tee -a /etc/apt/sources.list.d/trivy.list

# Update the list of packages after adding the new repository
sudo apt-get update

# Install trivy
sudo apt-get install trivy

# Scan image with Trivy
# First time may take a bit longer as it needs to download the vulnerability DB
trivy image golang:1.22-alpine

# Scan image with Trivy
trivy image golang:1.24-alpine

# When possible, try to use the lastest available image on dockerhub.
# For example: https://hub.docker.com/_/golang