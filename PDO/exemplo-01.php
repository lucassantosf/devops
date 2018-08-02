<?php

$conn = new PDO("mysql:dbname=dbphp7;host=localhost","root","");

$stmt = $conn->prepare("Select * from tb_usuarios order by desclogin");

$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $row) {
	
	foreach ($row as $key => $value) {		
		if ($key === "id_usuario") {
	        echo "<strong>".$key.": </strong>".$value."<br/>";
	    }
		if ($key === "desclogin") {
	        echo "<strong>".$key.": </strong>".$value."<br/>";
	    }
	    if ($key === "dessenha") {
	        echo "<strong>".$key.": </strong>".$value."<br/>";
	    }
	    if ($key === "dtcadastro") {
	        echo "<strong>".$key.": </strong>".$value."<br/>";
	    }		
	}
	echo "-------------------------------------------------------<br/>";
}

?>