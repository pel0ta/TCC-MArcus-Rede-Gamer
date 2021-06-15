<?php
    session_start();
    include "conn.php";
    $idusuario = $_POST['idusuario'];
    $idjogo=$_POST['idjogo'];
    $buscajogofavorito=mysqli_query($conexao,"SELECT *FROM jogosadicionados WHERE idusuario='$idusuario'AND idjogo='$idjogo'")or die("erro ao selecionar");
    $linha=mysqli_fetch_array($buscajogofavorito);
    if($linha){
    $chave=$linha['chave'];
        $sql=mysqli_query($conexao,$adc="UPDATE jogosadicionados SET favorito=1 WHERE chave= '$chave'")or die("Erro ao conectar com o banco");
        header("Location: {$_SERVER['HTTP_REFERER']}"); 
    }
    else{
        $adc="INSERT INTO jogosadicionados(idusuario,idjogo,favorito)  VALUES ('$idusuario','$idjogo','1')";
        if (mysqli_query($conexao, $adc)) {
            //echo "adicionou";
            header("Location: {$_SERVER['HTTP_REFERER']}"); 
        }
        else{
            // "Error: " . $adc . "<br>" . mysqli_error($conexao);
            //echo "o jogo Nao foi cadastrado";
            header("Location: {$_SERVER['HTTP_REFERER']}"); 
        }
    }
?>