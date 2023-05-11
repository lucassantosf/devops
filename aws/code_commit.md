# About Code Commit - CI Continous Integration

    It's a service on AWS thats provides a repository to store code of projects on Cloud; 'Git',

    Search for 'Code Commit' on AWS 

    Repositories > Create Repository

    Give Repository Name: 

    Create;

    -------

    Connection steps:

    Create your 'Git credentials' - https://docs.aws.amazon.com/codecommit/latest/userguide/setting-up-gc.html?icmpid=docs_acc_console_connect_np

    Clone the repository in your machine - git clone https://git-codecommit.us-east-1.amazonaws.com/v1/repos/

    Use git commands and push it to Code Commit

# About Code Build - CI Continous Integration

    The Code Build is effectively the service that compile source code, runs tests, and produces software packages that are ready to deploy in the process de CI-CD

    Search for 'Code Commit' on AWS , on left menu, 'Build', click on 'Build Projects'

    Click on 'Create build project':

        'Project name'

        Source:

            Select the 'Source provider' -> AWS CodeCommit -> select the repository created before

        Reference type : 'Branch' -> select a branch, like 'master'

        Environment:    

            Managed Image

            Operating System : Amazon Linux 2

            Runtime(s): Standard

            Image e Image version : Select always the lastest image for this runtime version

            Environment type: Linux

            Privileged: Check - Enable this flag if you want to build Docker images or want your builds to get elevated privileges

        Buildspec: your project needs a buildspec.yml file on root path

        This file will contain the URI where the image of ECR is, and you need to copy to paste in this file to build your project, to generate new images into ECR

        **Search for example on documentation AWS, or on project you have done this

        Artifacts: No Artifacts

        Logs: CloudWatch , give a name for log-group

        Finish, click on 'Create build Project'

    ------

    ------

    Possible Errors:

    - Authentication failed on log of Code Build

        {
            "Version": "2012-10-17",
            "Statement": [
                {
                    "Sid": "CloudWatchLogsPolicy",
                    "Effect": "Allow",
                    "Action": [
                        "logs:CreateLogGroup",
                        "logs:CreateLogStream",
                        "logs:PutLogEvents"
                    ],
                    "Resource": [
                        "*"
                    ]
                },  
                {
                    "Sid": "CodeCommitPolicy",
                    "Effect": "Allow",
                    "Action": [
                        "codecommit:GitPull"
                    ],
                    "Resource": [
                        "*"
                    ]
                },  
                {
                    "Sid": "S3GetObjectPolicy",
                    "Effect": "Allow",
                    "Action": [
                        "s3:GetObject",
                        "s3:GetObjectVersion"
                    ],
                    "Resource": [
                        "*"
                    ]
                }, 
                {
                    "Sid": "S3PutObjectPolicy",
                    "Effect": "Allow",
                    "Action": [
                        "s3:PutObject"
                    ],
                    "Resource": [
                        "*"
                    ]
                }, 
                {
                    "Sid": "ECRPullPolicy",
                    "Effect": "Allow",
                    "Action": [
                        "ecr:BatchCheckLayerAvailability",
                        "ecr:GetDownloadUrlForLayer",
                        "ecr:InitiateLayerUpload",
                        "ecr:BatchGetImage"
                    ],
                    "Resource": [
                        "*"
                    ]
                }, 
                {
                    "Sid": "ECRAuthPolicy",
                    "Effect": "Allow",
                    "Action": [
                        "ecr:GetAuthorization"
                    ],
                    "Resource": [
                        "*"
                    ]
                }, 
            ]
        }


        20:50

# About Code Pipeline - CD Continous Delivery

    AWS CodePipeline is a fully managed continuous delivery service that helps you automate your software release process. It allows you to model, visualize, and automate the steps required to release your software. CodePipeline builds, tests, and deploys your code every time there is a code change, based on the release model you define. It also integrates with other AWS services such as CodeCommit, CodeBuild, and CodeDeploy to provide a complete release pipeline solution.
    
# Helpfuls : 

https://www.youtube.com/playlist?list=PLMpVQWIR2lKcbHCV3eIIT5kpvyYP2I-tJ