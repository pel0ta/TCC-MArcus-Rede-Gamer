<?php
	session_start();
	if($_SESSION['login']===1){
		include "operacoes/conn.php";
	$idusuario=$_SESSION['idusuario'];
	
	$sql=mysqli_query($conexao,"SELECT *FROM usuarios WHERE idpublico = '$idusuario'")or die("erro ao selecionar");
?>
<html>
<head>
    <title>Rede Gamer</title>
    <meta charset="utf-8">
		<link rel="stylesheet" href="bootstrap.min.css">
		<link rel="stylesheet" href="novostyler.css">
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>	
		<script type="text/javascript" src="script.js"></script>
</head>
<body style="background-image:url(imagens/7.jpg);background-position: center;background-repeat: repeat;background-attachment: fixed;">
	<?php
		include "header.php";
	?>

</body>
<?php			
		}
		else {
			header('Location: login.php');
		}
?>
