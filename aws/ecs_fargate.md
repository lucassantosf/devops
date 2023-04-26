# About

    Serveless;    
    Set task memory and CPU only
    Follow the steps below:

# Create Load Balancer :

    Go to EC2 area, on left menu 'Load Balancers', and create one giving it a name; 

    On SG, can receive requests from anywhere to port 80;

# Create Cluster :
    
    Create one based on Fargate template;

    Give a name;

# Task Definition :
    
    Template Fargate;
    Name;
    AddContainer; (name, image, port mapping of ENI)
s
# Configure Task  on Cluster :

    Go to cluster created, and click tab 'Tasks' on button 'Run Task' to select the task created step before

    Number of tasks;

    Cluster VPC;

    Subnets;

    SG;

    Auto-assign public IP; ENABLED;


# Helpfuls : 

https://www.youtube.com/playlist?list=PLMpVQWIR2lKcbHCV3eIIT5kpvyYP2I-tJ