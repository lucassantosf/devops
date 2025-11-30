terraform {
  required_providers {
    aws = {
      source  = "hashicorp/aws"
      version = "6.23.0"
    }
  }
  backend "s3" {
    bucket = "taco-wagon20251130142034778700000001"
    region = "us-east-1"
  }
}