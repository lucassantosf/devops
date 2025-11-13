# AWS Auto Scaling with Elastic Load Balancer (ELB)

## Overview
This guide provides a step-by-step process for creating an Auto Scaling Group with an Elastic Load Balancer in AWS, enabling dynamic infrastructure scaling and high availability.

## Prerequisites
- Prepared EC2 instance with:
  - API running
  - Docker installed
  - Configured security settings

## Step-by-Step Configuration

### 1. Create EC2 Instance Image
- Navigate to EC2 Dashboard
- Select your prepared instance
- Create an Amazon Machine Image (AMI)
- Note the AMI ID for future use

### 2. Create Launch Template
#### Location: EC2 Dashboard > Launch Templates
- **Name**: Descriptive identifier for your template
- **Description**: Detailed explanation of template purpose
- **Amazon Machine Image (AMI)**: Select previously created AMI
- **Key Pair**: Select corresponding .pem key
- **Network Settings**:
  - Select appropriate Security Group (SG_API)
  - Choose specific subnet
- **Keep other settings at default**

### 3. Create Auto Scaling Group
#### Location: EC2 Dashboard > Auto Scaling > Auto Scaling Groups
1. **Basic Configuration**
   - Provide a meaningful name
   - Select the Launch Template
   - Choose latest version

2. **Network Configuration**
   - Select appropriate VPC
   - Choose multiple subnets for high availability

3. **Load Balancer Integration**
   - Attach to existing Load Balancer
   - Select corresponding Target Group
   - Enable ELB Health Checks

4. **Capacity Configuration**
   - **Desired Capacity**: Initial number of instances
   - **Minimum Capacity**: Lowest number of instances
   - **Maximum Capacity**: Highest number of instances

5. **Scaling Policies** (Optional)
   - **Target Tracking Scaling**
     - Metric: CPU Utilization
     - Target Value: 50%
   - **Warm-up Period**: 300 seconds (instance startup time)

### Scaling Policy Recommendations
- Monitor multiple metrics
- Set conservative initial thresholds
- Gradually refine based on application performance

## Best Practices
- Use multiple availability zones
- Implement comprehensive health checks
- Monitor instance performance
- Regularly review and adjust scaling policies

## Troubleshooting
- Verify security group configurations
- Check instance health and logs
- Ensure proper IAM roles and permissions

## Recommended Learning Resource
[AWS Auto Scaling with ELB Tutorial](https://www.youtube.com/watch?v=fidFQ2ocqsI&list=PLOF5f9_x-OYUaqJar6EKRAonJNSHDFZUm&index=12)

## Disclaimer
Configuration may vary based on specific infrastructure requirements. Always test in a staging environment first.
