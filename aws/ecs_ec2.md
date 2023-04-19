
2 tipos de clusters - baseado em máquinas EC2 ou Fargate (Tasks)

- Definir 4 IAM roles

    EC2 Instance Profile
    ECS Task Role
    ECS Role
    Autoscalling Role

- Criar Cluster TIPO EC2 

    Buscar por ECS no console

    Menu Cluster -> Create Cluster

    Template: EC2

    Next;

    Cluster name 

    Provisioning Model: On-Demanda Instance

    Instance Type: t2.micro (free-tier)

    Number of intances: 1

    Volume Size: 30

    Networking: 

        ---

    Container instance IAM ROLE : select the 'EC2 Instance';

    Create;

# Task Definition:

    Left Menu: Task Definitions

    Create new Task Definitions

    Select launch type compatibility EC2

    Task Definition name :

    Task Role: none

    Network Mode: <default>

    Task definition Role: none

    Task size: 
        
        Task memory (Mib) 350 (exemplo de valor)

        Task CPU (unit) 300

    Add container definition

        Container name : 
        image : colocar endereço ECR (serviço de imagens da AWS) 
        memory limits : hard limit 300
        ports mapping
            8080:80 tcp

    Create;

    Go back into 'Clusters'

    Tab 'Tasks' - run new task:

        Launch Type: EC2

        Cluster: select one that is being used

        Number of tasks : 1 

        Taks Placement: AZ Balanced Spread

# Service :

    Definir como a task deve rodar no cluster

    Go back into 'Clusters'

    Tab 'Service' - create:

        Launch Type: EC2
        
        Task definition: select the one created step before

        Cluster: select one that is being used

        Service name:

        Service Type: REPLICA

    Deployments: 

        Deployment type : Rolling update

    Taks Placement: AZ Balanced Spread

    Next;

    Load Balacing None

# Helpfuls : 

https://www.youtube.com/playlist?list=PLMpVQWIR2lKcbHCV3eIIT5kpvyYP2I-tJ