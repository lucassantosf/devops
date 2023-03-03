# Create a Auto Scalling Model with Load Balancer ELB :

1. After you have a EC2 instance ready (api running, docker installed, etc),
    create a Image of it on EC2 area

2. Go to 'Launch Templates' left menu on EC2

3. Create 'Launch Tempaltes' with:

    Name;

    Description;

    Select the Image created on first step;

    Key Pair: select the .pem used

    Network settings: select the SG used

    All others: default options

4. Search for left Menu => Auto Scaling - Auto Scaling Groups

    Click on Create Auto Scaling Group

    Give a Name;

    Chose the Launch Template created on step before

    Network settings: select the VPC and all Subnets used

    Next;

    Select the Load Balancer created and TargetGroup

    Next;

    

# Helpfuls :

Class - Auto Scaling Model com ELB Elastic Load Balancer

https://www.youtube.com/watch?v=fidFQ2ocqsI&list=PLOF5f9_x-OYUaqJar6EKRAonJNSHDFZUm&index=12    