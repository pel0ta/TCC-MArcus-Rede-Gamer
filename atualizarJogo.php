<?php
    session_start();
    if($_SESSION['login']===1){
        include "operacoes/conn.php";
        if(isset($_GET["idjogo"])) {
            $_SESSION["idjogo"]=$_GET["idjogo"];
            $value = $_GET["idjogo"];  
            $sql=mysqli_query($conexao,"SELECT *FROM jogos WHERE id = '$value'")or die("erro ao selecionar");
            while($dados = mysqli_fetch_array($sql)){
                $imagem=$dados['imagem'];
                $capa=$dados['capa'];
                $nome=$dados['nome'];
                $descricao=$dados['descricao'];
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
    <body>
        <div class="container "style="padding:20px 10px;border-radius: 25px;">
                    <?php 
                        if(isset($_SESSION['erro'])){	
                            if($_SESSION['erro'] == 2){?>
                                <div class="alert alert-danger" role="alert">
                                Erro ao Alterar os dados<br>Tente novamente mais tarde
                    </div><?php }$_SESSION['erro']='false';}                    
                    ?>
            <div class="row justify-content-center text-center ">
                <div class="col-6">
                <form class="form-row " enctype="multipart/form-data" action="operacoes/alteradadosjogo.php" method="POST">
                    <h5>Nome</h5>
                    <input type="text" name="nome" id="nome" class="form-control mb-2" 
                        value="<?php echo $nome; ?>" minlength="3" required autofocus>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-4">
                    <h5>Alterar Foto:</h5>
                    <input type="file" name="arquivofoto">
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-4">
                    <h5>Alterar Capa do jogo:</h5>
                    <input type="file" name="arquivocapa">
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-4 mt-3">
                    <h5>Alterar Descrição:</h5>
                    <textarea class="form-control"  name="descricao" rows="8"><?php echo$descricao?></textarea>
                </div>
            </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-4">
                    <a href="atualizarJogo.php"><button type="button" class="btn btn-danger btn-sm">cancelar </button></a>
                    <button type="submit" class="btn btn-success btn-sm ">Alterar</button>
                </div>                    
            </div>
            </form>
        </div>
    </body>
    </body>    
</html>
    <?php }
    }
    else{?>
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
            <div class="container" style="padding:20px 10px;border-radius: 25px;" >   
                <div class="row justify-content-center text-center">
                    <div class="col-12 text-center "style="padding:15px; margin:10px -5px">
                        <form class="form-row justify-content-center text-center " enctype="multipart/form-data" action="atualizarjogo.php" method="get">
                        <h3>Selecione o Id do Jogo</h3><br>
                    </div>
                </div>
                <div class="row justify-content-center text-center ">
                        <div class="col-6">
                            <input type="text" name="idjogo" id="idjogo" class="form-control mb-2" minlength="1" required autofocus>
                        </div>
                </div>
                <div class="row justify-content-center text-center">
                    <div class="col-4">
                        <button type="submit" class="btn btn-success col-4 mb-3">alterar</button>
                    </div>                    
                </div>
                </form>
            </div>
        </body>
    </html>  
    <?php
    }
    }
    else{
		header('Location: login.php');
    }    
?>