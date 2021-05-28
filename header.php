<?php
$idpublico=$_SESSION['idusuario'];
?>

<body >
    <div class="d-flex text-white"style="background-color:black">
        <div class="p-2"><a href="index.php" style="text-decoration:none;color:white;" >Home</a></div>
        <div class="p-2"><a href="perfil.php?idpublico=<?php echo $idpublico?>" style="text-decoration:none;color:white;" >Perfil</a></div>
        <div class="p-2"><a href="listadeamigos.php" style="text-decoration:none;color:white;" >Amigos</a></div>
        <div class="p-2"><a href="listadejogos.php" style="text-decoration:none;color:white;" >Jogos</a></div> 
        <div class="ml p-2"><a href="mensagens.php" style="text-decoration:none;color:white;" >Mensangens</a></div>
        <div class="ml p-2"><a href="pedidosdeamizades.php" style="text-decoration:none;color:white;" >Pedidos de amizades</a></div>
        <div class="ml-auto p-2"><a href="sair.php" style="text-decoration:none;color:white;" >Sair</a></div>
    </div>
</body>