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
<body>
	<?php
		include "header.php";
	?>
	<Section >
		<div class="container">
			<div class="row " text-li >
				<div class="col-2 text-center ">
				<?php
				while($dados = mysqli_fetch_array($sql)){
					$foto=$dados['foto'];
					echo $dados['idpublico'];?><br>
					<img id="fotoperfil" class="img-thumbnail" width="100" height="150" src="./imagensPerfil/<?php if($foto=="NULL")echo"null.png"; else echo "$foto" ?> "><br><?php
					echo $dados['nome'];?><br><?php
					echo $dados['cidade'];?><br><?php
					echo $dados['estado'];?><br><?php
					echo $dados['pais'];?><br><?php
				}
					
				
				?> 	
				</div>
				<div class="col-7 text-center">posts
					<i class="far fa-frown"></i>
				</div>
				<div class="col-3 text-center">amigos

				</div>
				<div class="col-3 text-center">
					<a href="operacoes/deletarUser.php"><button type="button" class="btn btn-danger btn-sm">cancelar </button></a>
				</div>

			</div>
		</div>
	</section>
</body>
<?php			
		}
		else {
			header('Location: login.php');
		}
?>
</html>