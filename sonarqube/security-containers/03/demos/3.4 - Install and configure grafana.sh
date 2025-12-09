################################################################################
# COURSE:     DevOps Security: Security Best Practices
# MODULE:     Respond to Security Incidents
# DEMO:       Install and Configure Grafana
# AUTHOR:     Antonio Jesus Piedra
################################################################################

# Install the grafana service
sudo apt-get install grafana -y

# Start grafana
sudo systemctl start grafana-server

# Check the status of the services
sudo systemctl status grafana-server -n 1 --no-pager

# Open the Grafana UI in the browser - http://localhost:3000
#  - Change the admin password (first time accessing)
#  - Configure loki as datasource (http://localhost:3100)
