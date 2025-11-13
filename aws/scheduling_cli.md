# AWS CLI Scheduling and Container Management Guide

## Overview
This guide provides comprehensive instructions for managing scheduled actions and executing commands in AWS ECS (Elastic Container Service) using AWS CLI.

## Important Note
⚠️ Scheduling Configuration Limitation:
- Cannot edit existing scheduled actions
- Must delete and recreate configurations

## Scheduled Actions Management

### Viewing Current Scheduled Actions

#### Inventory Service (Estoque)
```bash
# Check UP schedule
aws application-autoscaling describe-scheduled-actions \
    --service-namespace ecs \
    --scheduled-action-names YetzEstoqueServiceApplicationUP

# Check DOWN schedule
aws application-autoscaling describe-scheduled-actions \
    --service-namespace ecs \
    --scheduled-action-names YetzEstoqueServiceApplicationDOWN
```

#### Pay Service
```bash
# Check UP schedule
aws application-autoscaling describe-scheduled-actions \
    --service-namespace ecs \
    --scheduled-action-names YetzPayApiV1UP

# Check DOWN schedule
aws application-autoscaling describe-scheduled-actions \
    --service-namespace ecs \
    --scheduled-action-names YetzPayApiV1DOWN
```

#### Message Service
```bash
# Check UP schedule
aws application-autoscaling describe-scheduled-actions \
    --service-namespace ecs \
    --scheduled-action-names YetzMessageApiUP

# Check DOWN schedule
aws application-autoscaling describe-scheduled-actions \
    --service-namespace ecs \
    --scheduled-action-names YetzMessageApiDOWN
```

### Creating Scheduled Actions

#### Inventory Service (Estoque)
```bash
# Scale UP
aws application-autoscaling put-scheduled-action \
    --service-namespace ecs \
    --scalable-dimension ecs:service:DesiredCount \
    --resource-id service/YetzEstoque/YetzEstoqueServiceApplication \
    --scheduled-action-name YetzEstoqueServiceApplicationUP \
    --schedule "cron(30 9 * * ? *)" \
    --scalable-target-action MinCapacity=4,MaxCapacity=10

# Scale DOWN
aws application-autoscaling put-scheduled-action \
    --service-namespace ecs \
    --scalable-dimension ecs:service:DesiredCount \
    --resource-id service/YetzEstoque/YetzEstoqueServiceApplication \
    --scheduled-action-name YetzEstoqueServiceApplicationDOWN \
    --schedule "cron(30 2 * * ? *)" \
    --scalable-target-action MinCapacity=2,MaxCapacity=10
```

#### Pay Service
```bash
# Scale UP
aws application-autoscaling put-scheduled-action \
    --service-namespace ecs \
    --scalable-dimension ecs:service:DesiredCount \
    --resource-id service/YetzPay/api-v1 \
    --scheduled-action-name YetzPayApiV1UP \
    --schedule "cron(0 11 * * ? *)" \
    --scalable-target-action MinCapacity=6,MaxCapacity=40

# Scale DOWN
aws application-autoscaling put-scheduled-action \
    --service-namespace ecs \
    --scalable-dimension ecs:service:DesiredCount \
    --resource-id service/YetzPay/api-v1 \
    --scheduled-action-name YetzPayApiV1DOWN \
    --schedule "cron(30 01 * * ? *)" \
    --scalable-target-action MinCapacity=3,MaxCapacity=20
```

#### Message Service
```bash
# Scale UP
aws application-autoscaling put-scheduled-action \
    --service-namespace ecs \
    --scalable-dimension ecs:service:DesiredCount \
    --resource-id service/YetzMessage/yetz-message-service-api-v2 \
    --scheduled-action-name YetzMessageApiUP \
    --schedule "cron(0 11 * * ? *)" \
    --scalable-target-action MinCapacity=4,MaxCapacity=10

# Scale DOWN
aws application-autoscaling put-scheduled-action \
    --service-namespace ecs \
    --scalable-dimension ecs:service:DesiredCount \
    --resource-id service/YetzMessage/yetz-message-service-api-v2 \
    --scheduled-action-name YetzMessageApiDOWN \
    --schedule "cron(0 3 * * ? *)" \
    --scalable-target-action MinCapacity=2,MaxCapacity=10
```

### One-Time Scheduled Action
```bash
aws application-autoscaling put-scheduled-action \
    --service-namespace ecs \
    --scalable-dimension ecs:service:DesiredCount \
    --resource-id service/YetzPay/api-v1 \
    --scheduled-action-name YetzPayApiV1DOWN_ONCE \
    --schedule "at(2025-03-01T03:01:00)" \
    --scalable-target-action MinCapacity=0,MaxCapacity=0
```

### Deleting Scheduled Actions

#### Inventory Service (Estoque)
```bash
aws application-autoscaling delete-scheduled-action \
    --service-namespace ecs \
    --scalable-dimension ecs:service:DesiredCount \
    --scheduled-action-name YetzEstoqueServiceApplicationUP \
    --resource-id service/YetzEstoque/YetzEstoqueServiceApplication 

aws application-autoscaling delete-scheduled-action \
    --service-namespace ecs \
    --scalable-dimension ecs:service:DesiredCount \
    --scheduled-action-name YetzEstoqueServiceApplicationDOWN \
    --resource-id service/YetzEstoque/YetzEstoqueServiceApplication 
```

## ECS Container Management

### List Tasks
```bash
aws ecs list-tasks \
    --cluster <CLUSTER_NAME> \
    --service <SERVICE_CONTAINER>
```

### Describe Task
```bash
aws ecs describe-tasks \
    --cluster <CLUSTER_NAME> \
    --tasks <TASK_ID> \
    --query 'tasks[].containers[].containerArn'
```

### Execute Command in Container
```bash
aws ecs execute-command \
    --cluster <CLUSTER_NAME> \
    --task <TASK_ID> \
    --container <SERVICE_CONTAINER> \
    --command "/bin/bash"
```

## Best Practices
- Use precise cron expressions
- Test scheduled actions in staging
- Monitor auto-scaling events
- Implement logging and alerts
- Regularly review and update schedules

## Security Considerations
- Use least privilege IAM roles
- Secure AWS CLI credentials
- Implement multi-factor authentication
- Audit scheduled actions regularly

## Troubleshooting
- Verify cron syntax
- Check IAM permissions
- Confirm cluster and service names
- Review CloudWatch logs

## Disclaimer
Scheduling configurations are environment-specific. Always validate and test thoroughly before production deployment.
