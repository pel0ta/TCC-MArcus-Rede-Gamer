<?php
	session_start();
	if($_SESSION['login']===1){
		include "operacoes/conn.php";
		$value = $_GET["idpublico"];
?>
<html>
<head>
    <title>Rede Gamer</title>
    <meta charset="utf-8">
	<link rel="stylesheet" href="bootstrap.min.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>	
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body style="background-image:url(imagens/7.jpg);background-position: center;background-repeat: repeat;background-attachment: fixed;">
	<?php
		include "header.php";
	?>
	<div class="container"style="border-radius: 25px;">
		<div class="row " >
			<div class="col-12 text-center border rounded"style="background-color:rgba(28,28,28, .9);color:white;margin:10px -15px">
				<h2>Jogos de <?php echo$value;?>:</h2><hr>
				<?php 
				$buscajogo=mysqli_query($conexao,"SELECT idjogo FROM jogosadicionados WHERE idusuario='$value'")or die("erro ao selecionar");
                $i=0;
                    while($dados=mysqli_fetch_array($buscajogo)){
                        $idjogo=$dados['idjogo'];
                        $dadosjogo=mysqli_query($conexao,"SELECT nome,imagem,id FROM jogos WHERE id='$idjogo'")or die("erro ao selecionar");
                        while($dados1=mysqli_fetch_array($dadosjogo)){
                            $fotojogo=$dados1['imagem']; 
                            $nomejogo=$dados1['nome'];
                            $idjogo=$dados1['id'];
						
                            ?>
                            <div class="row"style="padding:20px 10px">
                                <div class="col-2">
                                <img src="./imagensPerfiljogo/<?php echo"$fotojogo"?> " class="img-rounded col-md-10 " >
                                </div>
                                <div class="col-10">
                                    <h1><a href="paginaDojogo.php?idjogo=<?php echo $idjogo?>"style="text-decoration:none;color:white;"><?php echo$nomejogo?></a></h1>
                                </div>	
                            </div>
                            <?php }}?>
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
