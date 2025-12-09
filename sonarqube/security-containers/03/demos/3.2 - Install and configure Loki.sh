################################################################################
# COURSE:     DevOps Security: Security Best Practices
# MODULE:     Respond to Security Incidents
# DEMO:       Install and Configure Loki
# AUTHOR:     Antonio Jesus Piedra
################################################################################

# Loki is a log aggregation system designed for efficiency, scalability, and 
# tight integration with Grafana.

# Get the grafana GPG key
sudo mkdir -p /etc/apt/keyrings/ && \
  wget -q -O - https://apt.grafana.com/gpg.key | gpg --dearmor | \
  sudo tee /etc/apt/keyrings/grafana.gpg > /dev/null

# Add the grafana repository to sources.list
echo "deb [signed-by=/etc/apt/keyrings/grafana.gpg] https://apt.grafana.com \
  stable main" | sudo tee -a /etc/apt/sources.list.d/grafana.list

# Updates the list of available packages
sudo apt-get update

# Install loki
sudo apt-get install loki -y

# Edit the loki config
#  - Remove "enable_multi_variant_queries" as it's not supported by this version
sudo vim /etc/loki/config.yml

# Restart the loki service
sudo systemctl restart loki 

# Ensure the service is up
sudo systemctl status loki -n 1 --no-pager

# Check the service is ready - output should be "ready"
curl http://localhost:3100/ready
