<?php
$conexao=mysqli_connect("localhost","root","","rg",3306);
	if($conexao){
		echo " conexao com sucesso";
	}
	else{
		echo "erro na conexao com o banco";
	}
?>