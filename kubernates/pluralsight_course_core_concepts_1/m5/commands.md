# Kubernetes Services

## Overview
Services in Kubernetes provide a stable network endpoint for accessing a set of Pods, enabling communication and load balancing between different parts of an application.

## Service Types
1. **ClusterIP (Default)**
   - Exposes the Service on an internal IP within the cluster
   - Only reachable from within the cluster
   - Ideal for internal communication between services

2. **NodePort**
   - Exposes the Service on each Node's IP at a static port
   - Accessible from outside the cluster
   - Port range: 30000-32767

3. **LoadBalancer**
   - Creates an external load balancer
   - Assigns a fixed, external IP address
   - Typically used in cloud environments

4. **ExternalName**
   - Maps the Service to an external DNS name
   - Allows referencing external services within the cluster

## Common kubectl Service Commands

### Create a Service
```bash
# Create a service from a YAML file
kubectl create -f service.yml

# Expose a deployment as a service
kubectl expose deployment my-deployment --port=80 --type=ClusterIP
```

### List Services
```bash
# List all services in current namespace
kubectl get services

# List services in all namespaces
kubectl get services --all-namespaces
```

### Describe a Service
```bash
kubectl describe service my-service
```

## Port Forwarding
Port forwarding allows temporary direct access to Pods or Services for debugging or development.

### Basic Port Forwarding Syntax
```bash
# Forward local port to a pod
kubectl port-forward pod/my-pod LOCAL_PORT:POD_PORT

# Example from the original file
k port-forward pod/my-nginx-7cb4dcc886-8nmsp 8080:80
```

### Port Forward to Service
```bash
kubectl port-forward service/my-service LOCAL_PORT:SERVICE_PORT
```

# Execute first nginx.deployment.yml
# Execute after clusterIP.service.yml