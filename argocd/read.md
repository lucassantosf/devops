# Start minikube with proper configuration
minikube delete
minikube start --memory=4096 --cpus=2

# Set up Argo CD
kubectl create namespace argocd
kubectl apply -n argocd --server-side --force-conflicts -f https://raw.githubusercontent.com/argoproj/argo-cd/stable/manifests/install.yaml
argocd admin initial-password -n argocd
kubectl port-forward svc/argocd-server -n argocd 8080:443

# Common commands
kubectl get pods
kubectl get svc
