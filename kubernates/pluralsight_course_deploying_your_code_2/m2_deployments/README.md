k apply -f nginx.deployment.yml

k port-forward pod/my-nginx-67db796c4-576xv 8080:80