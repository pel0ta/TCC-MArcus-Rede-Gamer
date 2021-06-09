<?php
$idpublico=$_SESSION['idusuario'];
?>

<body >
    <div class="d-flex text-white"style="background-color:black">
        <div class="p-2"><a href="index.php" style="text-decoration:none;color:white;" >Home</a></div>
        <div class="p-2"><a href="perfil.php?idpublico=<?php echo $idpublico?>" style="text-decoration:none;color:white;" >Perfil</a></div>
        <div class="p-2"><a href="listadeamigos.php?idpublico=<?php echo $idpublico?>" style="text-decoration:none;color:white;" >Amigos</a></div>
        <div class="p-2"><a href="listadejogos.php" style="text-decoration:none;color:white;" >Jogos</a></div> 
        <div class="ml p-2"><a href="mensagens.php" style="text-decoration:none;color:white;" >Mensangens</a></div>
        <div class="ml p-2"><a data-toggle="modal" data-target="#modalExemplo" style="text-decoration:none;color:white;" >Pedidos de amizades</a></div>
        <div class="p-2"><a href="listadeusuarios.php" style="text-decoration:none;color:white;" >Usuarios</a></div>
        <div class="ml-auto p-2"><a href="sair.php" style="text-decoration:none;color:white;" >Sair</a></div>
    </div>
</body>
<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Solicitações de Amizades</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row align-items-center justify-content-center">
          <?php
            include "pedidosdeamizades.php";
          ?>
					</div>
        
      </div>
    </div>
  </div>
</div>