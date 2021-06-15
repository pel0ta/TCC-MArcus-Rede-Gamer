<?php
    session_start();
    include "conn.php";
    $idpublico = $_POST['idpublico'];
    $comentario=$_POST['textodapublicacao'];
    date_default_timezone_set('America/Sao_Paulo');
    $hora=date('Y-m-d H:i:s',time());
    if($_FILES['foto']['name']){
        $arquivo= $_FILES['foto'];
        $extensao =  pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        $novonome = md5(time()).".".$extensao;
        $PASTA="../imagenspublicacao/";    
        if (!file_exists($PASTA)){
            mkdir("$PASTA", 0700);
        }      
        move_uploaded_file($_FILES['foto']['tmp_name'], $PASTA.$novonome);
        $adc="INSERT INTO publicacao (idusuario,foto,comentario,hora)  VALUES ('$idpublico','$novonome','$comentario','$hora')";
        if (mysqli_query($conexao, $adc)) {
            //echo "adicionou com foto";
            header("Location: {$_SERVER['HTTP_REFERER']}"); 
        }
        else{
            //$_SESSION['erro'] = 1;
            //echo "Error: " . $adc . "<br>" . mysqli_error($conexao);
            //echo "nao adicionou a publicação sem a foto";
            header("Location: {$_SERVER['HTTP_REFERER']}"); 
        }
    }
    else{
        $adc="INSERT INTO publicacao (idusuario,comentario,hora)  VALUES ('$idpublico','$comentario','$hora')";
        if (mysqli_query($conexao, $adc)) {
            //$_SESSION['sucesso'] = 1;
            //echo "adicionou";
            header("Location: {$_SERVER['HTTP_REFERER']}"); 
        }
        else{
            //$_SESSION['erro'] = 1;
            //echo "Error: " . $adc . "<br>" . mysqli_error($conexao);
            //echo "o jogo Nao foi cadastrado";
            header("Location: {$_SERVER['HTTP_REFERER']}"); 
        }
    }
?>