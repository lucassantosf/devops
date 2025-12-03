terraform {
  required_providers {
    aws = {
      source  = "hashicorp/aws"
      version = "~> 6.0"
    }
  }

  backend "s3" {
    bucket = "taco-wagon20251202142314368100000001"
    region = "us-west-2"
    key="base_app/terraform.tfstate"
    use_lockfile = true
  }

  required_version = ">= 1.11"
}