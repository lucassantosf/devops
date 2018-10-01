<?php
//Neste exemplo faz uma simples validação se o Recaptcha esta incluido, e caso for tentado acessar o script diretamente sem fazer o post, ele ira direcionar para a página de autenticação novamente
$email = $_POST["inputEmail"];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
	"secret"=>"6LeuE3IUAAAAAHE7O_nq4W8C3jiSbs2H2zcSS5q7",
	"response"=>$_POST["g-recaptcha-response"],
	"remoteip"=>$_SERVER["REMOTE_ADDR"]
)));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$recaptcha = json_decode(curl_exec($ch), true);

curl_close($ch);

if($recaptcha["success"] === true){
	echo "OK : ".$_POST["inputEmail"];
}else{
	header("Location: exemplo-04.php");
}

?>

