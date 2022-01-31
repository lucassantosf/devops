Aula 1 - Conhecendo o Kubernetes

Escalabilidade Vertical - Determinado recurso atingiu seu limite, e para aumentar, adquirimos um recurso com maior capacidade e que atenda aos requisitos. Ex:
se uma EC2 atingir o limite de processamento e memória para os seus containers, o natural nesta escalabilidade seria adquirir uma instancia com maior limite de recursos.

Escalabilidade Horizontal - Determinado recurso atingiu seu limite, e para aumentar, adquirimos um novo (do mesmo recurso, em termos de capacidade) e fazermos comunicar-se entre si, todos, em paralelo, em conjuntos.

Cluster- duas ou mais máquinas trabalhando em conjunto.

Kubernates - sua função é orquestrar o funcionamento das máquinas no cluster de forma automática.

Arquitetura Kubernates
Dentro do cluter, as maquinas podem ser do tipo Master e do Tipo Node
Master- Gerenciar o cluter; manter e atualizar o estado desejado; receber e executar novos comandos;
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







































deb http://br.archive.ubuntu.com/ubuntu/ groovy-updates main restricted
# deb-src http://br.archive.ubuntu.com/ubuntu/ groovy-updates main restricted

## N.B. software from this repository is ENTIRELY UNSUPPORTED by the Ubuntu
## team. Also, please note that software in universe WILL NOT receive any
## review or updates from the Ubuntu security team.
deb http://br.archive.ubuntu.com/ubuntu/ groovy universe
# deb-src http://br.archive.ubuntu.com/ubuntu/ groovy universe
deb http://br.archive.ubuntu.com/ubuntu/ groovy-updates universe
# deb-src http://br.archive.ubuntu.com/ubuntu/ groovy-updates universe

## N.B. software from this repository is ENTIRELY UNSUPPORTED by the Ubuntu 
## team, and may not be under a free licence. Please satisfy yourself as to 
## your rights to use the software. Also, please note that software in 
## multiverse WILL NOT receive any review or updates from the Ubuntu
## security team.
deb http://br.archive.ubuntu.com/ubuntu/ groovy multiverse
# deb-src http://br.archive.ubuntu.com/ubuntu/ groovy multiverse
deb http://br.archive.ubuntu.com/ubuntu/ groovy-updates multiverse
# deb-src http://br.archive.ubuntu.com/ubuntu/ groovy-updates multiverse

## N.B. software from this repository may not have been tested as
## extensively as that contained in the main release, although it includes
## newer versions of some applications which may provide useful features.
## Also, please note that software in backports WILL NOT receive any review
## or updates from the Ubuntu security team.
deb http://br.archive.ubuntu.com/ubuntu/ groovy-backports main restricted universe multiverse
# deb-src http://br.archive.ubuntu.com/ubuntu/ groovy-backports main restricted universe multiverse

## Uncomment the following two lines to add software from Canonical's
## 'partner' repository.
## This software is not part of Ubuntu, but is offered by Canonical and the
## respective vendors as a service to Ubuntu users.
# deb http://archive.canonical.com/ubuntu groovy partner
# deb-src http://archive.canonical.com/ubuntu groovy partner

deb http://security.ubuntu.com/ubuntu groovy-security main restricted
# deb-src http://security.ubuntu.com/ubuntu groovy-security main restricted
deb http://security.ubuntu.com/ubuntu groovy-security universe
# deb-src http://security.ubuntu.com/ubuntu groovy-security universe
deb http://security.ubuntu.com/ubuntu groovy-security multiverse
# deb-src http://security.ubuntu.com/ubuntu groovy-security multiverse

# This system was installed using small removable media
# (e.g. netinst, live or single CD). The matching "deb cdrom"
# entries were disabled at the end of the installation process.
# For information about how to configure apt package sources,
# see the sources.list(5) manual.

