<?php
	session_start();
	if($_SESSION['login']===1){
		include "operacoes/conn.php";
        if(isset($_GET["idjogo"])) {
            $value = $_GET["idjogo"];  
            $sql=mysqli_query($conexao,"SELECT *FROM jogos WHERE id = '$value'")or die("erro ao selecionar");
            while($dados = mysqli_fetch_array($sql)){
                $imagem=$dados['imagem'];
                $capa=$dados['capa'];
                $nome=$dados['nome'];
                $descricao=$dados['descricao'];
            }
        }
        else{
            echo"<h1>selecione um jogo</h1>";
        }
	//$sql=mysqli_query($conexao,"SELECT *FROM usuarios WHERE idpublico = '$idusuario'")or die("erro ao selecionar");
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
        <div class="container border border-dark" style="border-radius: 55px;" >
            <div class="row">
                <div class="col-12 text-center">
                    <h3><?php echo $nome?></h3>                    
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <img id="fotocapa" class="img-fluid"  src="./imagenscapajogo/<?php if($capa=="NULL")echo"null.png"; else echo "$capa" ?> ">
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <p><?php echo $descricao?>
                </div>
            </div>
            <div class="row">   
                <div class="col-12 text-center">
                    <img id="fotocapa" class="img-thumbnail" width="200" height="150" src="./imagensPerfiljogo/<?php if($imagem=="NULL")echo"null.png"; else echo "$imagem" ?> ">
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <h3>aqui em baixo ficara os comentarios</h3>                    
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