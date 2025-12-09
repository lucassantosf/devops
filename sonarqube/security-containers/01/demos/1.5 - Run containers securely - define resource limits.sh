################################################################################
# COURSE:     DevOps Security: Security Best Practices
# MODULE:     Implement Container Security Best Practices
# DEMO:       Run Containers Securely - Define Resource Limits
# AUTHOR:     Antonio Jesus Piedra
################################################################################

# Containers directly utilize host resources. If one of the containers uses too
# much memory or CPU, it can impact other containers and even bring down the
# host system. Defining resource limits is crucial to avoid this.

# Check the host's CPU utilization
top -bn1 | grep "Cpu(s)" | awk '{print "CPU Usage: " $2 + $4 "%"}'

# Check CPU cores in your system
nproc

# Start a container that consumes CPU incrementally
docker run --name cpu-container -d busybox:1.37 sh -c "while true; do :; done"

# Check the container's CPU utilization
docker stats cpu-container

# Check the host's CPU utilization again
top -bn1 | grep "Cpu(s)" | awk '{print "CPU Usage: " $2 + $4 "%"}'

# Delete the container
docker rm -f cpu-container

# To limit the CPU usage, you can use the --cpus flag
# Start the new container limiting its usage to 50% of one CPU core
docker run --name cpu-container --cpus="0.5" -d busybox:1.37 sh -c "while true; do :; done"

# Check the container's CPU utilization
docker stats cpu-container

# Wait for about a minute, and check the CPU utilization again
top -bn1 | grep "Cpu(s)" | awk '{print "CPU Usage: " $2 + $4 "%"}'

# Delete the container
docker rm -f cpu-container

# The same occurs for memory, a container consuming lots of memory can impact
# other applications in your environment. To limit the usage, you can use the
# --memory flag. E.g. --memory=100m to limit the container usage to 100MB.
