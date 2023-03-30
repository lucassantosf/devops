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

    Version: Latest (1)

    Network settings: select the VPC and all Subnets used

    Next;

    Select option to Attach to a Load Balancer and Select the Load Balancer created and TargetGroup

    Select Health Checker of ELB

    Next;

    Select the Capacidade desejada

    Capacidade minima
    
    Capacidade maxima

    Políticas de escalabilidade - opcional - Informar a Amazon qual é o critério de Escalar

        Select Política de dimensionamento com monitoramento do objetivo 

        Ex: usage of CPU , valor de destino 50 

        As maquinas precisam 300 segundos de iniciar

    Next;

    Finish

# Helpfuls :

Class - Auto Scaling Model com ELB Elastic Load Balancer

https://www.youtube.com/watch?v=fidFQ2ocqsI&list=PLOF5f9_x-OYUaqJar6EKRAonJNSHDFZUm&index=12    