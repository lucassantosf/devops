# Code Commit - CI Continous Integration

    About: It's a service on AWS that provides a 'Git' repository to store code of projects on Cloud; Like other famous services : Gitlab, GitHub, BitBucket.

    Search for 'Code Commit' on AWS

    Repositories > Create Repository

    Give Repository Name: 

    Create;

    -------

    Connection steps:

    Create your 'Git credentials' - https://docs.aws.amazon.com/codecommit/latest/userguide/setting-up-gc.html?icmpid=docs_acc_console_connect_np

    Clone the repository in your machine - git clone https://git-codecommit.us-east-1.amazonaws.com/v1/repos/

    Use git commands and push it to Code Commit

# Code Build - CI Continous Integration

    About: The Code Build is effectively the service that compile source code, runs tests, and produces software packages that are ready to deploy in the process de CI-CD.

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

            Image e Image version : Select always the latest image for this runtime version

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

    1 - Authentication failed on log of Code Build, missing ECR Authentication:

        Go into your 'Code Build' Project. 
        
        Edit -> Enviroment , and get the name of Role created;

        Go To IAM > Roles , search for 'codebuild-<>-service-role' , go into this

        Add Permission > Attach Policies > Create Policy > View in JSON

        Copy and paste all code above: 

        ---------------

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
                        "ecr:GetAuthorizationToken"
                    ],
                    "Resource": [
                        "*"
                    ]
                }, 
                {
                    "Sid": "S3BucketIdentity",
                    "Effect": "Allow",
                    "Action": [
                        "s3:GetBucketAcl",
                        "s3:GetBucketLocation"
                    ],
                    "Resource": [
                        "*"
                    ]
                }
            ]
        }

        --------------------- Next;Create Policy; Give Policy name; Finish;

        Run Again the build process, clicking on 'Start Build';

    2 - Differents Errors of 'docker push'

        When the build runs, each time, can be showed in logs, errors of:

        Missing permission to "ecr:UploadLayerPart","ecr:CompleteLayerUpload","ecr:PutImage"

        Edit your role>permission and include each one, at the section:

        .....
            "Sid": "ECRPullPolicy",
            "Effect": "Allow",
            "Action": [
                "ecr:BatchCheckLayerAvailability",
                "ecr:GetDownloadUrlForLayer",
                "ecr:InitiateLayerUpload",
                "ecr:BatchGetImage",
                "ecr:UploadLayerPart",
                "ecr:CompleteLayerUpload",
                "ecr:PutImage"
            ],
            "Resource": [
                "*"
            ]  
        ..... 

# Code Pipeline - CD Continous Delivery

    About: AWS CodePipeline is a fully managed continuous delivery service that helps you automate your software release process. It allows you to model, visualize, and automate the steps required to release your software. CodePipeline builds, tests, and deploys your code every time there is a code change, based on the release model you define. It also integrates with other AWS services such as CodeCommit, CodeBuild, and CodeDeploy to provide a complete release pipeline solution.
    
    Search for 'Code Commit' on AWS , on left menu, 'Pipeline', click on 'Pipelines'

    Click on 'Create pipeline':

    Step 1:

        Pipeline name

    Step 2:

        Select Source Provider: AWS Code Commit ;

        Select the Repository Name;

        Branch name: e.g 'master'

    Step 3:

        Select the Build Provider : 'AWS CodeBuild' 

        Region: US East (N.Virginia)

        Project Name: select the one you're working

    Step 4:

        Deploy provider: select the ECS you are working

        Region: US East (N.Virginia)

        Cluster name

        Service name

        Image definitions file - optional - 'imagedefinitions.json'

    Step 5:

        Review and finish

# Helpfuls : 

https://www.youtube.com/playlist?list=PLMpVQWIR2lKcbHCV3eIIT5kpvyYP2I-tJ