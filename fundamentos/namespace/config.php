<?php

	spl_autoload_register(function($nomeClass){
		
		var_dump($nomeClass);
		echo ("<br/>");
		$dirClass = "class";
		$filename = $dirClass.DIRECTORY_SEPARATOR.$nomeClass.".php";

		if(file_exists($filename)){
			require_once($filename);
		}

	})

?>