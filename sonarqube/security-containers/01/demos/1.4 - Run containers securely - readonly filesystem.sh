################################################################################
# COURSE:     DevOps Security: Security Best Practices
# MODULE:     Implement Container Security Best Practices
# DEMO:       Run Containers Securely - Readonly Filesystem
# AUTHOR:     Antonio Jesus Piedra
################################################################################

# If an attacker gains access to the filesystem, they could modify files in
# the container, potentially altering its operation.

# Start the container
docker run --rm -it busybox:1.37 /bin/sh

# Create a test file to verify write access
echo "Hey PluralSight!" > /tmp/test.txt

# Ensure the file has been created by checking its contents
cat /tmp/test.txt

# Fun if your container is a webserver, right? the attacker can essentially 
# modify your website.

# Exit the container to stop it
exit

# Create a new container with the --read-only flag
docker run --rm --read-only -it busybox:1.37 /bin/sh

# Try to create a test file to verify write access
echo "Hey PluralSight!" > /tmp/test.txt

# Can't create the file, much more secure.

# Disconnect from the container
exit
