<?php
include "operacoes/conn.php";
//session_start();
$idusuario1=$_SESSION['idusuario'];
$busca=mysqli_query($conexao,"SELECT *FROM amizades WHERE idpublico2='$idusuario1'")or die("erro ao selecionar");
while($dados = mysqli_fetch_array($busca)){
   $nome1=$dados['idpublico1'];
   $status=$dados['solicitacao'];
   if($status==0){
        $buscauser=mysqli_query($conexao,"SELECT *FROM usuarios WHERE idpublico='$nome1'")or die("erro ao selecionar");
        while($dados1 = mysqli_fetch_array($buscauser)){
            $idpublico1=$dados1['idpublico'];
            $foto1=$dados1['foto'];   
            ?>
            <div class="col-4 ">
            <div class="card text-white bg-dark mb-3 align-items-center justify-content-center text-center" >
                    <img class="card-img-top" src="imagensPerfil/<?php if($foto1=="NULL")echo"null.png"; else echo "$foto1" ?>" alt="Card image cap">
                    <div class="card-body">
                    <a href="perfil.php?idpublico=<?php echo $idpublico1?>"style="text-decoration:none;color:white;"><?php echo $idpublico1?></a>
                        <form action="operacoes/aceitarpedidodeamizade.php" method="POST">
                            <input type="hidden" id="recebepedido" name="recebepedido" value="<?php echo$idpublico1?>"/>
                            <button type="submit"class="btn btn-success">Adicionar</button>
                        </form>
                        <form action="operacoes/deletaamizade.php" method="POST">
                            <input type="hidden" id="recebepedido" name="recebepedido" value="<?php echo$idpublico1?>"/>
                            <button type="submit"class="btn btn-Danger">Recusar</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php 
        }
   }
}

?>