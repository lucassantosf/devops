output "aws_instance_public_dns" {
  value       = "https://${aws_instance.nginx1.public_dns}:${var.http_port}"
  description = "Public DNS hostname for ec2 instance"
}

output "aws_vpc_id" {
  value       = aws_vpc.app.id
  description = "VPC's id value after deploy"
}

output "aws_subnet_id" {
  value       = aws_subnet.public_subnet1.id
  description = "Subnet's id value after deploy"
}