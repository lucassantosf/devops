output "region" {
  description = "AWS Region"
  value       = var.region
}

output "cluster_name" {
  description = "kubernetes cluster name"
  value       = module.eks.cluster_name
}