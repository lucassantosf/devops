# IAM Roles
    
    Definir 4 IAM roles

    -EC2 Instance Profile
    -ECS Task Role
    -ECS Role
    -Autoscalling Role

# Cluster TIPO EC2 

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

# ECS com Application Load Balancer :

    Serve para fazer o Mapeamento dinamico de portas entre as instancias ec2 

    Create first a Load Balancer to use 

    After, create again the cluster like fist step, but selecting the Load balancer created 

# AutoScalling no serviço/tarefa :

    Atualizar o cluster atual, na aba de 'Auto Scalling' da para ver que nao tem nada

    Clicar em Update

    Editar number of task de 4->2

    Next;

    Step 3 : Configurar AutoScalling

        Configurar alarmes e parametros de IN e OUT de escalar

# AutoScalling com Capacity Provider :

    Somente disponivel para o cluster tipo EC2

    Crie novamente um cluster 

    

# Helpfuls : 

https://www.youtube.com/playlist?list=PLMpVQWIR2lKcbHCV3eIIT5kpvyYP2I-tJ