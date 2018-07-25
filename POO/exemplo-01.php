<?php
	
	class Pessoa {
		public $nome;//atributo
		
		public function falar(){//Método
			return "Estou falando, meu nome é ".$this->nome;
		}
	}

	$pessoa = new Pessoa();
	$pessoa->nome = "Lucas";
	echo $pessoa->falar();

?>