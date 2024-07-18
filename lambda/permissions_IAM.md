# Allow this permissions for the lambda function 

## Edit based on your need, on the function's role

{
    "Version": "2012-10-17",
    "Statement": [
        {
            "Effect": "Allow",
            "Action": [
                "s3:GetObject",
                "s3:DeleteObject"
            ],
            "Resource": "arn:aws:s3:::<CHANGE_HERE_YOUR_BUCKET_NAMES>/*"
        },
        {
            "Effect": "Allow",
            "Action": [
                "ec2:CreateNetworkInterface",
                "ec2:DescribeNetworkInterfaces",
                "ec2:AttachNetworkInterface",
                "ec2:DeleteNetworkInterface",
                "ec2:DetachNetworkInterface"
            ],
            "Resource": "*"
        },
        {
            "Effect": "Allow",
            "Action": "logs:CreateLogGroup",
            "Resource": "arn:aws:logs:us-east-1:<CHANGE_HERE_YOUR_ACCOUNT_ID>:*"
        },
        {
            "Effect": "Allow",
            "Action": [
                "logs:CreateLogStream",
                "logs:PutLogEvents"
            ],
            "Resource": [
                "arn:aws:logs:us-east-1:<CHANGE_HERE_YOUR_ACCOUNT_ID>:log-group:/aws/lambda/<CHANGE_HERE_YOUR_LAMBDA_FUNCION_NAME>:*"
            ]
        }
    ]
}