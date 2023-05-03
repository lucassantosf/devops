# About

    A service in AWS, that allows a static frontend html (or ReactJS) can be put into a Bucket S3 and serve as a CloudFront Distribution Application (web page) without any server (EC2) - The concept "Serverless";

# Creating one

## First: Bucket S3 as Web Page

    Search for 'S3' service in AWS;

    Click on 'Create bucket';

    Give a name : 'subdomain*.domain.com.br' (to facilitate identify after, that bucket corresponds to the domain) 

    AWS Region: US East (N. Virginia) (only this region works as bucket for Cloudfront)

    Object Ownership: ACLs disabled (recommended) - Bucket owner enforced

    The bucket needs have Public Access

    Amazon S3 managed keys (SSE-S3)

    Bucket Key Enable

    Create;

    ----

    NOTE:

    After created, edited it to force public acess:

    Go in Tab 'Permissions' - Bucket Policy, and paste something like this:

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

    Save Changes;

    After saved, need to apeer a red label 'Publicly accessible';

    - Upload your static files into Bucket on root path 

    index.html
    static/**
    All assets

    Save Changes;

    ----

    Configure Bucket to be a host do static page:

    Tab 'Properties'

    Static website hosting - edit

    Enable

    Hosting type - Host a static website

    Index document - index.html

    Error document - index.html

    Save Changes;

## Second: CloudFront 

    Search for 'CloudFront' service in AWS;

    Click on 'Create distribution';

        Origin domain: select the Bucket S3 created step before;

        Click on 'Use website endpoint'

        Default cache behavior
        
        Viewer protocol policy : Redirect HTTP to HTTPS
    
    Origin access: 

    All others options can be leaved as default;

    Save it clicking on 'Create distribution'; 

    Wait some minutes for Deploy process conclues;

    After , access the cloudfront example URL given : Eg: d2ampflqbz6itz.cloudfront.net

# Optional: Configure a different domain

    By default, the domain of CloudFront created step before will have a difficult and long name to access it, like:

    http://<BUCKET-NAME>.s3-website-us-east-1.amazonaws.com

## Configure another one:

    Search for 'Certificate Manager' service in AWS;
    
    Click on 'Request'

    Request a public certificate > Next 

    Fully qualified domain name : E.g <app.domain.com>

    Click on 'Request' to finish it, 

    After this, copy the CNAME key and value and include a new record in Route 53 or use the shortcute to create this direct into Route 53

    This way, the certificate SSL will be checked and need be approved in 'Green' so soon

    NOTE : Only continue if it gets 'Green'

    OBSERVATION : YOU NEED A DOMAIN/HOST ZONE ALREADY CREATED

## Configure CloudFront 

    Edit your Cloudfront on Area 'Settings':

    1- Put Alternate domain name (CNAME) - your domain <app.domain.com>

        Select the SSL created step before - It needs to be showed

    2- Tab 'Origins'

        In Origin Domain selcct the S3 bucket 

        Protocol HTTP only

        At the end, it need to be a Origin Type 'Custom Origin'

    3- Tab 'Behaviors' to FORCE HTTPS

        Edit the only entry, in the area
        
        'Viewer protocol policy' select - Redirect HTTP to HTTPS

    ----

    Save Changes

## Configure Route 53 Final - Type A

    After All , create a record in your hosted zone, with:

    Type A -> appointing to your CloudFront Distribution and save 

    Ready ! 
    
    Your final Domain needs work

# Helpfuls:

Deploy Static Website to AWS S3 with HTTPS using CloudFront

https://www.youtube.com/watch?v=o2HTkVxzivA