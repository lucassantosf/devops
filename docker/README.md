# Docker Commands and Learning Notes

## Overview
This document provides a comprehensive guide to Docker commands, best practices, and learning notes from various Docker training sessions.

## Basic Commands

### Image Management
```bash
# List installed images
docker images

# Download image from Docker Hub
docker pull hello-world

# Remove an image
docker rmi hello-world
```

### Container Lifecycle
```bash
# Run a container
docker run hello-world

# Run container with interactive terminal
docker run -it ubuntu

# List running containers
docker ps

# List all containers (including stopped)
docker ps -a

# Start a stopped container
docker start <CONTAINER_ID>

# Stop a container
docker stop <CONTAINER_ID> -t 0

# Remove a container
docker rm <CONTAINER_ID>

# Remove all stopped containers
docker container prune
```

### Advanced Container Execution
```bash
# Run container in detached mode with random port mapping
docker run -d -P dockersamples/static-site

# Run container with specific port mapping
docker run -d -p 12345:80 dockersamples/static-site

# Run container with environment variable
docker run -d -p 12345:80 -e AUTHOR="Lucas" dockersamples/static-site

# Stop all running containers
docker stop $(docker ps -q)
```

## Docker Compose Commands
```bash
# Build services defined in docker-compose.yml
docker-compose build

# Start all services
docker-compose up

# Start services in background
docker-compose up -d

# Stop all services
docker-compose down

# Restart services
docker-compose restart
```

## Networking
```bash
# Create a custom network
docker network create --driver bridge my-network

# List networks
docker network ls

# Run a container in a specific network
docker run -it --name my-container --network my-network ubuntu

# Inspect a network
docker network inspect my-network
```

## Volumes
```bash
# Create a volume
docker run -v "/var/www" ubuntu

# Link a host directory to a container
docker run -it -v "/home/lucas/:/var/www" ubuntu

# Run a Node.js project from host in a container
docker run -d -p 8080:3000 -v "/home/lucas/Downloads/volume-exemplo:/var/www" -w "/var/www" node npm start
```

## Dockerfile Example
```dockerfile
FROM node:latest
MAINTAINER Lucas Ferreira
ENV NODE_ENV=production
ENV PORT=3000
COPY . /var/www
WORKDIR /var/www
RUN npm install
ENTRYPOINT npm start
EXPOSE $PORT
```

## Building Images
```bash
# Build an image from Dockerfile
docker build -f Dockerfile -t username/image-name .

# Build and tag an image
docker build -f Dockerfile -t username/image-name:tag .
```

## Docker Hub
```bash
# Login to Docker Hub
docker login

# Push an image to Docker Hub
docker push username/image-name

# Pull an image from Docker Hub
docker pull username/image-name
```

## Useful Inspection Commands
```bash
# Show Docker version
docker version

# Inspect container details
docker inspect <CONTAINER_ID>

# Show container port mappings
docker port <CONTAINER_ID>
```

## Best Practices
- Use multi-stage builds to reduce image size
- Minimize the number of layers in Dockerfiles
- Use .dockerignore to exclude unnecessary files
- Always specify tags for images
- Use environment variables for configuration

## Resources
- [Official Docker Documentation](https://docs.docker.com)
- [Docker Best Practices](https://docs.docker.com/develop/develop-images/dockerfile_best-practices/)

## Learning Notes
This document is based on Docker training sessions and practical experiences. Continuously update and refine your Docker skills.
