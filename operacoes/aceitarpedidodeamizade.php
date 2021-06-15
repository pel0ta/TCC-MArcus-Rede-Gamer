<?php
    session_start();
    include "conn.php";
    $idusuario=$_SESSION['idusuario'];
    $recebepedido=$_POST['recebepedido'];
    $sql=mysqli_query($conexao,"UPDATE amizades SET solicitacao=1 WHERE idpublico1 = '$recebepedido' AND idpublico2='$idusuario'")or die("Erro ao conectar com o banco");
    if ($sql) {
        
        //echo "adicionou";
        header("Location: {$_SERVER['HTTP_REFERER']}"); 
    }
    else{
       
        //echo "Error: " . $sql. "<br>" . mysqli_error($conexao);
        //echo "Nao adicionou usuario";
        header("Location: {$_SERVER['HTTP_REFERER']}");   
    }
?>