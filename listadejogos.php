<?php
	session_start();
	if($_SESSION['login']===1){
		include "operacoes/conn.php";
		$idusuario=$_SESSION['idusuario'];	
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
	<div class="container"style="border-radius: 25px;">
		<div class="row " >
			<div class="col-12 text-center border rounded"style="background-color:rgba(28,28,28, .9);color:white;margin:10px -15px">
				<h2>Jogos cadastrados no sistema:</h2>
				<?php $jogos=mysqli_query($conexao,"SELECT *FROM jogos")or die("erro ao selecionar");
						while($dados = mysqli_fetch_array($jogos)){
						$fotojogo=$dados['imagem']; 
						$nomejogo=$dados['nome'];
						$idjogo=$dados['id'];
				?>
				<div class="row"style="padding:20px 10px">
					<div class="col-2">
					<img src="./imagensPerfiljogo/<?php echo"$fotojogo"?> " class="img-rounded col-md-10 " >
					</div>
					<div class="col-10">
						<h1> <?php echo$nomejogo?> </h1>
					</div>	
				</div>
				<?php }?>
			</div>
		</div>
	</div>
</body>
<?php			
		}
		else {
			header('Location: login.php');
		}
?>
