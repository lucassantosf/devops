# Kubernetes Architecture and Concepts

## Cluster Architecture

### Cluster Components
- **Master Node (Control Plane)**
  - Manages the cluster
  - Maintains and updates desired state
  - Receives and executes new commands
  - Key components:
    - Control Manager (c-m)
    - API Server
    - Scheduler
    - etcd (distributed key-value store)

- **Worker Nodes**
  - Execute applications
  - Components:
    - Kubelet
    - Kube-proxy

### API Server
- Responsible for communication between cluster components and external world
- Interacted with using `kubectl` command-line tool

## Cluster Creation

### Prerequisites
- Install `kubectl`: [Official Kubernetes Documentation](https://kubernetes.io/docs/tasks/tools/install-kubectl-linux/)
- Install `minikube`: [Minikube Installation Guide](https://minikube.sigs.k8s.io/docs/start/)

### Starting a Cluster
```bash
minikube start --vm-driver=virtualbox
```

## Core Kubernetes Concepts

### Pods
- Basic unit of deployment
- Can contain one or more containers
- Receives a unique IP address
- Allows port mapping within the pod

### Services
- **ClusterIP**: Internal cluster communication
- **NodePort**: Exposes container externally
- **LoadBalancer**: External access using cloud provider's load balancer

### ConfigMap
- Organizes configuration information
- Helps manage environment variables

### ReplicaSets
- Maintains a stable set of replica pods
- Ensures specified number of identical pods are running
- Manages pod availability and replacement

### Deployments
- Layer above ReplicaSets
- Audits and tracks changes in configuration files
- Allows rollback to specific versions
- Automatically manages ReplicaSets

### Volumes
- Independent lifecycle from containers
- Dependent on pods
- Types:
  - Ephemeral volumes: Live as long as the pod
  - Persistent volumes: Exist beyond pod lifecycle
- Preserves data between container restarts

### StatefulSet
- Provides stable, persistent storage for pods

### Probes
- Monitors application health
- Helps Kubernetes detect and respond to application issues

## Scalability Models

### Vertical Scaling
- Increase resources of existing infrastructure
- Example: Upgrading EC2 instance with more processing power and memory

### Horizontal Scaling
- Add more identical resources
- Distribute load across multiple parallel resources
- Enables better performance and reliability

## Best Practices
- Use declarative configuration
- Implement resource limits
- Utilize namespaces
- Configure health checks
- Use ConfigMaps and Secrets
- Practice GitOps principles

## Learning Resources
- [Official Kubernetes Documentation](https://kubernetes.io/docs/)
- [Kubernetes Tutorials](https://kubernetes.io/docs/tutorials/)
- [Cloud Native Computing Foundation](https://www.cncf.io/)

## Contribution
Improvements and additional learning materials are welcome.

## Disclaimer
This documentation is for educational purposes, providing insights into Kubernetes concepts and architecture.
