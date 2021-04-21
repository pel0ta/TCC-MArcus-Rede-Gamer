<?php
	session_start();
	if($_SESSION['login']===1){
		include "operacoes/conn.php";
	$idusuario=$_SESSION['idusuario'];
	
	$sql=mysqli_query($conexao,"SELECT *FROM usuarios WHERE idpublico = '$idusuario'")or die("erro ao selecionar");
?>
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
	<div class="container">
		<div class="row " >
			<div class="col-2 text-center">
				<div class="row">
					<div class="col-12 text-center border rounded"style="background-color:rgba(28,28,28, .9);color:white;margin:10px -15px">
						<?php
						while($dados = mysqli_fetch_array($sql)){
							$foto=$dados['foto'];
							echo $dados['idpublico'];?><br>
							<img id="fotoperfil" class="img-thumbnail" width="100" height="150" src="./imagensPerfil/<?php if($foto=="NULL")echo"null.png"; else echo "$foto" ?> "><br><?php
							echo $dados['nome'];?><br><?php
							$cidade=$dados['cidade'];
							$sqlcidade=mysqli_query($conexao,"SELECT nome FROM municipios WHERE codigo_ibge = '$cidade'")or die("erro ao selecionar");
							while($dados1 = mysqli_fetch_array($sqlcidade)){echo $dados1['nome'];}?><br><?php
							$estados=$dados['estado'];
							$sqlestado=mysqli_query($conexao,"SELECT nome FROM estados WHERE codigo_uf = '$estados'")or die("erro ao selecionar");
							while($dados1 = mysqli_fetch_array($sqlestado)){echo $dados1['nome'];}?><br><?php
							echo $dados['pais'];?><br><?php
						}?> 
					</div>
				</div>	
			</div>
			<div class="col-7 text-center">
				<div class="row">
					<div class="col-12 text-center border rounded"style="background-color:rgba(28,28,28, .9);color:white;margin:10px 5px">
						<h3>Publicar novo Conteudo</h3>
						<form class="form-row " enctype="multipart/form-data" action="operacoes/inserepublicacao.php" method="POST">
							<input type="hidden" id="idpublico" name="idpublico" value="<?php echo$idusuario?>" />
							<div class="col-12">
								<label for="textodapublicacao">digite o que esta pensando</label>
								<textarea class="form-control" style="line-height: 20px;padding: 10px;height: 90px;resize: none;"id="textodapublicacao"name="textodapublicacao" rows="3" required autofocus></textarea>
							</div>
							<div class="col-12">
								<h5>Adicionar uma imagem</h5>
								<div class="image-upload" >
									<label for="uploadImage">
										<img src="https://i.pinimg.com/originals/54/38/19/543819d33dfcfe997f6c92171179e4cd.png" id="uploadPreview" style="width: 110px; height: 110px;">
									</label>  
									<input id="uploadImage" type="file" accept="image/*"name="foto" onchange="PreviewImage();">
								</div>
							</div>
							<div class="d-flex col-6 mt-3">
								<button type="reset" class="btn btn-danger col-12 mb-3 mr-3">Apagar</button>
								<button type="submit" class="btn btn-success col-12 mb-3">Publicar</button>
							</div>
						</form>
					</div>
				</div>
				<?php
					// aqui agora pegar os dados das publicaçoes precisso pensar em pegar as publicaçoes apenas de amigos
					$sqlpublicacao=mysqli_query($conexao,"SELECT *FROM publicacao ORDER BY hora DESC" )or die("erro ao selecionar");
					while($dados = mysqli_fetch_array($sqlpublicacao)){
						$idusuariopublicacao=$dados['idusuario'];
						$fotopublicacao=$dados['foto'];
						$comentariopublicacao=$dados['comentario'];
						$tempodapublicacao=$dados['hora'];
						$sql=mysqli_query($conexao,"SELECT foto,idpublico FROM usuarios WHERE idpublico = '$idusuariopublicacao'")or die("erro ao selecionar");
						while($dados = mysqli_fetch_array($sql)){
							$fotonapublicacao=$dados['foto'];
							$idpublicopublicacao=$dados['idpublico'];
						}
					?>
					<div class="row">
						<div class="col-12 border rounded"style="background-color:rgba(28,28,28, .9);color:white;margin:10px 5px">
							<div class="row"style="margin:5px -10px">
								<img src="./imagensPerfil/<?php if($fotonapublicacao=="NULL")echo"null.png"; else echo "$fotonapublicacao" ?> "style="vertical-align: middle;width: 50px;height: 50px;border-radius: 50%;" >
								<h4 style="margin:10px 10px"><?php echo$idpublicopublicacao;?></h4>
								<?php
                                 date_default_timezone_set('America/Sao_Paulo');
                                 $datetime1 = new DateTime($tempodapublicacao);
                                 $datetime2 = new DateTime(date('Y-m-d H:i:s',time()));
                                 $interval = $datetime1->diff($datetime2);
                                ?>
                                <h6 style="margin:10px 100px"><?php echo $interval->format('%h horas %i minutos %s segundos atrás');?></h6>
							</div>
							<div class="col-12 text-center ">
								<h5><?php echo $comentariopublicacao?></h5>
								<?php
									if($fotopublicacao!=NULL){?>
										<img src="./imagenspublicacao/<?php echo "$fotopublicacao" ?>"style="width:100%" >	
									<?php } 
								?>
								<div class="row"style="margin:10px 10px">
									<div class="col-12">
										<button type="button" class="btn btn-primary btn-sm">Curtir</button>
										<button type="button" class="btn btn-secondary btn-sm">comentar</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php }?>
			</div>
			<div class="col-3 text-center">
				<div class="row">
					<div class="col-12 text-center "style="background-color:rgba(28,28,28, .9);color:white;margin:10px 20px">
						<h3>Sugestoes de amizades</h3>
					</div>
				</div>
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