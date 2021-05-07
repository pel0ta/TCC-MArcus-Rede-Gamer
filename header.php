<?php
$idpublico=$_SESSION['idusuario'];
?>
<head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="novostyler.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>	
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body >
    <div class="d-flex text-white"style="background-color:black">
        <div class="p-2"><a href="index.php" style="text-decoration:none;color:white;" >Home</a></div>
        <div class="p-2"><a href="perfil.php?idpublico=<?php echo $idpublico?>" style="text-decoration:none;color:white;" >Perfil</a></div>
        <div class="p-2"><a href="listadeamigos.php" style="text-decoration:none;color:white;" >Amigos</a></div>
        <div class="p-2"><a href="listadejogos.php" style="text-decoration:none;color:white;" >Jogos</a></div> 
        <div class="ml p-2"><a href="mensagens.php" style="text-decoration:none;color:white;" >Mensangens</a></div>
        <div class="ml-auto p-2"><a href="sair.php" style="text-decoration:none;color:white;" >Sair</a></div>
    </div>
</body>