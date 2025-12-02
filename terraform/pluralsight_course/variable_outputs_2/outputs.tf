output "bucket_info" {
  description = "Information about the s3 bucket"
  value = {
    arn    = module.storage.bucket_arn
    id     = module.storage.bucket_id
    policy = module.storage.bucket_policy
  }
}

output "ec2_public_dns" {
  description = "The public DNS of the ec2 instance"
  value       = aws_instance.web.public_dns
}

output "ec2_public_ip" {
  value       = aws_instance.web.public_ip
  description = "Public IP from the ec2"
}

output "public_subnet_ids" {
  description = "The IDs of the public subnets"
  value       = module.networking.public_subnets
  sensitive   = true
}

output "vpc_id" {
  value       = module.networking.vpc_id
  description = "VPC's id to printed on terminel"
}