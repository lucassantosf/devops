# Deploy AWS Elastic Load Balancer ELB :

1. On EC2 area , look up for 'Load Balance' on left menu, 'Create load balancer'

2. Select the ELB type 

    Give a name

    --------------
    Scheme - Internet-facing (public expost)

    --------------
    IP address type - IPV4

    --------------
    Listeners : Add ports 80 e 443 (if domaind don't have certificate, don't add this port for while)

    --------------
    Network mapping

        Select the VPC created and used and all zones used on VPC 

    --------------
    Select Security Group 

        Create a new Security Group for only use LoadBalancer

        And after, allow this SG_ELB on SG inboud rules of API


    --------------
    --------------



# Helpfuls :

Class - Configuratin ELB on AWS

https://www.youtube.com/watch?v=8vcrE0FojKY&list=PLOF5f9_x-OYUaqJar6EKRAonJNSHDFZUm&index=11