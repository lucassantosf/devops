################################################################################
# COURSE:     DevOps Security: Security Best Practices
# MODULE:     Respond to Security Incidents
# DEMO:       Install and Configure Promtail
# AUTHOR:     Antonio Jesus Piedra
################################################################################

# Promtail is a lightweight log collector developed by Grafana Labs, designed 
# to ship logs to Grafana Loki for centralized storage and analysis.

# Install Promtail
sudo apt-get install promtail -y

# Ensure the service is up
sudo systemctl status promtail -n 1 --no-pager

# Edit promtail config to scrape the falco logs
sudo vim /etc/promtail/config.yml

- job_name: falco
  static_configs:
    - targets:
      - localhost
      labels:
        job: falco
        __path__: /var/log/falco.json

# Restart promtail
sudo systemctl restart promtail

# Check status
sudo systemctl status promtail -n 1 --no-pager

