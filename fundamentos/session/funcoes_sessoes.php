<?php
	require_once("configuracaoSessao.php");
	echo session_save_path();
	echo "<br/>";
	var_dump(session_status());
	
	switch(session_status()){
		case PHP_SESSION_DISABLED:
			echo "<br/>";
			echo "As sessões estão desabilitadas.";
		case PHP_SESSION_NONE:
			echo "<br/>";
			echo "As sessões estão habilitadas, mas não foram iniciadas.";
		case PHP_SESSION_ACTIVE:
			echo "<br/>";
			echo "As sessões estão habilitadas, e uma sessão existe.";
	}
?>