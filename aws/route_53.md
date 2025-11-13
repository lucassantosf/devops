# AWS Route 53 Domain Configuration and SSL Setup Guide

## Overview
This comprehensive guide covers domain configuration, SSL implementation, and load balancer integration using AWS Route 53 and related services.

## Prerequisites
- AWS Account
- Registered Domain
- Elastic Load Balancer (ELB)
- SSL Certificate requirements

## 1. Create Hosted Zone

### Hosted Zone Configuration
1. Navigate to Route 53 service
2. Select 'Hosted Zones'
3. Create Hosted Zone
   - **Domain Name**: Without 'www'
   - **Type**: Public Hosted Zone

### Domain Configuration
1. Open hosted zone details
2. Copy four default NS (Name Server) records
3. Configure in domain management service
   - Can be AWS or external service

## 2. Domain Routing to Load Balancer

### Root Domain Configuration
1. Create New Record
   - **Record Name**: Leave blank (root path)
   - **Record Type**: A
   - **Alias**: Enabled
   - **Route Traffic To**: Application/Classic Load Balancer
     - Select Region
     - Select Load Balancer
   - **Routing Policy**: Simple routing

### WWW Domain Configuration
1. Create CNAME Record
   - **Record Type**: CNAME
   - **Value**: Root domain without 'www'

## 3. SSL Certificate Management

### Certificate Request
1. Open AWS Certificate Manager
2. Request Public Certificate
3. Domain Configuration
   - `*.yourdomain.com`
   - `yourdomain.com`
4. Validation Method: DNS Validation
5. Complete request

### DNS Validation
1. Copy CNAME record details
2. Return to Route 53
3. Create new record with:
   - Copied CNAME name
   - CNAME type
   - Copied CNAME value

## 4. Load Balancer SSL Configuration

### HTTPS Listener Setup
1. Add new listener to Load Balancer
2. Configure:
   - Protocol: HTTPS
   - Port: 443
   - Select ACM Certificate
   - Route to target group

### Security Configurations
1. Remove HTTP (port 80) listener
2. Update Security Group
   - Allow port 443
   - Remove port 80

## 5. HTTP to HTTPS Redirection (Optional)

### Redirect Listener
1. Add HTTP listener
2. Configure:
   - Protocol: HTTP
   - Port: 80
   - Redirect to HTTPS
   - Status Code: 301

## Best Practices
- Use DNS validation for certificates
- Implement HTTPS everywhere
- Secure load balancer configurations
- Regularly rotate SSL certificates
- Monitor DNS and SSL configurations

## Security Considerations
- Use least privilege IAM roles
- Implement strong security group rules
- Enable HTTPS by default
- Use wildcard certificates for subdomains
- Regularly audit DNS records

## Performance Optimization
- Use alias records for faster routing
- Implement geolocation routing
- Minimize DNS lookup times
- Use Route 53 health checks

## Troubleshooting
- Verify NS records
- Check certificate validation status
- Confirm load balancer configurations
- Validate security group rules
- Monitor DNS propagation

## Common Validation Tests
### Working Scenarios
- `https://www.domain.com.br/api/ping`
- `https://domain.com.br/api/ping`

### Non-Working Scenarios
- `http://www.domain.com.br/api/ping`
- `http://domain.com.br/api/ping`

## Recommended Learning Resource
[AWS Route 53 and Domain Configuration Tutorial](https://www.youtube.com/watch?v=ma5n_5sOePw&list=PLOF5f9_x-OYUaqJar6EKRAonJNSHDFZUm&index=14)

## Disclaimer
Domain and SSL configurations vary by specific requirements. Always test thoroughly in a staging environment before production deployment.
