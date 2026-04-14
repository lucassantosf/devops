# Kubernetes Architecture and Concepts

This directory contains resources, notes, and hands-on projects related to Kubernetes.

## 📁 Directory Structure

- [argo_rollout/](./argo_rollout/): Advanced deployment strategies using Argo Rollouts (Canary/Blue-Green).
- [book_devops_native_kubernetes_demo_apps/](./book_devops_native_kubernetes_demo_apps/): Examples from the book "Cloud Native DevOps with Kubernetes".
- **Pluralsight Course Modules**:
  - [pluralsight_course_core_concepts_1/](./pluralsight_course_core_concepts_1/): Fundamentals of K8s.
  - [pluralsight_course_deploying_your_code_2/](./pluralsight_course_deploying_your_code_2/): CI/CD and deployments.
  - [pluralsight_course_volumes_concepts_3/](./pluralsight_course_volumes_concepts_3/): Storage and Volumes.
  - [pluralsight_course_kompose_4/](./pluralsight_course_kompose_4/): Migrating Docker Compose to K8s.
  - [pluralsight_course_moving_to_the_cloud_5/](./pluralsight_course_moving_to_the_cloud_5/): Cloud-specific K8s.

---

## 🚀 Argo Rollouts
Argo Rollouts is a Kubernetes controller and set of CRDs which provides advanced deployment capabilities.

### Webcolor Canary Demo
Located in `argo_rollout/`, this example demonstrates a **Canary** deployment strategy with automated analysis using **Prometheus**.

#### Key Components:
- **Rollout**: Replaces standard Deployments. Defines a strategy with steps (25%, 50%, 100% traffic weights).
- **AnalysisTemplate**: Defines how to measure success (e.g., success-rate >= 90%) using Prometheus metrics.
- **Service**: A LoadBalancer service to externalize the `webcolor` app.

#### Useful Commands:
```bash
# Apply the rollout manifests
kubectl apply -f kubernates/argo_rollout/deployment.yaml

# Monitor the rollout status in real-time
kubectl argo rollouts get rollout webcolor --watch

# Promote the rollout to the next step
kubectl argo rollouts promote webcolor

# Undo/Rollback a rollout
kubectl argo rollouts undo webcolor

# List all rollouts in the current namespace
kubectl argo rollouts list rollouts
```

> [!TIP]
> Make sure your Prometheus server is accessible at the address specified in the `AnalysisTemplate` (defaulting to `http://prometheus-server.monitoramento.svc.cluster.local`).

---

## 🏗️ Cluster Architecture

### Cluster Components
- **Master Node (Control Plane)**
  - Manages the cluster, maintains desired state, and executes commands.
  - Key components: Control Manager (c-m), API Server, Scheduler, etcd.
- **Worker Nodes**
  - Execute applications.
  - Components: Kubelet, Kube-proxy.

### API Server
- Central communication hub for cluster components and `kubectl`.

---

## 🛠️ Cluster Creation & Setup

### Prerequisites
- Install [kubectl](https://kubernetes.io/docs/tasks/tools/install-kubectl-linux/)
- Install [minikube](https://minikube.sigs.k8s.io/docs/start/)

### Starting a Cluster
```bash
minikube start --vm-driver=virtualbox
```

---

## 📦 Core Kubernetes Concepts

### Pods
- Basic unit of deployment; can contain one or more containers.
- Each pod gets a unique IP.

### Services
- **ClusterIP**: Internal communication.
- **NodePort**: External access via node port.
- **LoadBalancer**: External access via cloud LB.

### ConfigMap & Secrets
- Organizes configuration and handles sensitive data.

### ReplicaSets & Deployments
- **ReplicaSet**: Ensures X number of pods are running.
- **Deployment**: Manages ReplicaSets, handles rollouts and rollbacks.

### Volumes & Storage
- **Volumes**: Pod-dependent storage.
- **Persistent Volumes (PV)**: Lifecycle independent of pods.
- **StatefulSet**: For applications requiring stable identifiers and persistent storage.

---

## 📈 Scalability & Health

### Scaling Models
- **Vertical Scaling**: Increasing resources (CPU/RAM) of existing nodes/instances.
- **Horizontal Scaling**: Adding more pods/resources to distribute load.

### Probes
- **Liveness**: Restarts unhealthy containers.
- **Readiness**: Determines if a pod is ready to serve traffic.

---

## 💡 Best Practices
- Use declarative configuration (`kubectl apply`).
- Implement resource limits and quotas.
- Use namespaces for logical isolation.
- Configure health checks (probes).
- Follow GitOps principles for automated deployments.

---

## 📚 Learning Resources
- [Official Kubernetes Documentation](https://kubernetes.io/docs/)
- [Kubernetes Tutorials](https://kubernetes.io/docs/tutorials/)
- [Cloud Native Computing Foundation (CNCF)](https://www.cncf.io/)

---

## ⚖️ Disclaimer
This documentation is for educational purposes, providing insights into Kubernetes concepts and architecture.