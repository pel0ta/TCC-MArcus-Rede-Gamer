<?php
    session_start();
    include "conn.php";
    $idusuario = $_POST['idusuario'];
    $idpublicacao=$_POST['idpublicacao'];
    $comentario=$_POST['textocomentario'];
    date_default_timezone_set('America/Sao_Paulo');
    $hora=date('Y-m-d H:i:s',time());
    $adc="INSERT INTO comentariopublicacao (idpublicacao,idusuario,comentario,hora)  VALUES ('$idpublicacao','$idusuario','$comentario','$hora')";
    if (mysqli_query($conexao, $adc)) {
        //$_SESSION['sucesso'] = 1;
        echo "adicionou";
        header("Location: ".$_SERVER['HTTP_REFERER']."");
    }
    else{
        //$_SESSION['erro'] = 1;
        echo "Error: " . $adc . "<br>" . mysqli_error($conexao);
        echo "o jogo Nao foi cadastrado";
        header("Location: ".$_SERVER['HTTP_REFERER']."");  
    }
?>