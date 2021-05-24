<?php
	session_start();
	include "conn.php";
    $idpublicacao=$_GET["idcomentario"];
    
	$sql=mysqli_query($conexao,"DELETE FROM comentariopublicacao WHERE idcomentario=$idpublicacao")or die("erro ao selecionar");
	if($sql==1){
        echo "publicacao excluida com sucesso";
        header("Location: ".$_SERVER['HTTP_REFERER']."");

    }
    else{
        echo "nao foi possivel excluir a publicacao";
        header("Location: ".$_SERVER['HTTP_REFERER']."");
    }

?>	