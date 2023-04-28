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



Criar ECR registry para workers
    fazer build,tag,push com os comandos do painel
    O build pode ser feito apartir da raiz e colocando o contexto de onde ta o dockerfile no -f
    docker build -t dh/myimage -f Dockerfile_test .
Criar cluster (nao precisa criar outro,ja tem, pois o cluster da api e dos workers serao os mesmos no final)
Criar (task definition com a imagem dos works da primeira etapa)
Criar service com 1 desired task
Testar
