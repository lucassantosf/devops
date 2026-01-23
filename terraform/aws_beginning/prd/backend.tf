terraform {
  backend "s3" {
    bucket = "lfcompany-infrastructure-iac"
    key    = "prd/terraform.tfstate"
    region = "us-east-1"
  }
}