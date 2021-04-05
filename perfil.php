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
        <div class="container"style="padding:20px 10px;border-radius: 25px;">
            <div class="row">
                <!--aqui crio um linha e coloco 2 colunas, a primeira coluna de tamanho 4  
                referente com os dados do usuario contendo o 3 colunas uma pra editar 
                info outra pra mostrar amigos e a ultima para mostrar jogos -->
                <div class="col-4">
                    <div class="row">
                        <div class="col-12 text-center border border-success rounded"style="padding:15px; margin:10px -5px">
                            <h3>Sobre</h3>
                            <h5>Nome</h5>
                            <h5>Cidade</h5>
                            <h5>Estado</h5>
                            <button type="button" class="btn btn-outline-success btn-sm"><h6>Atualizar</h6></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center border border-success rounded" style="padding:15px; margin:10px -5px">
                                <h3>Amigos</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center border border-success rounded"style="padding:15px; margin:10px -5px">
                                <h3>Jogos</h3>
                        </div>
                    </div>
                    
                </div>
                <!--Aqui começa a segunda colula com o tamanho 8 ficara dados para publicaçao e mostarar
                publicaçoes do usuario-->       
                <div class="col-8">
                    <div class="row">
                        <div class="col-12 text-center border border-success rounded"style="padding:15px; margin:10px 5px">
                            <h3>Publicar novo Conteudo</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center border border-success rounded"style="padding:15px; margin:10px 5px">
                            <h3>Conteudos publicados pelo usuarios</h3>
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