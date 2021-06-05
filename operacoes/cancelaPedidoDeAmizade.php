<?php
    session_start();
    include "conn.php";
    $idusuario=$_SESSION['idusuario'];
    $recebepedido=$_POST['recebepedido'];
    $sql=mysqli_query($conexao,"DELETE FROM amizades WHERE idpublico2 = '$recebepedido' AND idpublico1='$idusuario'")or die("erro ao selecionar");
    if ($sql) {
        
        echo "adicionou";
        header("Location: ".$_SERVER['HTTP_REFERER']."");  
    }
    else{
       
        echo "Error: " . $sql. "<br>" . mysqli_error($conexao);
        echo "Nao adicionou usuario";
        header("Location: ".$_SERVER['HTTP_REFERER']."");   
    }
?>