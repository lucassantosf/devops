# GitLab CI/CD Configuration

## Overview
This GitLab CI/CD configuration automates deployment for a production environment using a single deployment stage.

## Deployment Workflow
- Triggered only on the `master` branch
- Uses a specific GitLab runner with a custom tag
- Performs automated deployment steps for a Docker-based application

## Key Deployment Actions
1. Update project repository
2. Run database migrations
3. Install dependencies
4. Restart Docker containers

## Requirements
- GitLab Runner
- SSH access to production server
- Docker installed on target server
- Predefined environment variables:
  - `$KEY`: SSH private key
  - `$DOMAIN_PROD`: Production server domain
  - `$DIR`: Project directory path
