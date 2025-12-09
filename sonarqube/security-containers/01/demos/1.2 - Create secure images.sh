################################################################################
# COURSE:     DevOps Security: Security Best Practices
# MODULE:     Implement Container Security Best Practices
# DEMO:       Create Secure Images
# AUTHOR:     Antonio Jesus Piedra
################################################################################

# PREREQUISITES: Ensure docker-buildx is installed in your system to create
# container images. Example for ubuntu:
#  - Install:
#    sudo apt-get install docker-buildx -y
#  - Add user to docker group:
#    sudo usermod -aG docker $USER

# Check the app code and the file used to build the container image
#  - app code:    app/main.go
#  - dockerfile:  app/Dockerfile

# Build the image (move to relevant directory first if required)
docker build -t my-secure-app:0.0.1 .

# Scan image with Trivy
trivy image my-secure-app:0.0.1

# Check image size
docker images

# To reduce the container image size, use multistage dockerfiles.
# Check example one: Dockerfile-multistage

# Crate new image version
docker build -f Dockerfile-multistage -t my-secure-app:0.0.2 .

# Scan image with Trivy
trivy image my-secure-app:0.0.2

# Check image sizes
docker images my-secure-app

# Benefits:
#  - Faster pull times (smaller size)
#  - Less number of packages, less number of potential bugs/vulnerabilities

