################################################################################
# COURSE:     DevOps Security: Security Best Practices
# MODULE:     Respond to Security Incidents
# DEMO:       Review Suspicious Activity
# AUTHOR:     Antonio Jesus Piedra
################################################################################

# Generate events
docker run -it --rm --privileged falcosecurity/event-generator run syscall --loop

# Sample event
docker run -it --rm --name pluralsight-hacker busybox:1.37 passwd

# Ensure falco is able to idenfity the suspicious activity
grep "pluralsight-hacker" /var/log/falco.json

# Open the Grafana UI in the browser - http://localhost:3000
#  - Ensure falco logs are present in Explorer
#  - Check Grafana logs drilldown page
#  - Create your own dashboard
