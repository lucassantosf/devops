# Terraform Quick Reference Guide

## Terraform Workflow Commands

### 1. Initialize Terraform Project
```bash
terraform init
```
- Initializes the working directory
- Downloads provider plugins
- Sets up backend configuration

### 2. Plan Infrastructure Changes
```bash
terraform plan
```
- Generates an execution plan
- Shows what changes will be made
- Allows review before applying

### 3. Apply Infrastructure Configuration
```bash
terraform apply
```
- Applies the changes defined in configuration files
- Creates, updates, or deletes resources
- Prompts for confirmation by default

### 4. Retrieve Outputs
```bash
terraform output
```
- Displays output values defined in configuration
- Useful for retrieving important information like IP addresses or resource IDs

### 5. Destroy Infrastructure
```bash
terraform destroy
```
- Removes all resources managed by the Terraform configuration
- Permanently deletes infrastructure
- Use with caution

## Best Practices
- Always review the plan before applying
- Use version control for Terraform files
- Store state files securely
- Use variables for flexibility
- Implement state locking

## Common Workflow - commands
1. Write configuration files
2. Run `terraform init`
3. Verify with `terraform plan`
4. Apply changes with `terraform apply`
5. Revert all changes with `terraform destroy`
6. Fix formatting to match HCL spec `terraform fmt`
7. Check syntax and logic `terraform validate`
8. Opening terraform console `terraform console`
9. Display all state data `terraform show`
10. List all resources and data sources `terraform state list`
11. List all atributes of a single object `terraform state show ADDR` , `terraform state show aws_vpn.main`
12. Show outputs store in state `terraform output NAME`
13. Passing variable via command `terraform plan -var "instance_type=t3.nano"`
14. Manage and update as needed

## Resources
- [Official Terraform Documentation](https://www.terraform.io/docs/)
- [Terraform CLI Commands](https://www.terraform.io/cli/commands)

## Contribution
Improvements and additional Terraform tips are welcome.

## Disclaimer
Carefully review and test Terraform configurations before applying to production environments.
