<?php
	session_start();
	
	// destrua a sessao para no inicio se ela existir pq senao fica mostrando as ultimas mensagens 
	if(isset($_SESSION["iddestinatario"])){
		unset($_SESSION["iddestinatario"]);
	}

	if($_SESSION['login']===1){
		include "operacoes/conn.php";
	$idusuario=$_SESSION['idusuario'];
	$sql=mysqli_query($conexao,"SELECT *FROM usuarios WHERE idpublico = '$idusuario'")or die("erro ao selecionar");
	$amigos=mysqli_query($conexao,"SELECT *FROM usuarios where idpublico NOT IN ('$idusuario')")or die("erro ao selecionar");
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
		<script type="text/javascript">
		function ajax(){// função java script para carregar o banco em tempo real link you tube https://www.youtube.com/watch?v=Z8yCpSxnWOw
			var req = new XMLHttpRequest();
			req.onreadystatechange = function(){
				if (req.readyState == 4 && req.status == 200) {
						document.getElementById('chat').innerHTML = req.responseText;
				}
			}
			req.open('GET', 'chat.php', true);
			req.send();
		}
	
		setInterval(function(){ajax();}, 1000);

 
	</script>		
</head>
<body onload="ajax();" style="background-image:url(imagens/7.jpg);background-position: center;background-repeat: repeat;background-attachment: fixed;">
	<?php
		include "header.php";
	?>
	<div class="container">
		<?php 	
			if(isset($_SESSION['mensagem'])){
				if($_SESSION['mensagem']==0){?>
					<div class="alert alert-danger" role="alert">
					selecione um usuario para enviar a mensagem!
				</div><?php
				}	
			}
			//$_SESSION['mensagem']=TRUE;
		?>
		<div class="row">
			<div class="col-4"> 
				<div class="col-12 text-centerrounded"style="background-color:rgba(28,28,28, .9);color:white;margin:10px 5px">
					<?php while($dados = mysqli_fetch_array($amigos)){
						$fotoamigos=$dados['foto']; //pego os atributos dos usuarios do banco, mudar para pegar somente de amigos
						$idamigo=$dados['idpublico'];?>
					<div class="row">
						<img src="./imagensPerfil/<?php if($fotoamigos=="NULL")echo"null.png"; else echo "$fotoamigos" ?> "style=" margin:10px 5px;vertical-align: middle;width: 50px;height: 50px;border-radius: 50%;" >
						<h4 style="margin:15px 5px"><a href="mensagens.php?iddestinatario=<?php echo $idamigo?>" style="text-decoration:none;color:white;" ><?php echo $idamigo?></a></h4>
					</div>
					<?php } ?>	
				</div>
			</div>
			<div class="col-8">
				<div class="col-12 text-centerborder rounded  " style="background-color:rgba(28,28,28, .9);color:white;margin:10px 10px">
					<?php 
					if(isset($_GET["iddestinatario"])) {
						$iddestinario = $_GET["iddestinatario"];
						$_SESSION['iddestinatario']=$iddestinario;
						echo"<h2> Conversas com: ".$iddestinario."</h2>";
					}
					else{
						echo"<h3>selecione algum Usuario para enviar a mensagem</h3>";
					}
					?>
					<div class="row">
						<?//aqui dentro recarrega a pagina chat.php?>
						<div class="col" id="chat" style="max-height: 350px;overflow-y:auto;height: 330px;">
							
						</div>
					</div>
				</div>
				<div class="col-12 text-centerborder rounded  " style="background-color:rgba(28,28,28, .9);color:white;margin:0px 10px;padding-top:10px">
					<form class="form-row " enctype="multipart/form-data" action="operacoes/inseremensagem.php" method="POST">
						<input type="hidden" id="idremetente" name="idremetente" value="<?php echo$idusuario?>" />
						<?php
						if(isset($_GET["iddestinatario"])) {
        					$iddestinario = $_GET["iddestinatario"];?>
							<input type="hidden" id="iddestinatario" name="iddestinatario" value="<?php echo$iddestinario?>" />
						<?php } ?>
						
						<div class="col-12">
						<textarea class="form-control" style="line-height: 20px;padding: 10px;height: 62px;resize: none;"id="textodamensagem"name="textodamensagem" rows="3" required autofocus></textarea>
						</div>	
						<div class="col-12">
						<input id="uploadImage" type="file" accept="image/*"name="foto">
						</div>
						<div class="d-flex col-6 mt-3">
							<button type="reset" class="btn btn-danger col-12 mb-3 mr-3">Cancelar</button>
							<button type="submit" class="btn btn-success col-12 mb-3">enviar</button>
						</div>
					</form>
				</div>	
			</div>
		</div>
	</div>
	<script>		
			var div = $('#divtoscroll').scrollHeight;
			console.log(div)
			div.prop("scrollTop", div.prop("scrollHeight"));

	</script>
</body>
<?php			
		}
		else {
			header('Location: login.php');
		}
?>
</html>
