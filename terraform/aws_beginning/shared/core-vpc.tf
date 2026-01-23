resource "aws_vpc" "vpc_lfcompany_001" { 
  cidr_block           = var.vpc_cidr
  instance_tenancy     = "default"
  enable_dns_hostnames = true

  tags = {
    Name = "vpc-${var.project_name}-${var.region}-001"
  }
}