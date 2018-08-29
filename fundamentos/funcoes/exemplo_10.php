<?php	
	//novidades php 7 - funcao anonima
	function teste($callback){

		//processo lento
		$callback();

	}

	teste(function(){
		echo "Terminou";
	});

?>