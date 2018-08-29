<?php
	
	class Celular{

		private $modelo;
		private $valor;
		private $descricao;
		private $camera;

		public function getModelo():string{
			return $this->modelo;
		}
		public function setModelo($modelo){
			$this->modelo = $modelo;
		}

		public function getValor():int{
			return $this->valor;
		}
		public function setValor($valor){
			$this->valor = $valor;
		}

		public function getDescricao():string{
			return $this->descricao;
		}
		public function setDescricao($descricao){
			$this->descricao = $descricao;
		}

		public function getCamera():bool{
			return $this->camera;
		}
		public function setCamera($camera){
			$this->camera = $camera;
		}
	}

	class Motorola extends Celular{		
		function __construct(){
			echo "Método Construtor em execucao";
		}

		public function exibirTudo(){
			echo $this->modelo."<br/>";
		}
	}

	$motoE = new Motorola();	
	$motoE->setModelo("Motorola E");
	$motoE->setValor(400);
	$motoE->setDescricao("Celular especifico para vendas, possui camera");
	$motoE->setCamera(true);

	$motoE->exibirTudo();
?>