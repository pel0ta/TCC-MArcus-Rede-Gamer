<?php
    session_start();
    include "conn.php";
    $descricao=$_POST['textopublicacao'];
    $idpublicacao=$_POST['idpublicacao'];
    echo $descricao;
    echo $idpublicacao;
    $sql=mysqli_query($conexao,"UPDATE publicacao SET comentario='$descricao' WHERE idpublicacao = '$idpublicacao'")or die("Erro ao conectar com o banco");
    if($sql==1){
        echo "publicacao alterada com sucesso";
        //header('Location: ../perfil.php?idpublico='.$idpublico);
    }
    else{
    //header('Location: ../atualizarUsuario.php');
    $_SESSION['erro'] = 2;
    echo "nao alterou publicação";
    }	
?>