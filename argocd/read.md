kubectl get pods
kubectl get svc
kubectl port-forward service/argocd-server 8080:80
kubectl port-forward svc/argocd-server -n argocd 8080:443
argocd admin initial-password -n argocd