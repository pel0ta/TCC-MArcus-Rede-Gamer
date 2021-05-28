<?php
session_start();
if($_SESSION['login']===1){
    include "operacoes/conn.php";
    $idusuario=$_SESSION['idusuario'];
    $sql=mysqli_query($conexao,"SELECT *FROM usuarios WHERE idpublico = '$idusuario'")or die("erro ao selecionar");
    if(isset($_SESSION['iddestinatario'])) {
        $iddestinatario = $_SESSION['iddestinatario'];	
        $mensagens=mysqli_query($conexao,"SELECT *FROM mensagens WHERE idremetente = '$idusuario' and iddestinatario='$iddestinatario' or idremetente = '$iddestinatario' and iddestinatario='$idusuario' order by hora ")or die("selecione um usuario");
        $ultimamensagem=1;
        // isso aqui e uma verificação para saber quem mandou a ultima mensagem para saber 
        // se devo mostrar o nome do usuario que mandou para nao ficar muito repetitivo
        // e se o usuario que mandou for o mesmo que o id cadastrado ma mensagem e mostrada no lado direito da tela 
        while($dados = mysqli_fetch_array($mensagens)){	
            if($ultimamensagem!=$dados['idremetente']){
                $ultimamensagem=$dados['idremetente'];
                echo"<hr/>";
                if($ultimamensagem==$idusuario){?>
                    <div class="text-right text-primary"><?php
                    //echo $dados['idremetente'].":<br>";
                    echo $dados['conteudo']."<br>";?>
                    </div><?php
                }
                else{
                //echo $dados['idremetente'].":<br>";
                echo $dados['conteudo']."<br>";
                }
            }
            else{
                if($ultimamensagem==$idusuario){?>
                    <div class="text-right text-primary"><?php
                    $ultimamensagem=$dados['idremetente'];
                    echo $dados['conteudo']."<br>";?>
                    </div><?php
                }
                else{
                    $ultimamensagem=$dados['idremetente'];
                    echo $dados['conteudo']."<br>";
                }
            }
        }
    }
}
else {
    header('Location: login.php');
}
?>
<script>
$("#divtoscroll").animate({ scrollTop: $("#divtoscroll").height() }, 1000);
</script>