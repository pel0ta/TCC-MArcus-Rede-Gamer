<!-- aqui uma pagina pra text do chat-->
<?php
	session_start();
	if($_SESSION['login']===1){
		if(isset($_SESSION["iddestinatario"])){
			unset($_SESSION["iddestinatario"]);
		}
		include "operacoes/conn.php";
	$idusuario=$_SESSION['idusuario'];
	$amigos=mysqli_query($conexao,"SELECT *FROM usuarios where idpublico NOT IN ('$idusuario')")or die("erro ao selecionar");
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
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

		<script>
			// PREVIEW FOTO pego no https://pt.stackoverflow.com/questions/431140/substituir-input-file-por-%C3%ADcone-imagem-com-preview-de-imagem
			function PreviewImage() {
				var oFReader = new FileReader();
				oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

				oFReader.onload = function (oFREvent) {
					document.getElementById("uploadPreview").src = oFREvent.target.result;
				};
			};
		</script>
</head>
<body style="background-image:url(imagens/7.jpg);background-position: center;background-repeat: repeat;background-attachment: fixed;">
	<?php
		include "header.php";
	?>
  
  <div class="col-2"> 
  <button class="btn btn-warning"data-toggle="collapse"data-target="#usuariomensagem">mensagens</button>
  <div class="collapse"id="usuariomensagem">
				<div class="col-12 text-centerrounded"style="background-color:rgba(28,28,28, .9);color:white;margin:10px 5px">
					<?php while($dados = mysqli_fetch_array($amigos)){
						$fotoamigos=$dados['foto']; //pego os atributos dos usuarios do banco, mudar para pegar somente de amigos
						$idamigo=$dados['idpublico'];?>
					<div class="row">
						<img src="./imagensPerfil/<?php if($fotoamigos=="NULL")echo"null.png"; else echo "$fotoamigos" ?> "style=" margin:10px 5px;vertical-align: middle;width: 50px;height: 50px;border-radius: 50%;" >
						
						<button class="btn btn-warning"data-toggle="collapse"data-target="#mensagemusuario"><?php echo $idamigo?></button>
						<div class="collapse"id="mensagemusuario">
							aqui deve abrir as mensagens
						</div>
					</div>
					<?php } ?>	
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
</html>
