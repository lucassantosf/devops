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
