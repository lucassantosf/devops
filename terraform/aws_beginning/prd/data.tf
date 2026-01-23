data "terraform_remote_state" "infrastructure_shared" {  
  backend = "s3"

  config = {
    bucket = "lfcompany-infrastructure-iac"
    key    = "shared/terraform.tfstate" 
    region = "us-east-1"
  }
}