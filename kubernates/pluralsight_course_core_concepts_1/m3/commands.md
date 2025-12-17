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

# Create a pod or resource from a YAML file and save the configuration for future updates
k create -f nginx.pod.yml --save-config

# Display detailed information about a specific pod, including its status, events, and configuration
k describe pod [pod-name]

# Apply changes to a pod or resource defined in a YAML file, creating or updating it
k apply -f nginx.pod.yml

# Open an interactive shell session inside a running pod to debug or interact with the container
k exec [pod-name] -it -- sh

# Open the pod configuration in the default text editor for direct editing
k edit -f nginx.pod.yml

# Delete a pod or resource defined in a YAML file
k delete -f nginx.pod.yml
