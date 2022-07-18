Aula 1
ReplicaSets
Criar/replicar pods caso algum falhe enquanto funcione, este serviço gerencia a disponibilidade de pods em quantidade de quantas replicas vamos manter

Deployments
Também tem a mesma funcionalidade do Replicaset, com uma funcionalidade além de auditar alterações dos arquivos yml, como fosse o Git, onde é possivel 
alterar para versoes especificas dos arquivos.

Volumes
Volumes possuem ciclos de vida independente dos containers. Porém são dependentes dos pods.

StatefulSet
Serve para persistir dados em volumes para os pods utilizarem

Probes
Tornar visível ao Kubernetes que uma aplicação não está se comportando da maneira esperada.