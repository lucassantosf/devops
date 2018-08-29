<?php

	class Endereco {
		
		private $logradouro;
		private $numero;
		private $cidade;

		public function __construct($logradouro,$numero,$cidade){
			$this->logradouro = $logradouro;
			$this->numero = $numero;
			$this->cidade = $cidade;
		}

		public function __destruct(){
			//metodo destrutor 
			//var_dump("Destruir");
		}

		public function __toString(){
			return $this->logradouro.", ".$this->numero.", ".$this->cidade;
		}

	}

	$Endereco = new Endereco("Rua Tal de Leao",130,"Sorocaba");
	var_dump($Endereco);
	// é opcional - > unset($Endereco);
	echo $Endereco;
?>