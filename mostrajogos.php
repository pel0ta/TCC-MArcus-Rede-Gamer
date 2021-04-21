<?php
	session_start();
	if($_SESSION['login']===1){
		include "operacoes/conn.php";
	$idusuario=$_SESSION['idusuario'];
	
	$sql=mysqli_query($conexao,"SELECT *FROM jogos ")or die("erro ao selecionar");
?>
<html>
    <header>
        <title>Rede Gamer</title>
        <meta charset="utf-8">
		<link rel="stylesheet" href="bootstrap.min.css">
		<link rel="stylesheet" href="novostyler.css">
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>	
		<script type="text/javascript" src="script.js"></script>
    </header>
    <body style="background-image:url(imagens/panodefundo.png);background-position: center;background-repeat: no-repeat;background-attachment: fixed;">
        <?php
            include "header.php";
        ?>
        <div class="container"style="padding:100px 10px;border-radius: 25px;">
            <div class="row">
                <div class="col-12 text-center "style="padding:15px; margin:10px -5px;background-color:rgba(28,28,28, .9);color:white;">
                    <!-- aqui agora coloca os jogos que estao cadastrados no banco-->
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