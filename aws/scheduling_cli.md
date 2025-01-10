# How schedule taks via AWS Cli

## OBS: Não é possivel editar, precisa deletar e subir novas configurações ou horários

### Consultar regras atuais agendadas de UP e DOWN

    Estoque:

        aws application-autoscaling describe-scheduled-actions --service-namespace ecs  --scheduled-action-names YetzEstoqueServiceApplicationUP

        aws application-autoscaling describe-scheduled-actions --service-namespace ecs  --scheduled-action-names YetzEstoqueServiceApplicationDOWN

    Pay:

        aws application-autoscaling describe-scheduled-actions --service-namespace ecs  --scheduled-action-names YetzPayApiV1UP

        aws application-autoscaling describe-scheduled-actions --service-namespace ecs  --scheduled-action-names YetzPayApiV1DOWN

    Message:

        aws application-autoscaling describe-scheduled-actions --service-namespace ecs  --scheduled-action-names YetzMessageApiUP

        aws application-autoscaling describe-scheduled-actions --service-namespace ecs  --scheduled-action-names YetzMessageApiDOWN

### Criar regras de UP e DOWN

    Estoque:
    
        aws application-autoscaling put-scheduled-action --service-namespace ecs --scalable-dimension ecs:service:DesiredCount --resource-id service/YetzEstoque/YetzEstoqueServiceApplication --scheduled-action-name YetzEstoqueServiceApplicationUP --schedule "cron(30 9 * * ? *)" --scalable-target-action MinCapacity=4,MaxCapacity=10

        aws application-autoscaling put-scheduled-action --service-namespace ecs --scalable-dimension ecs:service:DesiredCount --resource-id service/YetzEstoque/YetzEstoqueServiceApplication --scheduled-action-name YetzEstoqueServiceApplicationDOWN --schedule "cron(30 2 * * ? *)" --scalable-target-action MinCapacity=2,MaxCapacity=10 

    Pay:

        aws application-autoscaling put-scheduled-action --service-namespace ecs --scalable-dimension ecs:service:DesiredCount --resource-id service/YetzPay/api-v1 --scheduled-action-name YetzPayApiV1UP --schedule "cron(0 11 * * ? *)" --scalable-target-action MinCapacity=6,MaxCapacity=40

        aws application-autoscaling put-scheduled-action --service-namespace ecs --scalable-dimension ecs:service:DesiredCount --resource-id service/YetzPay/api-v1 --scheduled-action-name YetzPayApiV1DOWN --schedule "cron(30 01 * * ? *)" --scalable-target-action MinCapacity=3,MaxCapacity=20

    Message:

        aws application-autoscaling put-scheduled-action --service-namespace ecs --scalable-dimension ecs:service:DesiredCount --resource-id service/YetzMessage/yetz-message-service-api-v2 --scheduled-action-name YetzMessageApiUP --schedule "cron(0 11 * * ? *)" --scalable-target-action MinCapacity=4,MaxCapacity=10

        aws application-autoscaling put-scheduled-action --service-namespace ecs --scalable-dimension ecs:service:DesiredCount --resource-id service/YetzMessage/yetz-message-service-api-v2 --scheduled-action-name YetzMessageApiDOWN --schedule "cron(0 3 * * ? *)" --scalable-target-action MinCapacity=2,MaxCapacity=10

### Deletar

    Estoque:

        aws application-autoscaling delete-scheduled-action --service-namespace ecs --scalable-dimension ecs:service:DesiredCount --scheduled-action-name YetzEstoqueServiceApplicationUP --resource-id service/YetzEstoque/YetzEstoqueServiceApplication 

        aws application-autoscaling delete-scheduled-action --service-namespace ecs --scalable-dimension ecs:service:DesiredCount --scheduled-action-name YetzEstoqueServiceApplicationDOWN --resource-id service/YetzEstoque/YetzEstoqueServiceApplication 

    Pay:

        aws application-autoscaling delete-scheduled-action --service-namespace ecs --scalable-dimension ecs:service:DesiredCount --scheduled-action-name YetzPayApiV1UP --resource-id service/YetzPay/api-v1

        aws application-autoscaling delete-scheduled-action --service-namespace ecs --scalable-dimension ecs:service:DesiredCount --scheduled-action-name YetzPayApiV1DOWN --resource-id service/YetzPay/api-v1

    Message:

        aws application-autoscaling delete-scheduled-action --service-namespace ecs --scalable-dimension ecs:service:DesiredCount --scheduled-action-name YetzMessageApiUP --resource-id service/YetzMessage/yetz-message-service-api-v2

        aws application-autoscaling delete-scheduled-action --service-namespace ecs --scalable-dimension ecs:service:DesiredCount --scheduled-action-name YetzMessageApiDOWN --resource-id service/YetzMessage/yetz-message-service-api-v2

# Execute command inside container ECS

## List tasks

    aws ecs list-tasks --cluster <CLUSTER_NAME> --service <SERVICE_CONTAINER>

## Describe task

    aws ecs describe-tasks --cluster <CLUSTER_NAME> --tasks <TASK_ID> --query 'tasks[].containers[].containerArn'

## Execute command inside task container

    aws ecs execute-command --cluster <CLUSTER_NAME> --task <TASK_ID> --container <SERVICE_CONTAINER> --command "/bin/bash"
