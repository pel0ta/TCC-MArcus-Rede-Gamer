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
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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
                            <?php
                                $buscajogo=mysqli_query($conexao,"SELECT *FROM jogosadicionados WHERE idusuario='$idusuario'AND idjogo='$value'")or die("erro ao selecionar");
                                $linha=mysqli_fetch_array($buscajogo);
                                if($linha){
                                    $favorito=$linha['favorito'];
                                    if($favorito==1){?>
                                        <form action="operacoes/removejogofavorito.php" method="POST">
                                            <button type="submit"class="btn btn-outline-danger">Remover dos favoritos</button>
                                            <input type="hidden" id="idusuario" name="idusuario" value="<?php echo$idusuario?>" />
                                            <input type="hidden" id="idjogo" name="idjogo" value="<?php echo$value?>" />
                                        </form>
                                        <form action="operacoes/removejogodaminhalista.php" method="POST">
                                            <button type="submit"class="btn btn-outline-danger">nao jogo mais </button><hr>
                                            <input type="hidden" id="idusuario" name="idusuario" value="<?php echo$idusuario?>" />
                                            <input type="hidden" id="idjogo" name="idjogo" value="<?php echo$value?>" />
                                        </form>
                                        <?php
                                    }
                                    else{?>
                                        <form action="operacoes/inserejogofavorito.php" method="POST">
                                            <button type="submit"class="btn btn-outline-success">Adicionar aos jogos Favoritos</button>
                                            <input type="hidden" id="idusuario" name="idusuario" value="<?php echo$idusuario?>" />
                                            <input type="hidden" id="idjogo" name="idjogo" value="<?php echo$value?>" />
                                        </form>
                                        <form action="operacoes/removejogodaminhalista.php" method="POST">
                                            <button type="submit"class="btn btn-outline-danger">nao jogo mais </button><hr>
                                            <input type="hidden" id="idusuario" name="idusuario" value="<?php echo$idusuario?>" />
                                            <input type="hidden" id="idjogo" name="idjogo" value="<?php echo$value?>" />
                                        </form> <?php
                                    }
                                }
                                else{   
                                    ?>
                                    <form action="operacoes/inserejogofavorito.php" method="POST">
                                        <button type="submit"class="btn btn-outline-success">Adicionar aos jogos Favoritos</button>
                                        <input type="hidden" id="idusuario" name="idusuario" value="<?php echo$idusuario?>" />
                                        <input type="hidden" id="idjogo" name="idjogo" value="<?php echo$value?>" />
                                    </form>
                                    <form action="operacoes/inserejogominhalista.php" method="POST">
                                        <button type="submit"class="btn btn-outline-info">Adicionar aos meus jogos</button><hr>
                                        <input type="hidden" id="idusuario" name="idusuario" value="<?php echo$idusuario?>" />
                                        <input type="hidden" id="idjogo" name="idjogo" value="<?php echo$value?>" />
                                    </form> 
                                    <?php 
                                }
                            ?>
                        </div>                     
                    </div>
                    <div class="row">               
                        <h4>Genero(s):&nbsp</h4>
                        <?php
                            $sqlgenerojogo=mysqli_query($conexao,"SELECT idgenero FROM generojogo WHERE idjogo = '$value'")or die("erro ao selecionar");
                            while($dados = mysqli_fetch_array($sqlgenerojogo)){
                                $genero=$dados['idgenero'];
                                $sqlgenero=mysqli_query($conexao,"SELECT nome FROM genero WHERE id = '$genero'")or die("erro ao selecionar");
                                while($dados1 = mysqli_fetch_array($sqlgenero)){
                                    $nomegenero=$dados1['nome'];?>
                                    <a href="#"><button type="button" class="btn btn-dark"><?php echo $nomegenero?></button></a><?php
                                }
                            }
                        ?>
                    </div>
                    <hr>
                    <div class="row">          
                        <h4>Plataforma(s):&nbsp</h4>
                        <?php
                            $sqlplataformajogo=mysqli_query($conexao,"SELECT idplataforma FROM plataformajogo WHERE idjogo = '$value'")or die("erro ao selecionar");
                            while($dados = mysqli_fetch_array($sqlplataformajogo)){
                                $plataforma=$dados['idplataforma'];
                                $sqlplataforma=mysqli_query($conexao,"SELECT nome FROM plataforma WHERE id = '$plataforma'")or die("erro ao selecionar");
                                while($dados1 = mysqli_fetch_array($sqlplataforma)){
                                    $nomeplataforma=$dados1['nome'];?>
                                    <a href="#"><button type="button" class="btn btn-dark"><?php echo $nomeplataforma?></button></a>&nbsp<?php
                                }
                            }
                        ?>
                    </div>
                    <hr>
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
                                    <textarea class="form-control" style="line-height: 20px;padding: 10px;height: 62px;resize: none;"id="textocomentario"name="textocomentario" rows="3" required ></textarea>
                                </div>
                                <div class="d-flex col-6 mt-3">
                                    <button type="reset" class="btn btn-outline-secondary col-3 mb-3 mr-5">Apagar</button>
                                    <button type="submit" class="btn btn-outline-success col-3 mb-3">Comentar</button>
                                </div>
							</form>                        
                        </div>
                        <?php
                            $sqlcomentario=mysqli_query($conexao,"SELECT *FROM comentariojogo WHERE idjogo='$value' ORDER BY hora" )or die("erro ao selecionar");	
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
                                            <a data-toggle="modal" data-target="#exampleModal1" data-whatever="<?php echo$idcomentario?>" data-whateverconteudo="<?php echo$comentario?>"
														style="margin: 0px 15px;text-decoration: none; color: black; font-weight: bold; font-size: 18px;">
														<div class="align-items-center justify-content-center btn btn-warning">
															<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
																<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
															</svg>
														</div>
													</a>
													<!-- Modal -->
														<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color:black">
															<div class="modal-dialog" role="document">
																<div class="modal-content">
																		<div class="modal-header">
																			<h5 class="modal-title" id="exampleModalLabel">o carario</h5>
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																			</button>
																		</div>
																	<div class="modal-body">
																		<form class="form-row " enctype="multipart/form-data" action="operacoes/alteracomentariojogo.php" method="POST">
																			<input type="hidden" id="idcomentario" name="idcomentario" value="<?php echo$idcomentario?>" />
																			<div class="col-12">
																				<textarea class="form-control" style="line-height: 20px;padding: 10px;height: 100px;resize: none;"id="textocomentario"name="textocomentario" rows="3"required autofocus><?php echo $comentariopublicacao ?></textarea>
																			</div>
																			<div class="modal-footer">
																				<button type="reset"  data-dismiss="modal" class=" btn btn-danger  mb-3 mr-3">Cancelar</button>
																				<button type="submit" class="btn btn-success  mb-3">Alterar</button>
																			</div>
																		</form>		
																	</div>
																</div>  
															</div>
														</div>
													<!-- FIM Modal -->
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
<script>
$('#exampleModal1').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) // Button that triggered the modal
		var recipient = button.data('whatever') // Extract info from data-* attributes
		var recipient1 = button.data('whateverconteudo')
		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		var modal = $(this)
		modal.find('.modal-title').text('Alterar comentario publicação do id=' + recipient)
		modal.find('.modal-body input').val(recipient)
		modal.find('.modal-body textarea').val(recipient1)
	})
</script>