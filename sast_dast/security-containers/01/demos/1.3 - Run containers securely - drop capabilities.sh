################################################################################
# COURSE:     DevOps Security: Security Best Practices
# MODULE:     Implement Container Security Best Practices
# DEMO:       Run Containers Securely - Drop Capabilities
# AUTHOR:     Antonio Jesus Piedra
################################################################################

# Capabilities offer a security mechanism to break down root privileges into 
# granular units, allowing to grant containers only the perms they strictly need
# to run - Principle of least privileged.

# Create a sample file in the host filesystem
touch /home/$USER/Documents/test.txt

# Start a container with elevated privileges
# Note: The --privileged flag grants the container all capabilities of the host
# system, which is highly insecure.
docker run -it --rm --privileged busybox:1.37 /bin/sh

# Create a directory to attempt to mount the host system's root partition
mkdir -p /host_root

# Check the root host partition
cat /proc/mounts

# Try to mount the partition - Root partition path can vary
mount /dev/sda2 /host_root

# Try to check the file created on the host system - Note the username
ls -l /host_root/home/ajpiedra/Documents

# Disconnect from the container
exit

# Remove all capabilities and grant those that are strictly needed.
# If your application needs network binding, you could drop all capabilities but
# the NET_BIND_SERVICE one
docker run -it --rm --cap-drop=ALL --cap-add=NET_BIND_SERVICE busybox:1.37 /bin/sh

# Attempt to do the mount the host's filesystem
mkdir -p /host_root
mount /dev/sda2 /host_root

# Disconnect from the container
exit
