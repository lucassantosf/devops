# Create alias on Ubuntu
# Create a shorthand 'k' for 'kubectl' to reduce typing and improve efficiency
alias k="kubectl"

# Pod Commands

# Run a new pod with an Nginx container using the alpine-based image
k run my-nginx --image=nginx:alpine 

# List all pods in the current namespace
k get pods

# List all services in the current namespace
k get services

# Forward local machine port 8080 to container port 80, allowing local access to the pod
k port-forward my-nginx 8080:80

# Delete the specific pod named my-nginx
k delete pod my-nginx
