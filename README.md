# DevOps Project Repository

This repository contains a collection of DevOps-related scripts, configurations, and learning materials covering various technologies and practices.

## Repository Structure

### AWS Services
Located in the `aws/` directory, this section contains markdown files detailing various Amazon Web Services configurations:
- `auto_scalling_model.md`: Auto Scaling configuration guide
- `cloudfront.md`: CloudFront CDN configuration
- `code_commit.md`: AWS Code Commit instructions
- `ec2.md`: Elastic Compute Cloud (EC2) guide
- `ecs_ec2.md`: Elastic Container Service with EC2
- `ecs_fargate.md`: Elastic Container Service with Fargate
- `elb.md`: Elastic Load Balancer configuration
- `increase_volume.md`: Volume increase procedures
- `rds.md`: Relational Database Service guide
- `route_53.md`: DNS routing configuration
- `scheduling_cli.md`: CLI scheduling instructions

### Certbot
Located in the `certbot/` directory:
- `readme.md`: Let's Encrypt SSL certificate management
- `letsencrypt.zip`: Compressed SSL certificate resources

### CI/CD
- `.gitlab-ci.yml`: GitLab CI/CD pipeline configuration

### Crontab
Located in the `crontab/` directory:
- `readme.md`: Cron job documentation
- `curl.sh`: Curl-based script
- `renew_certbot_certificates.sh`: Automatic SSL certificate renewal script

### Docker
- `Docker` directory for Docker-related resources

### Hacking
Located in the `hack/` directory:
- Various CTF (Capture The Flag) challenge notes
- `scripts/php-reverse-shell.php5`: PHP reverse shell script

### Heroku
- `Deploy Heroku.txt`: Heroku deployment instructions

### K6 Performance Testing
Located in the `k6/` directory:
- `readme.md`: K6 performance testing guide
- Performance test scripts:
  - `register.js`
  - `stress.js`
  - `stress_aurora.js`
  - `stress_autoscalling.js`
  - `stress_estoque.js`

### Kubernetes
Located in the `kubernates/` directory:
- `readme.md`: Kubernetes learning materials
- `aula1/`: First Kubernetes lesson materials
  - Various YAML configuration files
  - `comandos`: Command reference
- `aula2/`: Second Kubernetes lesson materials
  - Advanced Kubernetes configurations
  - Deployment, StatefulSet, and service configurations
- `aula3/`: Third Kubernetes lesson materials
  - Deployment and ReplicaSet configurations

### AWS Lambda
Located in the `lambda/` directory:
- `permissions_IAM.md`: IAM permissions documentation
- `libs/`: Library resources
  - `pandas_xlrd.zip`
  - `pymysql.zip`
- `scripts/`: Lambda function scripts
  - Various data processing scripts
  - S3 and MySQL integration
  - Slack integration script

## Getting Started

1. Clone the repository
2. Navigate to the specific directory of interest
3. Refer to individual README.md files in each directory for detailed instructions

## Prerequisites

Ensure you have the following tools installed:
- Git
- Docker
- AWS CLI
- Kubernetes CLI (kubectl)
- Node.js
- Python

## Contributing

Feel free to open issues or submit pull requests with improvements or additional resources.

## License

[Add your license information here]
