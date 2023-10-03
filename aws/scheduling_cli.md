# How schedule taks via AWS Cli

### Consultar regras atuais agendadas de UP e DOWN

aws application-autoscaling describe-scheduled-actions --service-namespace ecs  --scheduled-action-names YetzEstoqueServiceApplicationUP

aws application-autoscaling describe-scheduled-actions --service-namespace ecs  --scheduled-action-names YetzEstoqueServiceApplicationDOWN

### Criar regras de UP e DOWN

aws application-autoscaling put-scheduled-action --service-namespace ecs --scalable-dimension ecs:service:DesiredCount --resource-id service/YetzEstoque/YetzEstoqueServiceApplication --scheduled-action-name YetzEstoqueServiceApplicationUP --schedule "cron(0 10 * * ? *)" --scalable-target-action MinCapacity=4,MaxCapacity=10

aws application-autoscaling put-scheduled-action --service-namespace ecs --scalable-dimension ecs:service:DesiredCount --resource-id service/YetzEstoque/YetzEstoqueServiceApplication --scheduled-action-name YetzEstoqueServiceApplicationDOWN --schedule "cron(0 4 * * ? *)" --scalable-target-action MinCapacity=2,MaxCapacity=10

### Deletar

aws application-autoscaling delete-scheduled-action --service-namespace ecs --scalable-dimension ecs:service:DesiredCount --scheduled-action-name YetzEstoqueServiceApplicationUP --resource-id service/YetzEstoque/YetzEstoqueServiceApplication 

aws application-autoscaling delete-scheduled-action --service-namespace ecs --scalable-dimension ecs:service:DesiredCount --scheduled-action-name YetzEstoqueServiceApplicationDOWN --resource-id service/YetzEstoque/YetzEstoqueServiceApplication 

## OBS: Não tem como editar, precisa deletar e subir novas configurações ou horários

# Execute command inside container ECS

## List tasks
aws ecs list-tasks --cluster <CLUSTER_NAME> --service <SERVICE_CONTAINER>

## Describe task
aws ecs describe-tasks --cluster <CLUSTER_NAME> --tasks <TASK_ID> --query 'tasks[].containers[].containerArn'

## Execute command inside task container
aws ecs execute-command --cluster <CLUSTER_NAME> --task <TASK_ID> --container <SERVICE_CONTAINER> --command "/bin/bash"
