################################################################################
# COURSE:     DevOps Security: Security Best Practices
# MODULE:     Implement Container Security Best Practices
# DEMO:       Run Containers Securely - Specify Running User
# AUTHOR:     Antonio Jesus Piedra
################################################################################

# By default, containers are run as the root user and group. Those permissions
# are mapped to the host's users and groups. Options to avoid this:
#  - Map containers to IDs that exist on the host
#  - Use random IDs

# Run the container without specifying the user
docker run -it --rm  busybox:1.37 /bin/sh

# Check the user and group ID
id

# Try to modify a restricted file
echo "test" >> /etc/passwd

# Ensure the file has been modified
cat /etc/passwd

# Disconnect from the container.
exit

# Try to modify the same file in the host systemt
echo "test" >> /etc/passwd

# To map container to existing user..
# Get the UID and GID for the user
id

# Run the container as the mapped user
docker run -it --rm --user 1000:1000 busybox:1.37 /bin/sh

# The user running the container will have the same permissions as the ampped user.
# Check the user and group ID of the container
id

# Try to modify a restricted file. You should now get Permission denied.
echo "test" >> /etc/passwd

# Disconnect from the container.
exit

# Another option is to map your containers to random user ids

# The default user can also be defined in the Dockerfile with the USER
# instruction.
#   RUN adduser -D myuser
#   USER myuser
