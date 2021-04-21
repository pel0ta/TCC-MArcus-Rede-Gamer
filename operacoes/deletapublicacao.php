<?php
	session_start();
	include "conn.php";
    $idpublicacao=$_GET["idpublicacao"];
    $idpublico=$_SESSION['idusuario'];
    
	$sql=mysqli_query($conexao,"DELETE FROM publicacao WHERE idpublicacao=$idpublicacao")or die("erro ao selecionar");
	if($sql==1){
        echo "publicacao excluida com sucesso";
        header('Location: ../perfil.php?idpublico='.$idpublico.'');

    }
    else{
        echo "nao foi possivel excluir a publicacao";
        //header('Location: ../excluirjogo.php');  
    }

?>	