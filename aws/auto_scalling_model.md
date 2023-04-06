# Create a Auto Scalling Model with Load Balancer ELB :

1. After you have an EC2 instance ready (api running, docker installed, etc), create a Image of it on EC2 area

2. Go to 'Launch Templates' left menu on EC2

3. Create 'Launch Templates' with:

    Name;

    Description;

    Select the Image created on first step;

    Key Pair: select the .pem used

    Network settings: select the SG_API used and subnet-1

    All others: default options

4. Search for left Menu => Auto Scaling - Auto Scaling Groups

    Click on Create Auto Scaling Group

    Give a Name;

    Choose the Launch Template created on step before

    Version: Latest (1)

    Next;

    Network settings: select the VPC and all Subnets used

    Next;

    Select option to Attach to a Load Balancer and Select the Load Balancer created and TargetGroup

    Select Health Checker of ELB

    Next;

    Select the Desire Capacity of machine runnings

    Capacity min
    
    Capacity max

    Scalability Policies - Optional - Inform Amazon of the criteria for Scaling

        Select Sizing policy with objective monitoring 

        Eg: usage of CPU , targe value 50 

        Machines need 300 seconds to start

    Next;

    Finish

# Helpfuls :

Class - Auto Scaling Model com ELB Elastic Load Balancer

https://www.youtube.com/watch?v=fidFQ2ocqsI&list=PLOF5f9_x-OYUaqJar6EKRAonJNSHDFZUm&index=12    