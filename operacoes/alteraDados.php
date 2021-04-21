<?php
    session_start();
    include "conn.php";
    $idpublico=$_SESSION['idusuario'];
    $nome = $_POST['nome'];
    $datanas = $_POST['datanas'];
    $pais = $_POST['pais'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    if($_FILES['arquivo']['name']){
        $arquivo= $_FILES['arquivo'];
        $extensao =  pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        $novonome = md5(time()).".".$extensao;
        $PASTA="../imagensPerfil/";
        if (!file_exists($PASTA)){
            mkdir("$PASTA", 0700);
        }	
        move_uploaded_file($_FILES['arquivo']['tmp_name'], $PASTA.$novonome);
        $sql=mysqli_query($conexao,$adc="UPDATE usuarios SET nome='$nome',datanas='$datanas',pais='$pais',cidade='$cidade',estado='$estado',foto='$novonome' WHERE idpublico = '$idpublico'")or die("Erro ao conectar com o banco");
        if($sql==1){
        echo "Dados Alterados com sucesso";
        header('Location: ../perfil.php?idpublico='.$idpublico);
        }
        else{
        header('Location: ../atualizarUsuario.php');
           $_SESSION['erro'] = 2;
            echo "email ou idpublico ja cadastrado";
        }
    }
    else{
        $sql=mysqli_query($conexao,"UPDATE usuarios SET nome='$nome',datanas='$datanas',pais='$pais',cidade='$cidade',estado='$estado' WHERE idpublico = '$idpublico'")or die("Erro ao conectar com o banco");
        if($sql==1){
            echo "Dados Alterados com sucesso";
            header('Location: ../perfil.php?idpublico='.$idpublico);
        }
        else{
		header('Location: ../atualizarUsuario.php');
        $_SESSION['erro'] = 2;
        echo "email ou idpublico ja cadastrado";
        }	
    }
?>