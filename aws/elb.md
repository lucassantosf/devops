# Deploy AWS Elastic Load Balancer ELB :

1. On EC2 area , look up for 'Load Balance' on left menu, 'Create load balancer'

2.  Steps:

    Select the ELB type : < Choose HTTP option >

    --------------

    Give the load balancer name

    --------------

    Scheme : Internet-facing (public expost)

    --------------
    
    IP address type : IPV4

    --------------

    Network Mapping

        Select the VPC created and used and all zones used on your VPC 
    
    --------------

    Select Security Group 

    Create a new Security Group for only LoadBalancer usage

        Allowing port HTTP 80/443* on 'Inbound Rules' for 0.0.0.0

    And after, allow this SecurityGroup_ELB port 80 on SG inbound rules of API
    
    --------------

    Listeners : Add ports 80 and 443 (if you don't have domain or domain don't have SSL certificate, don't add this port for while)

    Select or Create 'Target Group Option'

        To create , steps: 

            Type target : Instance

            Protocol : HTTP

            Port : 80

            Protocol Version : HTTP 

            Health checks : Put a path on application to receve a request and status code 200 response 

                "/api/ping" -> '{pong:'ok'}' : 200  

            Next

            Select the instance EC2 is running

                Click on 'Include as pending below'

    --------------
    
    Finish the creation

# Health Check

    It's necessary that Target Group has done the Healty Check on your path described before.

# Helpfuls :

Class - Configuratin ELB on AWS

https://www.youtube.com/watch?v=8vcrE0FojKY&list=PLOF5f9_x-OYUaqJar6EKRAonJNSHDFZUm&index=11