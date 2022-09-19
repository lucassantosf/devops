***# Cluster

Um cluster de container é um agrupamento de contêineres que compartilham os mesmos recursos computacionais, como armazenamento. 
Um cluster de container permite a execução de centenas de containers de aplicações, de forma eficiente e sem concorrência de recursos.

# PODs

Um POD é um conjunto de um ou mais containers. Sempre que nós criamos um pod ele ganha um endereço IP. Então o endereço IP não é mais do container, e sim do nosso pod. Dentro do nosso pod nós temos total liberdade de fazermos um mapeamento de portas para os IPs que são atribuídos a esse pod.

# Services

ClusterIP - a comunição que se da atraves de forma interna do cluster, não é um serviço de acesso ao cluster de forma externa.

NodePort - serve para expor o container para acesso de forma externa

LoadBalancer - abre comunicação para o mundo externo usando o LoadBalancer do provedor (AWS, Google Cloud, Azure).

# ConfigMap (Variáveis de Ambiente)

# ReplicaSets

# Deployments

# Volumes

# StatefulSet

# Probes
