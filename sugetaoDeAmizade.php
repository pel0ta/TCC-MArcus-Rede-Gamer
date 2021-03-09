<?php
    session_start();
    if($_SESSION['login']===1){
        include "operacoes/conn.php";
        $idusuario=$_SESSION['idusuario'];
        $quant=0;
        $usuariop=mysqli_query($conexao,"SELECT * FROM usuarios WHERE idpublico='$idusuario'")or die("erro ao selecionar");
        while($dado = mysqli_fetch_array($usuariop)){
            $datanas = $dado['datanas'];
            $pais = $dado['pais'];
            $cidade =  $dado['cidade'];
            $estado = $dado['estado'];
        }
        $sql=mysqli_query($conexao,"SELECT * FROM usuarios WHERE idpublico!='$idusuario'")or die("erro ao selecionar");
        while($dados = mysqli_fetch_array($sql)){
                if($datanas==$dados['datanas']){
                    $quant++;
                }
                if($pais==$dados['pais']){
                    $quant++;
                }
                if($cidade==$dados['cidade']){
                    $quant++;
                }
                if($estado==$dados['estado']){
                    $quant++;
                }
                echo "nome:";
                echo $dados['nome'];
                echo"quatidade de dados iguai :";
                echo $quant;
                $quant=0;
        }
        
    }
?>