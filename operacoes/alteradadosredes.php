<?php
    session_start();
    include "conn.php";
    $idpublico=$_SESSION['idusuario'];
    $discord=$_POST['discord'];
	$steam=$_POST['steam'];
	$epic=$_POST['epic'];
	$twitch=$_POST['twitch'];
    echo $idpublico;
    echo $discord;
    echo $steam;
    echo $epic;
    echo $twitch;
    $sql=mysqli_query($conexao,"UPDATE usuarios SET  discord=' $discord',Steam='$steam',epic='$epic',Twitch='$twitch' WHERE idpublico = '$idpublico'")or die("Erro ao conectar com o banco");
        if($sql==1){
            echo "Dados Alterados com sucesso";
            header('Location: ../perfil.php?idpublico='.$idpublico);
        }
        else{
		header('Location: ../atualizardadosredes.php');
        $_SESSION['erro'] = 2;
        echo "erro ao aterar as redes socias";
        }	
?>