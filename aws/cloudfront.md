# AWS CloudFront: Serverless Static Website Hosting Guide

## Overview
CloudFront is an AWS service that enables hosting static websites (HTML, ReactJS) directly from an S3 bucket without requiring an EC2 server, embodying the "Serverless" concept.

## Prerequisites
- AWS Account
- Static website files
- Domain name (optional)

## Step 1: Create S3 Bucket for Website Hosting

### Bucket Configuration
1. Navigate to S3 service
2. Click "Create bucket"
3. Naming Convention: `subdomain*.domain.com.br`
4. Region: US East (N. Virginia) - Required for CloudFront
5. Object Ownership: ACLs disabled
6. Public Access: Enable

### Bucket Policy for Public Access
```json
{
    "Version": "2012-10-17",
    "Statement": [
        {
            "Sid": "AddPerm",
            "Effect": "Allow",
            "Principal": "*",
            "Action": "s3:GetObject",
            "Resource": "arn:aws:s3:::<BUCKET-NAME-HERE>/*"
        }
    ]
}
```

### Static Website Hosting
1. Go to Bucket Properties
2. Enable "Static website hosting"
3. Set Index Document: `index.html`
4. Set Error Document: `index.html`

### Upload Website Files
- Upload `index.html`
- Upload `static/` directory
- Upload all necessary assets

## Step 2: Create CloudFront Distribution

### Distribution Configuration
1. Open CloudFront service
2. Click "Create Distribution"
3. Select S3 bucket as Origin Domain
4. Use Website Endpoint
5. Viewer Protocol Policy: Redirect HTTP to HTTPS

## Optional: Custom Domain Setup

### SSL Certificate Management
1. Open Certificate Manager
2. Request Public Certificate
3. Enter Fully Qualified Domain Name
4. Validate Domain Ownership
   - Use Route 53 for automatic validation
   - Manually add CNAME records if needed

### CloudFront Domain Configuration
1. Edit CloudFront Distribution
2. Add Alternate Domain Name (CNAME)
3. Select SSL Certificate
4. Configure Origin Settings
   - Select S3 bucket
   - Set Protocol to HTTPS

### Route 53 Configuration
1. Create A Record in Hosted Zone
2. Point to CloudFront Distribution
3. Enable Alias Target

## Best Practices
- Use HTTPS exclusively
- Implement proper access controls
- Optimize CloudFront cache settings
- Monitor distribution performance

## Security Considerations
- Use least privilege IAM roles
- Enable encryption at rest and in transit
- Regularly review bucket and distribution settings

## Troubleshooting
- Verify SSL certificate status
- Check bucket permissions
- Validate domain configuration
- Review CloudFront error logs

## Performance Optimization
- Enable compression
- Use edge locations strategically
- Implement proper cache headers
- Minimize initial load time

## Recommended Learning Resource
[Deploy Static Website to AWS S3 with HTTPS using CloudFront](https://www.youtube.com/watch?v=o2HTkVxzivA)

## Disclaimer
Configuration may vary based on specific requirements. Always test in a staging environment before production deployment.
