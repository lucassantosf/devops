# AWS VPC (Virtual Private Cloud) Configuration Guide

## Overview
Amazon Virtual Private Cloud (VPC) allows you to provision a logically isolated section of the AWS Cloud, providing complete control over your virtual networking environment.

## Prerequisites
- AWS Account
- Basic networking knowledge
- Understanding of IP addressing

## VPC Creation and Configuration Steps

### 1. Create VPC
1. Navigate to VPC Service
2. Configure VPC Settings
   - **IPv4 CIDR Block**: `10.0.0.0/16`
     - Provides 65,536 private IP addresses
   - **IPv6**: Disabled (optional)

### 2. Subnet Configuration
1. Create Two Subnets
   - **Subnet 1**:
     - **CIDR Block**: `10.0.1.0/24`
     - **Availability Zone**: Specific zone (e.g., us-east-1a)
     - **Type**: Public subnet

   - **Subnet 2**:
     - **CIDR Block**: `10.0.2.0/24`
     - **Availability Zone**: Different zone
     - **Type**: Private subnet

### 3. Internet Gateway
1. Create Internet Gateway
   - Provide descriptive name
2. Attach to VPC
   - Enables internet connectivity
   - Allows resources to access public internet

### 4. DNS Configuration
1. Enable DNS Hostnames
   - Allows resources to have public DNS names
2. Enable DNS Resolution
   - Facilitates internal name resolution

### 5. Route Table Configuration

#### Public Subnet Route Table
1. Create/Select Route Table
2. Configure Routes:
   ```
   Destination    Target
   10.0.0.0/16    local
   0.0.0.0/0      Internet Gateway
   ```
3. Associate with Public Subnet

#### Private Subnet Route Table
1. Create/Select Route Table
2. Configure Routes:
   ```
   Destination    Target
   10.0.0.0/16    local
   ```
3. Associate with Private Subnet

### 6. Security Group Configuration

#### API Security Group
1. Name: Descriptive API security group
2. VPC: Select created VPC
3. Inbound Rules:
   - SSH (port 22)
   - HTTP (port 80)
   - HTTPS (port 443)
   - Source: Specific IP/CIDR

#### RDS Security Group
1. Name: Descriptive RDS security group
2. VPC: Select created VPC
3. Inbound Rules:
   - MySQL (port 3306)
     - Source: Specific IP
     - Source: API Security Group

## Key Networking Concepts

### VPC
- Logically isolated network environment
- Defines IP address range
- Controls network access

### Subnet
- Subdivides VPC IP space
- Can be public or private
- Spans single Availability Zone

### Internet Gateway
- Allows communication between VPC and internet
- Enables public IP addressing
- Facilitates NAT for private resources

### Route Table
- Determines network traffic routing
- Defines how packets are directed
- Separates public and private network paths

### Security Group
- Acts as virtual firewall
- Controls inbound/outbound traffic
- Stateful: Automatically allows return traffic

## Best Practices
- Use multiple availability zones
- Implement least privilege network access
- Separate public and private resources
- Use NAT gateways for private subnet internet access
- Implement network ACLs for additional security
- Use VPC flow logs for monitoring

## Security Considerations
- Limit public subnet exposure
- Use security groups and network ACLs
- Implement VPC peering cautiously
- Use VPN or Direct Connect for hybrid cloud
- Regularly audit network configurations

## Performance Optimization
- Right-size subnets
- Use appropriate routing
- Implement efficient network design
- Consider network performance requirements

## Troubleshooting
- Verify CIDR block configurations
- Check route table associations
- Validate security group rules
- Monitor VPC flow logs
- Use VPC tools in AWS Console

## Recommended Learning Resource
[AWS VPC Creation Tutorial](https://www.youtube.com/watch?v=WMsADIgy4ms&list=PLOF5f9_x-OYUaqJar6EKRAonJNSHDFZUm&index=8)

## Disclaimer
VPC configurations are environment-specific. Always design and test thoroughly before production deployment.
