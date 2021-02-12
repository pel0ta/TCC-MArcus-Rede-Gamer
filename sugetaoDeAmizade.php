<?php
    session_start();
    if($_SESSION['login']===1){
        include "operacoes/conn.php";
        $idusuario=$_SESSION['idusuario'];
        $sql=mysqli_query($conexao,"SELECT * FROM usuarios WHERE idpublico!='$idusuario'")or die("erro ao selecionar");
        while($dados = mysqli_fetch_array($sql)){
            echo "encontrou";
        }

    }
?>