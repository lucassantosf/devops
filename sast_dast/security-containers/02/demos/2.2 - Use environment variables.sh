################################################################################
# COURSE:     DevOps Security: Security Best Practices
# MODULE:     Manage Sensitive Data
# DEMO:       Use Environment Variables
# AUTHOR:     Antonio Jesus Piedra
################################################################################

# Instead of harcoding the secrets in your code, use environment variables that
# are defined when the container is started.

# Replace harcoded secrets in app.py with
    username = os.environ.get("DB_USER")
    password = os.environ.get("DB_PASS")

# Build the container image
docker build -t db-app:0.0.2 .

# Run the container passing the environment variables
docker run --name db-app-env \
  -e DB_USER="ps-user" \
  -e DB_PASS="environment-pass" \
  -d db-app:0.0.2

# Check logs
docker logs db-app-env

# Connect to container
docker exec -it db-app-env sh

# List the environment variables
printenv

# The credentials can be retrieved -Control how can exec into your containers.

# Disconnect from the container
exit

# Remove container
docker rm -f db-app-env
