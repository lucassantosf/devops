<form method="POST" enctype="multipart/form-data">
	
	<input type="file" name="fileUpload">

	<button type="submit">Send</button>

</form>

<?php
//Esta duas próximas linha aumentam o limite do tamanho do arquivo a ser feito o upload
ini_set('post_max_size', '64M');
ini_set('upload_max_filesize', '64M');

if($_SERVER["REQUEST_METHOD"] === "POST"){

	$file = $_FILES["fileUpload"];

	if($file["error"]){

		throw new Exception("Error: ".$file["error"]);		
	}

	$dirUploads = "uploads";

	if(!is_dir($dirUploads)){

		mkdir($dirUploads);
	}

	if(move_uploaded_file($file["tmp_name"], $dirUploads . DIRECTORY_SEPARATOR . $file["name"])){

		echo "Upload realizado com sucesso";

	}else{

		throw new Exception("Não foi possivel fazer o upload");
		
	}
	
}
	


?>