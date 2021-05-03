<?php
session_start();
if($_SESSION['login']===1){
    include "operacoes/conn.php";
    $idusuario=$_SESSION['idusuario'];
    if(isset($_GET["idpublico"])) {
        $value = $_GET["idpublico"];  
        $sql=mysqli_query($conexao,"SELECT *FROM usuarios WHERE idpublico = '$value'")or die("erro ao selecionar");
        while($dados = mysqli_fetch_array($sql)){
            $foto=$dados['foto'];
            $idpublico=$dados['idpublico'];
            $nome=$dados['nome'];
            $cidade=$dados['cidade'];
            $sqlcidade=mysqli_query($conexao,"SELECT nome FROM municipios WHERE codigo_ibge = '$cidade'")or die("erro ao selecionar");
            while($dados1 = mysqli_fetch_array($sqlcidade)){$cidade=$dados1['nome'];}
            $estados=$dados['estado'];
            $sqlestado=mysqli_query($conexao,"SELECT nome FROM estados WHERE codigo_uf = '$estados'")or die("erro ao selecionar");
            while($dados1 = mysqli_fetch_array($sqlestado)){$estado=$dados1['nome'];}
            $pais=$dados['pais'];
        }
    }
    else{
        echo"<h1>Selecione um perfil</h1>";
    }   
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
    </header>
    <body style="background-image:url(imagens/7.jpg);background-position: center;background-repeat: repeat;background-attachment: fixed;">
        <?php
            include "header.php";
        ?>
        <div class="container">
           <div class="row"style="margin:10px 5px;padding:20px 10px;border-radius: 25px;background-Color:000;background-image:url(imagens/capa1.jpg);">
                <div class="col">
                <img src="./imagensPerfil/<?php if($foto=="NULL")echo"null.png"; else echo "$foto" ?> " class="img-thumbnail " width="200" height="150" >
                </div>       
                <div class="col text-center mt-5">
                    <h3><?php echo $nome;?></h3>
                    <h4>Conhecido na RG como:</h4>
                    <h3><?php echo $idpublico;?></h3>
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
                        <div class="col-12 text-center border border-success rounded"style="padding:15px; margin:10px -5px;background-color:rgba(28,28,28, .9);color:white;">
                            <h3>Dados</h3>
                            <h5><?php echo $nome;?></h5>
                            <h5><?php echo $cidade;?></h5>
                            <h5><?php echo $estado;?></h5>
							<?php
							if($idusuario==$value){?>
                            	<a href="atualizarUsuario.php"><button type="button" class="btn btn-outline-success btn-sm"><h6>Atualizar</h6></button></a>
							<?php } ?>
						</div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center border border-success rounded" style="padding:15px; margin:10px -5px;background-color:rgba(28,28,28, .9);color:white;">
                                <h3>Amigos</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center border border-success rounded"style="padding:15px; margin:10px -5px;background-color:rgba(28,28,28, .9);color:white;">
                                <h3>Jogos</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
					    <a href="operacoes/deletarUser.php"><button type="button" class="btn btn-danger btn-sm">excluir usuario</button></a>
				        </div>
                    </div>
                    
                </div>
                <!--Aqui começa a segunda colula com o tamanho 8 ficara dados para publicaçao e mostarar
                publicaçoes do usuario-->       
                <div class="col-8">
                    <div class="row">
                        <div class="col-12 text-center border border-success rounded"style="padding:15px; margin:10px 5px;background-color:rgba(28,28,28, .9);color:white;">
                            <h3>Publicar novo Conteudo</h3>
                            <form class="form-row " enctype="multipart/form-data" action="operacoes/inserepublicacao.php" method="POST">
							<input type="hidden" id="idpublico" name="idpublico" value="<?php echo$value?>" />
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
					// aqui agora pegar os dados das publicaçoes apenas do usuario
					$sqlpublicacao=mysqli_query($conexao,"SELECT *FROM publicacao where idusuario='$value' ORDER BY hora DESC" )or die("Erro ao selecionar");
					while($dados = mysqli_fetch_array($sqlpublicacao)){
						$idpublicacao=$dados['idpublicacao'];
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
								<h4 style="margin:10px 10px"><a href="perfil.php?idpublico=<?php echo $idpublicopublicacao?>"style="text-decoration:none;color:white;"><?php echo $idpublicopublicacao?></a></h4>
								<?php
                                 date_default_timezone_set('America/Sao_Paulo');
                                 $datetime1 = new DateTime($tempodapublicacao);
                                 $datetime2 = new DateTime(date('Y-m-d H:i:s',time()));
                                 $interval = $datetime1->diff($datetime2);
                                ?>
                                <h6 style="margin:10px 100px"><?php echo $tempodapublicacao; //echo $interval->format('%h horas %i minutos %s segundos atrás');?></h6>
								<?php
								if($idusuario==$idpublicopublicacao){?>
								<a href="operacoes/deletapublicacao.php?idpublicacao=<?php echo $idpublicacao?>"
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
								<h5><?php echo $comentariopublicacao?></h5>
								<?php
									if($fotopublicacao!=NULL){?>
										<img src="./imagenspublicacao/<?php echo "$fotopublicacao" ?>"style="width:100%" >	
									<?php } 
								?>
								<div class="row"style="margin:10px 10px">
									<div class="col-12">
										<button type="button" class="btn btn-primary btn-sm">Curtir</button>
									</div>
								</div>				
							</div>
							<form class="form-row " enctype="multipart/form-data" action="operacoes/inserecomentariopublicacao.php" method="POST">
								<input type="hidden" id="idusuario" name="idusuario" value="<?php echo$idusuario?>" />
								<input type="hidden" id="idpublicacao" name="idpublicacao" value="<?php echo$idpublicacao?>" />
								<div class="col-12">
									<label for="textocomentario">Comentar:</label>
									<textarea class="form-control" style="line-height: 20px;padding: 10px;height: 45px;resize: none;"id="textocomentario"name="textocomentario" rows="3" required autofocus></textarea>
								</div>
								<div class="d-flex col-6 mt-3">
									<button type="reset" class="btn btn-danger col-6 mb-3 mr-3">Apagar</button>
									<button type="submit" class="btn btn-success col-6 mb-3">Comentar</button>
								</div>
							</form>
							<div class="row"style="margin:5px 10px">
								<div class="col-12 text-center ">
                                    <p>Comentarios:</p>			
								</div>
								<?php
									$sqlcomentario=mysqli_query($conexao,"SELECT *FROM comentariopublicacao ORDER BY hora" )or die("erro ao selecionar");	
									while($dados = mysqli_fetch_array($sqlcomentario)){
										$comentario=$dados['comentario'];
										$tempocomentario=$dados['hora'];
										$usuariocomentario=$dados['idusuario'];
										$idcomentario=$dados['idcomentario'];
										$publicacaocomentario=$dados['idpublicacao'];
										$sql=mysqli_query($conexao,"SELECT foto,idpublico FROM usuarios WHERE idpublico = '$usuariocomentario'")or die("erro ao selecionar");
										while($dados = mysqli_fetch_array($sql)){
											$fotocomentario=$dados['foto'];
											$idpublicocomentario=$dados['idpublico'];
											if(	$publicacaocomentario==$idpublicacao){?>
												<div class="row">
													<img src="./imagensPerfil/<?php if($fotocomentario=="NULL")echo"null.png"; else echo "$fotocomentario" ?> "style="vertical-align: middle;width: 50px;height: 50px;border-radius: 50%;" >
													<h4 style="margin:10px 10px"><a href="perfil.php?idpublico=<?php echo $idpublicocomentario?>"style="text-decoration:none;color:white;"><?php echo $idpublicocomentario?></a></h4>
													<?php
													if($idusuario==$usuariocomentario){?>
													<a href="operacoes/Deletacomentario.php?idcomentario=<?php echo $idcomentario?>"
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
				<?php }?>
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