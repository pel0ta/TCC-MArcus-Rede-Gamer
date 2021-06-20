<?php
    session_start();
    include "conn.php";
    $nome = $_POST['nome'];
    $descricao=$_POST['descricao'];
    $arquivo= $_FILES['arquivofoto'];
    echo $nome;
    echo $descricao;
    $extensao =  pathinfo($arquivo['name'], PATHINFO_EXTENSION);
    $novonome = md5(time()).".".$extensao;
    $PASTA="../imagensPerfiljogo/";
    if (!file_exists($PASTA)){
        mkdir("$PASTA", 0700);
    }
    $arquivo1= $_FILES['arquivocapa'];
    $extensao1 =  pathinfo($arquivo1['name'], PATHINFO_EXTENSION);
    $novonome1 = md5(time()).".".$extensao1;
    $PASTA1="../imagenscapajogo/";
    if (!file_exists($PASTA1)){
        mkdir("$PASTA1", 0700);
    }	
    move_uploaded_file($_FILES['arquivofoto']['tmp_name'], $PASTA.$novonome);
    move_uploaded_file($_FILES['arquivocapa']['tmp_name'], $PASTA1.$novonome1);
    $adc="INSERT INTO jogos (nome, descricao,imagem,capa)  VALUES ('$nome','$descricao','$novonome','$novonome1')";
    if (mysqli_query($conexao, $adc)) {
        //$_SESSION['sucesso'] = 1;
        echo "adicionou";
        //header("Location: {$_SERVER['HTTP_REFERER']}");   
    }
    else{
        //header('Location: ../cadastrojogo.php');
        //$_SESSION['erro'] = 1;
        echo "Error: " . $adc . "<br>" . mysqli_error($conexao);
        echo "o jogo Nao foi cadastrado";
        //header("Location: {$_SERVER['HTTP_REFERER']}"); 
    }
?>