<html>
  <?php
    session_start();
    include "operacoes/conn.php";
  ?>
    <head>
        <title>Cadastro Rede Gamer</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="bootstrap.min.css">
		<link rel="stylesheet" href="styles.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>	
    <script type="text/javascript" src="script.js"></script>
    <body>
    <div class="container" style="padding:20px 10px;border-radius: 25px;" >   
        <div class="row">
            <div class="col-12 text-center border border-success rounded"style="padding:15px; margin:10px -5px">
            <div class="row justify-content-center text-center ">
                <form class="form-row " enctype="multipart/form-data" action="operacoes/inserejogo.php" method="POST">
                    <h3>Adicionar novo Jogo</h3><br>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-4">
                    <h5>Nome</h5>
                    <input type="text" name="nome" id="nome" class="form-control mb-2" minlength="3" required autofocus>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-4">
                    <h5>adicionar Foto do jogo</h5>
                    <input type="file" name="arquivofoto" required autofocus accept="image/*">
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-4">
                    <h5>adicionar Foto de capa do jogo</h5>
                    <input type="file" name="arquivocapa" accept="image/*" required autofocus >
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-4 mt-3">
                    <h5>Descrição do jogo</h5>
                    <textarea class="form-control" name="descricao" rows="8"></textarea>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-4">
                    <button type="reset" class="btn btn-white col-4 mb-3 mr-3 btn-outline-dark ">Limpar</button>
                    <button type="submit" class="btn btn-success col-4 mb-3"onclick="return validar()">cadastrar</button>
                </div>                    
            </div>
            </form>
            </div>
        </div>
    </div>
    </body>
</html>