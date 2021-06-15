<?php
    session_start();
    include "conn.php";
    $idusuario=$_SESSION['idusuario'];
    $recebepedido=$_POST['recebepedido'];
    $adc="INSERT INTO amizades (idpublico1,idpublico2,solicitacao)  VALUES ('$idusuario','$recebepedido',0)";
    $aux=0;
    if (mysqli_query($conexao, $adc)) {
        //$_SESSION['sucesso'] = 1;
        $aux=1;
        echo "adicionou";
        header("Location: {$_SERVER['HTTP_REFERER']}"); 
    }
    else{
        //$_SESSION['erro'] = 1;
        echo "Error: " . $adc . "<br>" . mysqli_error($conexao);
        echo "o jogo Nao foi cadastrado";
        header("Location: {$_SERVER['HTTP_REFERER']}");  
    }
?>