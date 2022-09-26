# Arquitetura Kubernates

Dentro do cluster, as maquinas podem ser do tipo Master e do Tipo Node
Master- Gerenciar o cluster; manter e atualizar o estado desejado; receber e executar novos comandos;
	(Control Pane) - c-m;api;sched;etcd;
Node - Executar as aplicações
	(Nodes) - para cada node, temos um kubelet e k-proxy;

A Api é responsável por fazer a comunicação entre todos os componentes de acordo ao mundo externo;
Comunicamos com a api através do kubectl

# Criar cluster

Um cluster de container é um agrupamento de contêineres que compartilham os mesmos recursos computacionais, como armazenamento. 
Um cluster de container permite a execução de centenas de containers de aplicações, de forma eficiente e sem concorrência de recursos.

Instalar via documentação oficial kubernates.io o kubectl https://kubernetes.io/docs/tasks/tools/install-kubectl-linux/
Instalar via documentação oficial o minikube https://minikube.sigs.k8s.io/docs/start/

Iniciar o cluster
minikube cluster --vm-driver=virtualbox

# PODs

Um POD é um conjunto de um ou mais containers. Sempre que nós criamos um pod ele ganha um endereço IP. Então o endereço IP não é mais do container, e sim do nosso pod. Dentro do nosso pod nós temos total liberdade de fazermos um mapeamento de portas para os IPs que são atribuídos a esse pod.

# Services

ClusterIP - a comunição que se da atraves de forma interna do cluster, não é um serviço de acesso ao cluster de forma externa.
NodePort - serve para expor o container para acesso de forma externa
LoadBalancer - abre comunicação para o mundo externo usando o LoadBalancer do provedor (AWS, Google Cloud, Azure).

# ConfigMap (Variáveis de Ambiente)

Serve para organizar informações para configurar um determinado serviço, auxiliando na criação de variáveis de ambiente.

# ReplicaSets

A finalidade de um ReplicaSet é manter um conjunto estável de pods de réplica em execução a qualquer momento. Como tal, é frequentemente usado para garantir a disponibilidade de um número especificado de Pods idênticos. Caso algum falhe, este serviço gerencia a disponibilidade da quantidade de 
replicas que desejamos do mesmo POD.

# Deployments

Também tem a mesma funcionalidade do Replicaset, mas vai auditar alterações dos arquivos yml, como fosse um 'Git', onde é possivel 
alterar para versoes especificas do arquivo yml.
Deployment nada mais é do que uma camada acima de um ReplicaSet. Então, quando nós definimos um Deployment, nós estamos, automaticamente, definindo um ReplicaSet

# Volumes

Volumes possuem ciclos de vida independente dos containers. Porém são dependentes dos pods.
Um Pod é capaz de utilizar qualquer quantidade de tipos de volumes simultaneamente. Os tipos de volume efêmeros têm a mesma vida útil do pod, mas os volumes persistentes existem além da vida útil de um pod. Quando um pod deixa de existir, o Kubernetes destrói volumes efêmeros; no entanto, o Kubernetes não destrói volumes persistentes. Para qualquer tipo de volume em um determinado pod, os dados são preservados entre as reinicializações do contêiner.

# StatefulSet
***Serve para persistir dados em volumes para os pods utilizarem

# Probes
***Tornar visível ao Kubernetes que uma aplicação não está se comportando da maneira esperada.

# Escalabilidade 
Escalabilidade Vertical - Determinado recurso atingiu seu limite, e para aumentar, adquirimos um recurso com maior capacidade e que atenda aos requisitos. 
Ex: EC2 atingir o limite de processamento e memória para os seus containers, o natural nesta escalabilidade seria adquirir uma instancia com maior limite de recursos.

Escalabilidade Horizontal - Determinado recurso atingiu seu limite, e para aumentar, adquirimos um novo (do mesmo recurso, em termos de capacidade) e fazermos comunicar-se entre si, todos, em paralelo, e em conjunto.


crontab -e

save as test.sh

curl https://yetz.app/api/passo-a-passo -o myfile.txt

* * * * * /usr/bin/sh /home/lucas/test.sh