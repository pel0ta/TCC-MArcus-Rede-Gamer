<?php
	session_start();
	if($_SESSION['login']===1){
		include "operacoes/conn.php";
		$value = $_GET["idpublico"];
?>
<html>
<head>
    <title>Rede Gamer</title>
    <meta charset="utf-8">
	<link rel="stylesheet" href="bootstrap.min.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>	
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body style="background-image:url(imagens/7.jpg);background-position: center;background-repeat: repeat;background-attachment: fixed;">
	<?php
		include "header.php";
	?>
	<div class="container"style="border-radius: 25px;">
		<div class="row " >
			<div class="col-12 text-center border rounded"style="background-color:rgba(28,28,28, .9);color:white;margin:10px -15px">
				<h2>Amigos de <?php echo$value;?>:</h2><hr>
				<?php 
				$buscaamigo=mysqli_query($conexao,"SELECT idpublico1,idpublico2 FROM amizades WHERE idpublico1='$value' AND solicitacao=1 OR idpublico2='$value'AND solicitacao=1")or die("erro ao selecionar");
				while($dados=mysqli_fetch_array($buscaamigo)){
					$idpublico1=$dados['idpublico1'];
					$idpublico2=$dados['idpublico2'];
					if($idpublico1==$value){
						$result=$idpublico2;
					}
					else{
						$result=$idpublico1;
					}
				$amigos=mysqli_query($conexao,"SELECT *FROM usuarios where idpublico='$result'")or die("erro ao selecionar");
						while($dados = mysqli_fetch_array($amigos)){
						$fotoamigos=$dados['foto']; 
						$idamigo=$dados['idpublico'];
						$cidadeamigo=$dados['cidade'];
						$estadoamigo=$dados['estado'];
						$nomeamigo=$dados['nome'];
						$sqlcidade=mysqli_query($conexao,"SELECT nome FROM municipios WHERE codigo_ibge = '$cidadeamigo'")or die("erro ao selecionar");
            			while($dados1 = mysqli_fetch_array($sqlcidade)){$cidadeamigo=$dados1['nome'];}
            			$sqlestado=mysqli_query($conexao,"SELECT nome FROM estados WHERE codigo_uf = '$estadoamigo'")or die("erro ao selecionar");
            			while($dados1 = mysqli_fetch_array($sqlestado)){$estadoamigo=$dados1['nome'];}
				?>
				<div class="row"style="padding:20px 10px">
					<div class="col-2">
					<img src="./imagensPerfil/<?php if($fotoamigos=="NULL")echo"null.png"; else echo "$fotoamigos" ?> " class="img-rounded col-md-10 " >
					</div>
					<div class="col-5">
						<h1><a href="perfil.php?idpublico=<?php echo $idamigo?>"style="text-decoration:none;color:white;"><?php echo $idamigo?></a></h1>
						<h3> <?php echo$nomeamigo?></h3>
					</div>
					<div class="col-5"style="padding:20px 10px">
						
						<h4>Cidade:  <?php echo$cidadeamigo?></h4>
						<h4>Estado: <?php echo$estadoamigo?></h4>
					</div>
				</div>
				<?php }}?>
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
