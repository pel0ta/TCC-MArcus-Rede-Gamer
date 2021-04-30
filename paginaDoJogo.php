<?php
	session_start();
	if($_SESSION['login']===1){
		include "operacoes/conn.php";
        if(isset($_GET["idjogo"])) {
            $value = $_GET["idjogo"];  
            $idusuario=$_SESSION['idusuario'];
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
    <body style="background-image:url(imagenscapajogo/<?php echo$capa?>);background-attachment: fixed;center center fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
        <?php
            include "header.php";
        ?>
        <div class="container">
		<div class="row " >
			<div class="col-12 text-center border rounded"style="background-color:rgba(28,28,28, .9);color:white;margin:250px 20px">
                    <div class="row">
                        <div class="col-12">
                            <h1><?php echo $nome?></h1><br>
                            <button type="button" class="btn btn-outline-success">Adicionar aos Favoritos</button>
                            <button type="button" class="btn btn-outline-info">Adicionar aos jogos jogaveis</button><hr>
                        </div>                     
                    </div>
                    <div class="row">               
                        <h4>Generos:&nbsp</h4>
                        <button type="button" class="btn btn-outline-success mr-3">Genero 1</button>
                        <button type="button" class="btn btn-outline-info mr-3">genero 2</button><hr>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h2>Descrição</h2>
                            <hr>
                        </div>
                    </div>
                    <div class="row"style="padding:20px 10px">
                        <div class="col-12">
                            <?php echo $descricao?>
                        </div>
                    </div>
                    <div class="row"style="margin:5px 10px">
                        <div class="col-12 text-center ">
                            <p><h3>Comentarios:</h3></p>			
                        </div>
                        <div class="col-12 textt-center">
                            <form class="form-row " enctype="multipart/form-data" action="operacoes/inserecomentariojogo.php" method="POST">
                                <input type="hidden" id="idusuario" name="idusuario" value="<?php echo$idusuario?>" />
                                <input type="hidden" id="idjogo" name="idjogo" value="<?php echo$value?>" />
                                <div class="col-12">
                                    <label for="textocomentario">Escrever um comentario:</label>
                                    <textarea class="form-control" style="line-height: 20px;padding: 10px;height: 62px;resize: none;"id="textocomentario"name="textocomentario" rows="3" required autofocus></textarea>
                                </div>
                                <div class="d-flex col-6 mt-3">
                                    <button type="reset" class="btn btn-outline-secondary col-3 mb-3 mr-5">Apagar</button>
                                    <button type="submit" class="btn btn-outline-success col-3 mb-3">Comentar</button>
                                </div>
							</form>                        
                        </div>
                        <?php
                            $sqlcomentario=mysqli_query($conexao,"SELECT *FROM comentariojogo ORDER BY hora" )or die("erro ao selecionar");	
                            while($dados = mysqli_fetch_array($sqlcomentario)){
                                $comentario=$dados['comentario'];
                                $tempocomentario=$dados['hora'];
                                $usuariocomentario=$dados['idusuario'];
                                $idcomentario=$dados['idcomentario'];
                                $jogocomentario=$dados['idjogo'];
                                $sql=mysqli_query($conexao,"SELECT foto,idpublico FROM usuarios WHERE idpublico = '$usuariocomentario'")or die("erro ao selecionar");
                                while($dados = mysqli_fetch_array($sql)){
                                    $fotocomentario=$dados['foto'];
                                    $idpublicocomentario=$dados['idpublico'];
                                    if(	$jogocomentario==$value){?>
                                        <div class="row">
                                            <img src="./imagensPerfil/<?php if($fotocomentario=="NULL")echo"null.png"; else echo "$fotocomentario" ?> "style="vertical-align: middle;width: 50px;height: 50px;border-radius: 50%;" >
                                            <h4 style="margin:10px 10px"><?php echo$idpublicocomentario;?></h4>
                                            <?php
                                            if($idusuario==$usuariocomentario){?>
                                            <a href="operacoes/Deletacomentariojogo.php?idcomentario=<?php echo $idcomentario?>"
                                                style="text-decoration: none; color: black; font-weight: bold; font-size: 18px;">
                                                <div class="align-items-center justify-content-center btn btn-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                    </svg>
                                                </div>
                                            </a>
                                            <a href="#"
                                                style="margin: 0px 15px;text-decoration: none; color: black; font-weight: bold; font-size: 18px;">
                                                <div class="align-items-center justify-content-center btn btn-warning">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                    </svg>
                                                </div>
                                            </a>
                                            <?php }?>
                                        </div>
                                        <div class="col-12 text-center ">
                                            <p><?php echo$comentario;?></p>
                                            <hr>			
                                        </div>	
                                    <?php }		
                                }	
                            }
                        ?>
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