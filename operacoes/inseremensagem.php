<?php
    session_start();
    include "conn.php";
    $iddestinatario = $_POST['iddestinatario'];
    $idremetente = $_POST['idremetente'];
    //pegar os 2 ids depois voltar aqui:
    $mensagem=$_POST['textodamensagem'];
    echo $mensagem;
    date_default_timezone_set('America/Sao_Paulo');
    $hora=date('Y-m-d H:i:s',time());
    if($_FILES['foto']['name']){
        $arquivo= $_FILES['foto'];
        $extensao =  pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        $novonome = md5(time()).".".$extensao;
        $PASTA="../imagensmensagens/";    
        if (!file_exists($PASTA)){
            mkdir("$PASTA", 0700);
        }      
        move_uploaded_file($_FILES['foto']['tmp_name'], $PASTA.$novonome);
        $adc="INSERT INTO mensagens (idremetente,iddestinatario,conteudo,foto,hora)  VALUES ('$idremetente','$iddestinatario','$mensagem','$novonome','$hora')";
        if (mysqli_query($conexao, $adc)) {
            echo "adicionou com foto";
            header('Location: ../mensagens.php');    
        }
        else{
            $_SESSION['mensagem'] = 0;
            echo "Error: " . $adc . "<br>" . mysqli_error($conexao);
            echo "selecione um usuario para enviar a mensagem";
            header('Location: ../mensagens.php');;
        }
    }
    else{
        $adc="INSERT INTO mensagens (idremetente,iddestinatario,conteudo,hora)  VALUES ('$idremetente','$iddestinatario','$mensagem','$hora')";
        if (mysqli_query($conexao, $adc)) {
            echo "adicionou";
            header('Location: ../mensagens.php');  
            header ("location: ../mensagens.php?iddestinatario=".$iddestinatario);
        }
        else{
            $_SESSION['mensagem'] = 0;
            echo "Error: " . $adc . "<br>" . mysqli_error($conexao);
            echo "selecione um usuario para enviar a mensagem";
            header('Location: ../mensagens.php');   
        }
    }
?>