<?php

	abstract class Animal{
		public function falar(){
			return "Som ";
		}
		public function mover(){
			return "Andar ";
		}
	}

	class Cachorro extends Animal	{		
		function __construct(){			
		}
		public function falar(){
			return "Late" ;
		}
	}

	class Gato extends Animal{		
		function __construct(){			
		}
		public function falar(){
			return "Mia";
		}
	}

	class Passaro extends Animal{		
		function __construct(){			
		}
		public function falar(){
			return "Canta";
		}
		public function mover(){
			//ACESSANDO STATICAMENTE O METODO HERDADO
			return "Voar e ".parent::mover();
		}
	}

	$pluto = new Cachorro();
	echo $pluto->falar()."<br/>";
	echo $pluto->mover()."<br/>";

	echo "----------------------<br/>";

	$garfield = new Gato();
	echo $garfield->falar()."<br/>";
	echo $garfield->mover()."<br/>";

	echo "----------------------<br/>";

	$BIRD = new Passaro();
	echo $BIRD->falar()."<br/>";
	echo $BIRD->mover()."<br/>";

?>