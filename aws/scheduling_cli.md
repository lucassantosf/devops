# How schedule taks via AWS Cli

//Criar 
aws application-autoscaling put-scheduled-action --service-namespace ecs --scalable-dimension ecs:service:DesiredCount --resource-id service/YetzEstoque/YetzEstoqueServiceApplication --scheduled-action-name YetzEstoqueServiceApplicationDOWN --schedule "cron(0 1 * * ? *)" --scalable-target-action MinCapacity=1,MaxCapacity=10

//deletar
aws application-autoscaling delete-scheduled-action --service-namespace ecs --scalable-dimension ecs:service:DesiredCount --scheduled-action-name YetzEstoqueServiceApplicationDOWN --resource-id service/YetzEstoque/YetzEstoqueServiceApplication 

//Consultar
aws application-autoscaling describe-scheduled-actions --service-namespace ecs  --scheduled-action-names YetzEstoqueServiceApplicationTEST
