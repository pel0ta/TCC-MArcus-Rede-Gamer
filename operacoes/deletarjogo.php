<?php
	session_start();
	include "conn.php";
	$idjogo=$_POST['idjogo'];
	$sql=mysqli_query($conexao,"DELETE FROM `jogos` WHERE id='$idjogo'")or die("erro ao selecionar");
	if($sql==1){
        echo "jogo excluido com sucesso";
        //header('Location: ../excluirjogo.php');

    }
    else{
        echo "nao foi possivel excluir o jogo";
        //header('Location: ../excluirjogo.php');  
    }

?>		