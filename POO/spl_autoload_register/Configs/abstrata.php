<?php

	require_once('interface.php');

	abstract class Setor implements Empresa{
		public function exibirFaturamento($faturamento):int{
			echo "O faturamento total é de ".$faturamento;
		}
	}

?>