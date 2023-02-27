# Installing SSL with certbot and 'LetsEncript' :

# Unzip and attach it on docker .yml volume of nginx, near to :

    Unzip letsencrypt.zip on remote server

    nginx:

    volumes:
        - /etc/letsencrypt/:/etc/letsencrypt/

# Go into nginx container

    sudo docker exec -it nginx sh

# Install certbot-nginx on container

    apk add certbot-nginx

# Request certificate SSL for specific domains

    certbot --nginx -d domain.com.br -d www.domain.com.br