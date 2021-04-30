<?php
	session_start();
	include "conn.php";
    $idcomentario=$_GET["idcomentario"];
    
	$sql=mysqli_query($conexao,"DELETE FROM comentariojogo WHERE idcomentario=$idcomentario")or die("erro ao selecionar");
	if($sql==1){
        echo "comentario excluido com sucesso";
        header('Location: ../perfil.php?idpublico='.$idpublico.'');

    }
    else{
        echo "nao foi possivel excluir o comentario";
        //header('Location: ../excluirjogo.php');  
    }

?>	