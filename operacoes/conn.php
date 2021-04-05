<?php
$conexao=mysqli_connect("localhost","root","","rg",3306);
	mysqli_set_charset($conexao, "utf8mb4");
	if($conexao){
	}
	else{
		echo "erro na conexao com o banco";
	}
?>