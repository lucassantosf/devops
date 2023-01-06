# Open crontab with command:

sudo crontab -e

# Check logs of execution crontab:

grep CRON /var/log/syslog

# Indicate the periodicy, where the sh is (or other program), script path:

# Examples:

every minute

* * * * * /usr/bin/sh /home/lucas/Projects/devops/crontab/curl.sh

* * * * * /usr/bin/sh /home/lucas/Projects/devops/crontab/renew_certbot_certificates.sh

every midnight
0 0 * * * /home/ubuntu/renew_certbot_certificates.sh 

Crontab generator syntax:
https://crontab.cronhub.io