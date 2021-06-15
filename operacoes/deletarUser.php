<?php
	session_start();
	include "conn.php";
	$idusuario=$_SESSION['idusuario'];
	$sql=mysqli_query($conexao,"DELETE FROM `usuarios` WHERE idpublico='$idusuario'")or die("erro ao selecionar");
	if($sql==1){
        //echo "Usuario excluido com sucesso";
        header('Location: ../login.php');
    }
    else{
        //echo "nao foi possivel excluir o usuario";
        header('Location: ../index.php');  
    }

?>		