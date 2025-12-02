variable "api_key" {
  description = "Api key to be stored in secrets manager"
  sensitive   = true
  type        = string
}

variable "bucket_prefix" {
  description = "Prefix to use for naming S3 bucket"
  type        = string
}

variable "environment" {
  description = "Deployment environment (e.g, dev, prod)"
  default     = "dev"
  type        = string
}

variable "instance_type" {
  description = "Instance type for the ec2 instance"
  type        = string
}

variable "project" {
  description = "Project name to be used in resource naming and tags"
  type        = string
}

variable "region" {
  default = "us-east-2"
  type    = string
}

variable "sg_port_number" {
  description = "Port number for the security group"
  default     = 80
  type        = number
}

variable "tags" {
  description = "A map of tags to apply to resources."
  type        = map(string)
}

variable "vpc_network_info" {
  description = "Values for VPC module"
  type = object({
    vpc_cidr       = string
    public_subnets = map(string) # subnet name to CIDR
  })
}