<?php
	session_start();
	if($_SESSION['login']===1){
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
<body>
	<?php
		include "header.php";
	?>
	<Section >
		<div class="container">
			<div class="row" text-li>
				<div class="col-3 ">
				<?php
					echo $_SESSION['idusuario'];
				?> 	
				</div>
				<div class="col-6">posts
					<i class="far fa-frown"></i>
				</div>
				<div class="col-3">amigos
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