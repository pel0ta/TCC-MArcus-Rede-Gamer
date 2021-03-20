<?php
	session_start();
	if($_SESSION['login']===1){
		include "operacoes/conn.php";
	$idusuario=$_SESSION['idusuario'];
	
	$sql=mysqli_query($conexao,"SELECT *FROM usuarios WHERE idpublico = '$idusuario'")or die("erro ao selecionar");
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
    <body >
        <?php
            include "header.php";
        ?>
        <div class="container" style="padding:20px 10px;border-radius: 25px;background-Color:000;background-image:url(imagens/capa1.jpg);" >
           <div class="row">
                <div class="col">
                <img src="imagensPerfil/marcus.jpeg" class="img-thumbnail " width="200" height="150" >
                </div>       
                <div class="col text-center mt-5">
                    <h3>Marcus Antonio</h3>
                    <h4>Pelota</h4>
                </div>              
                <div class="col text-center">
                    <button type="button" class="btn btn-primary md-3 mt-5">adicionar</button>
                </div>
            </div>    
        </div>
        <div class="container"style="padding:20px;border-radius: 25px;">
            <div class="row">
                <div class="col-4"style="background-color:black">
                    <div class="w-100"></div>
                    <div class="col-12"style="background-color:yellow">
                        <p>dados do usuario</p>
                        <p>começando a dar certo</p>
                        <p>começando a dar certo</p>
                        <p>começando a dar certo</p>
                        <p>começando a dar certo</p>
                        <p>começando a dar certo</p>
                        <p>começando a dar certo</p>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-12"style="background-color:blue">
                            <p>Amigos</p>
                    </div>
                </div>       
                <div class="col-8"style="background-color:blue">
                    <p>aqui dados sobre publicaçoes</p>
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