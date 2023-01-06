#intall certbot-nginx
sudo docker exec nginx apk add certbot-nginx

#exec command to renew
sudo docker exec nginx certbot renew