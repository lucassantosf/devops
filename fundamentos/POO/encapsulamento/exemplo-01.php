<?php

	class Pessoa{
		public $nome = "Rasmus Lerdorf"; //criador php
		protected $idade = 46;
		private $senha = "123456";

		public function verDados(){
			echo $this->nome."<br/>";
			echo $this->idade."<br/>";
			echo $this->senha."<br/>";
		}
		
	}

	$objeto = new Pessoa();
	//echo $objeto->nome."<br/>";
	//echo $objeto->idade."<br/>";
	//echo $objeto->senha."<br/>";
	$objeto->verDados();
?>