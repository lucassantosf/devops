Aula 1 - Conhecendo o Kubernetes

Escalabilidade Vertical - Determinado recurso atingiu seu limite, e para aumentar, adquirimos um recurso com maior capacidade e que atenda aos requisitos. Ex:
se uma EC2 atingir o limite de processamento e memória para os seus containers, o natural nesta escalabilidade seria adquirir uma instancia com maior limite de recursos.

Escalabilidade Horizontal - Determinado recurso atingiu seu limite, e para aumentar, adquirimos um novo (do mesmo recurso, em termos de capacidade) e fazermos comunicar-se entre si, todos, em paralelo, em conjuntos.

Cluster- duas ou mais máquinas trabalhando em conjunto.

Kubernates - sua função é orquestrar o funcionamento das máquinas no cluster de forma automática.

Arquitetura Kubernates
Dentro do cluster, as maquinas podem ser do tipo Master e do Tipo Node
Master- Gerenciar o cluster; manter e atualizar o estado desejado; receber e executar novos comandos;
	(Control Pane) - c-m;api;sched;etcd;
Node - Executar as aplicações
	(Nodes) - para cada node, temos um kubelet e k-proxy;
	
A Api é responsável por fazer a comunicação entre todos os componentes de acordo ao mundo externo;
Comunicamos com a api através do kubectl

Aula 2 - Criando o cluster
Instalar via documentação oficial kubernates.io o kubectl https://kubernetes.io/docs/tasks/tools/install-kubectl-linux/
Instalar via documentação oficial o minikube https://minikube.sigs.k8s.io/docs/start/

Iniciar o cluster
minikube cluster --vm-driver=virtualbox

Aula 3 - Criando e entendendo PODS
Pods podem ser efemeros, ou seja, podem ser destruidos e criados em sequencia. Um POD pode ter mais de um container.

Aula 4 - Services

ClusterIP - a comunição que se da atraves de forma interna do cluster, não é um serviço de acesso ao cluster de forma externa.

NodePort - serve para expor o container para acesso de forma externa

LoadBalancer - abre comunicação para o mundo externo usando o LoadBalancer do provedor (AWS, Google Cloud, Azure).

Aula 6 - ConfigMap

Serve para organizar informações para configurar um determinado serviço, auxiliando na criação de variáveis de ambiente.