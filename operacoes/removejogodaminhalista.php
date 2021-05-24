<?php
    session_start();
    include "conn.php";
    $idusuario = $_POST['idusuario'];
    $idjogo=$_POST['idjogo'];
    $buscajogofavorito=mysqli_query($conexao,"SELECT *FROM jogosadicionados WHERE idusuario='$idusuario'AND idjogo='$idjogo'")or die("erro ao selecionar");
    $linha=mysqli_fetch_array($buscajogofavorito);
    $chave=$linha['chave'];
        $sql=mysqli_query($conexao,$adc="DELETE FROM jogosadicionados WHERE chave= '$chave'")or die("Erro ao conectar com o banco");
        header("Location: ".$_SERVER['HTTP_REFERER']."");
?>
