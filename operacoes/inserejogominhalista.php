<?php
    session_start();
    include "conn.php";
    $idusuario = $_POST['idusuario'];
    $idjogo=$_POST['idjogo'];
    $adc="INSERT INTO jogosadicionados(idusuario,idjogo)  VALUES ('$idusuario','$idjogo')";
    if (mysqli_query($conexao, $adc)) {
        //echo "adicionou";
        header("Location: {$_SERVER['HTTP_REFERER']}"); 
    }
    else{
        //echo "Error: " . $adc . "<br>" . mysqli_error($conexao);
        //echo "o jogo Nao foi cadastrado";
        header("Location: {$_SERVER['HTTP_REFERER']}"); 
    }
?>