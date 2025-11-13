# AWS ECS (Elastic Container Service) with EC2 Deployment Guide

## Overview
This guide provides a comprehensive walkthrough for deploying containerized applications using Amazon ECS with EC2 launch type, covering IAM roles, cluster setup, task definitions, and scaling strategies.

## 1. IAM Roles Configuration
### Required IAM Roles
- **EC2 Instance Profile**
- **ECS Task Role**
- **ECS Service Role**
- **Auto Scaling Role**

## 2. ECS Cluster Setup (EC2 Launch Type)

### Cluster Creation
1. Navigate to Amazon ECS Console
2. Click "Create Cluster"
3. Select EC2 Template
4. Configuration Details:
   - **Cluster Name**: Descriptive identifier
   - **Provisioning Model**: On-Demand Instance
   - **Instance Type**: t2.micro (Free Tier)
   - **Number of Instances**: 1
   - **Volume Size**: 30 GB
   - **Container Instance IAM Role**: Select EC2 Instance Profile

## 3. Task Definition

### Create Task Definition
1. Navigate to Task Definitions
2. Create New Task Definition
   - **Launch Type Compatibility**: EC2
   - **Task Definition Name**: Descriptive name
   - **Task Role**: None
   - **Network Mode**: Default
   - **Task Size**:
     - Memory: 350 MiB
     - CPU: 300 units

### Container Configuration
- **Container Name**: Descriptive identifier
- **Image**: ECR repository address
- **Memory Limits**: Hard limit 300 MiB
- **Port Mapping**: 8080:80 TCP

## 4. Task Deployment
1. Go to Clusters
2. Navigate to Tasks tab
3. Run New Task
   - **Launch Type**: EC2
   - **Number of Tasks**: 1
   - **Task Placement**: AZ Balanced Spread

## 5. Service Configuration

### Create Service
1. Go to Clusters
2. Navigate to Services tab
3. Create Service
   - **Launch Type**: EC2
   - **Task Definition**: Select previously created
   - **Service Name**: Descriptive identifier
   - **Service Type**: Replica
   - **Deployment Type**: Rolling Update
   - **Task Placement**: AZ Balanced Spread

## 6. Load Balancing Integration

### Application Load Balancer
- Enables dynamic port mapping between EC2 instances
- Steps:
  1. Create Application Load Balancer
  2. Configure ECS Cluster with Load Balancer

## 7. Auto Scaling Strategies

### Service/Task Auto Scaling
1. Update Cluster
2. Modify Task Count (e.g., 2-4 tasks)
3. Configure Scaling Parameters
   - Define IN and OUT scaling alarms
   - Set scaling thresholds

### Capacity Provider Auto Scaling
- Available only for EC2 launch type clusters
- Create cluster with capacity provider settings

## Best Practices
- Use least privilege IAM roles
- Implement comprehensive monitoring
- Optimize container resource allocation
- Use multiple availability zones
- Implement rolling updates

## Security Considerations
- Secure container images
- Use private ECR repositories
- Implement network isolation
- Regularly update container images
- Use ECS task execution roles

## Performance Optimization
- Right-size container resources
- Use EC2 instance types matching workload
- Implement efficient load balancing
- Monitor and adjust capacity providers

## Recommended Learning Resource
[AWS ECS Tutorial Playlist](https://www.youtube.com/playlist?list=PLMpVQWIR2lKcbHCV3eIIT5kpvyYP2I-tJ)

## Disclaimer
Configuration may vary based on specific application requirements. Always test in a staging environment before production deployment.
