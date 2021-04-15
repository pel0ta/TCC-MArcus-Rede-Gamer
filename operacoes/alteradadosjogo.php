<?php
    session_start();
    include "conn.php";
    $idjogo = $_SESSION['idjogo'];
    $nome = $_POST['nome'];
    $descricao=$_POST['descricao'];
    if($_FILES['arquivofoto']['name']){
        $arquivo= $_FILES['arquivofoto'];
        $extensao =  pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        $novonome = md5(time()).".".$extensao;
        $PASTA="../imagensPerfiljogo/";
        move_uploaded_file($_FILES['arquivofoto']['tmp_name'], $PASTA.$novonome);
        $sql=mysqli_query($conexao,$adc="UPDATE jogos SET nome='$nome',imagem='$novonome',descricao='$descricao' WHERE id= '$idjogo'")or die("Erro ao conectar com o banco");
        if($sql==1){
        echo "Dados e foto alterados com sucesso";
        //header('Location: ../perfil.php');
        }
        else{
        //header('Location: ../atualizarUsuario.php');
        //  $_SESSION['erro'] = 2;
            echo "nao alterados";
        }
    }
    if($_FILES['arquivocapa']['name']){
    $arquivo1= $_FILES['arquivocapa'];
    $extensao1 =  pathinfo($arquivo1['name'], PATHINFO_EXTENSION);
    $novonome1 = md5(time()).".".$extensao1;
    $PASTA1="../imagenscapajogo/";	
    move_uploaded_file($_FILES['arquivocapa']['tmp_name'], $PASTA1.$novonome1);
    $sql=mysqli_query($conexao,$adc="UPDATE jogos SET capa='$novonome1' WHERE id= '$idjogo'")or die("Erro ao conectar com o banco");
        if($sql==1){
        echo "Dados e foto e capa  alterados com sucesso";
        //header('Location: ../perfil.php');
        }
        else{
        //header('Location: ../atualizarUsuario.php');
        //   $_SESSION['erro'] = 2;
            echo "na alterados por causa da capa";
        }
    }
    
    else{
        $sql=mysqli_query($conexao,$adc="UPDATE jogos SET nome='$nome',descricao='$descricao' WHERE id= '$idjogo'")or die("Erro ao conectar com o banco");
        if($sql==1){
            echo "Dados Alterados com sucesso sem capa e sem foto";
            //header('Location: ../perfil.php');
        }
        else{
		//header('Location: ../atualizarUsuario.php');
        //$_SESSION['erro'] = 2;
        echo "sem foto e sem capa dados nao alterados";
        }	
    }
?>