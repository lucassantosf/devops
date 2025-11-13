# SSL Certificate Management with Certbot and Let's Encrypt

## Overview
This guide provides step-by-step instructions for installing and configuring SSL certificates using Certbot and Let's Encrypt for Nginx containers.

## Prerequisites
- Docker installed
- Nginx container running
- Domain(s) you want to secure

## Installation Steps

### 1. Unzip Let's Encrypt Resources
Unzip the `letsencrypt.zip` on your remote server.

### 2. Configure Nginx Docker Compose
Update your Nginx docker-compose configuration to mount Let's Encrypt volumes:

```yaml
nginx:
  volumes:
    - /etc/letsencrypt/:/etc/letsencrypt/
```

### 3. Access Nginx Container
Enter the Nginx container using Docker:

```bash
sudo docker exec -it nginx sh
```

### 4. Install Certbot
Inside the container, install Certbot for Nginx:

```bash
apk add certbot-nginx
```

### 5. Request SSL Certificate
Generate SSL certificates for your domains:

```bash
certbot --nginx -d domain.com.br -d www.domain.com.br
```

## Important Notes
- Replace `domain.com.br` with your actual domain
- Certbot will automatically configure Nginx SSL settings
- Certificates are free and automatically renewable

## Renewal
Let's Encrypt certificates expire every 90 days. Certbot can automatically renew them:

```bash
certbot renew
```

## Troubleshooting
- Ensure ports 80 and 443 are open
- Verify domain DNS settings
- Check container network configuration

## Security Recommendations
- Keep Certbot and Let's Encrypt packages updated
- Use automatic renewal mechanisms
- Implement strong SSL/TLS configurations

## References
- [Certbot Documentation](https://certbot.eff.org/)
- [Let's Encrypt](https://letsencrypt.org/)
