<?php
    session_start();
    include "conn.php";
    $comentario=$_POST['textocomentario'];
    $idcomentario=$_POST['idcomentario'];
    echo $comentario;
    echo $idcomentario;
    $sql=mysqli_query($conexao,"UPDATE comentariopublicacao SET comentario='$comentario' WHERE idcomentario = '$idcomentario'")or die("Erro ao conectar com o banco");
    if($sql==1){
        //echo "comentario alterado com sucesso";
        header("Location: {$_SERVER['HTTP_REFERER']}"); 
    }
    else{
    //echo "nao alterou o comentario";
    header("Location: {$_SERVER['HTTP_REFERER']}"); 
    }	
?>