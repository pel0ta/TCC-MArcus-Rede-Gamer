<?php
    session_start();
    if($_SESSION['login']===1){
        include "operacoes/conn.php";
        $idusuario=$_SESSION['idusuario'];
        $sql=mysqli_query($conexao,"SELECT *FROM usuarios WHERE idpublico = '$idusuario'")or die("erro ao selecionar");
        while($dados = mysqli_fetch_array($sql)){
            $idpublico=$dados['idpublico'];
            $nome=$dados['nome'];
            $cidade=$dados['cidade'];
            $estado=$dados['estado'];
            $pais=$dados['pais'];
            $datanasc=$dados['datanas'];
            $foto=$dados['foto'];
        }
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
                    
                </div>
            </div>    
        </div>
        <div class="container "style="padding:20px 10px;border-radius: 25px;">
                    <?php //apenas uma div pra informar que os dados nao foram atualizados 
                        if(isset($_SESSION['erro'])){	
                            if($_SESSION['erro'] == 2){?>
                                <div class="alert alert-danger" role="alert">
                                Erro ao Alterar os dados<br>Tente novamente mais tarde
                    </div><?php }$_SESSION['erro']='false';}                    
                    ?>
            <div class="col-12 text-center border rounded"style="background-color:rgba(28,28,28, .9);color:white;margin:10px -15px">
                <div class="row justify-content-center text-center ">
                    <form class="form-row " enctype="multipart/form-data" action="operacoes/alteraDados.php" method="POST">
                        <h3>Atualizar Dados</h3><br>
                </div>
                <div class="row justify-content-center text-center">
                    <div class="col-4">
                        <h5>Nome</h5>
                        <input type="text" name="nome" id="nome" class="form-control mb-2" 
                            value="<?php echo $nome; ?>" minlength="3" required autofocus>
                    </div>
                </div>
                <div class="row justify-content-center text-center">
                    <div class="col-4">
                        <h5>Alterar Foto:</h5>
                        <input type="file" name="arquivo">
                    </div>
                </div>
                <div class="row justify-content-center text-center">
                    <div class="col-4 mt-3">
                        <h5>Data de nascimento:</h5>
                        <input type="date" name="datanas" id="datanas" class="form-control mb-2" value="<?php echo $datanasc;?>" required autofocus>
                    </div>
                </div>
                <div class="row justify-content-center text-center">
                    <div class="col-4">
                        <h5>Nacionalidade:</h5>
                        <input type="text" name="pais" id="pais" class="form-control mb-2"value="<?php echo $pais;?>"
                            minlength="4" required autofocus>
                    </div>
                </div>
                <div class="row justify-content-center text-center">
                    <div class="col-3">
                        <select class="form-select form-control mb-2" aria-label="Estado" name="estado" id="estado"required>
                            <option selected>----Estado----</option>
                            <?php
                                $sql=mysqli_query($conexao,"SELECT *FROM estados")or die("erro ao selecionar");                            
                                while($dados = mysqli_fetch_array($sql)){
                            ?>
                            <option value="<?=$dados['codigo_uf'];?>"><?=$dados['uf'];?></option><?php }?>
                        </select>
                    </div>
                    <div class="col-3">
                        <select class="form-select form-control mb-2" aria-label="cidade" name="cidade" id="cidade" required>
                            <option selected>----Cidade----</option>
                            <?php
                                $sql=mysqli_query($conexao,"SELECT *FROM municipios ORDER BY nome")or die("erro ao selecionar");                            
                                while($dados = mysqli_fetch_array($sql)){
                            ?>
                            <option value="<?=$dados['codigo_ibge'];?>"><?=$dados['nome'];?></option><?php }?>
                        </select>
                    </div>
                </div>
                <div class="row justify-content-center text-center">
                    <div class="col-4">
                        <a href="perfil.php?idpublico=<?php echo $idpublico?>"><button type="button" class="btn btn-danger btn-sm">cancelar </button></a>
                        <button type="submit" class="btn btn-success btn-sm ">Alterar</button>
                    </div>                    
                </div>
                </form>
            </div>
        </div>
    </body>
</html>
    <?php
    }
    else{
		header('Location: login.php');
    }    
?>