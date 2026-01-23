terraform {
  backend "s3" {
    bucket = "lfcompany-infrastructure-iac"  
    key    = "shared/terraform.tfstate"         
    region = "us-east-1"
  }
}
