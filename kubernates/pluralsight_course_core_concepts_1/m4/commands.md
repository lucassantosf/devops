# Minikube Commands

# Start a local Kubernetes cluster using Minikube
minikube start

# Load a Docker image into the Minikube cluster for local development and testing
# This allows you to use locally built images without pushing to a remote registry
minikube image load node-app:1.0
minikube image load node-app:2.0
minikube image load node-app:3.0

# Create a network tunnel to enable external access to services running in the Minikube cluster
# This is particularly useful for LoadBalancer type services to make them accessible from the host machine
minikube tunnel 

# Create alias on Ubuntu
# Create a shorthand 'k' for 'kubectl' to reduce typing and improve efficiency
alias k="kubectl"

# List all deployments in the current namespace
k get deployments

# List all deployments with their associated labels
k get deployment --show-labels 

# List deployments with a specific label selector (in this case, deployments with app=nginx label)
k get deployment -l app=nginx

# Delete a specific deployment by its name
k delete deployment [deployment-name]

# Scale a deployment to a specific number of replicas (in this case, 5 replicas)
k scale deployment [deployment-name] --replicas=5

# Scale a deployment defined in a YAML file to a specific number of replicas
k scale -f file.yml --replicas=5

# Create a deployment from a YAML file and save the configuration to the live object
k create -f ./nginx.deployment.yml --save-config

# Show detailed information about a specific deployment
k describe deployment my-nginx

# List deployments with their labels
k get deploy --show-labels 

# List deployments with a specific label
k get deploy -l app=my-nginx

# Scale a deployment specified in a YAML file to 4 replicas
k scale -f ./nginx.deployment.yml --replicas=4
