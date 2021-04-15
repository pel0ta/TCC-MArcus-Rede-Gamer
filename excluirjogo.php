<?php
    session_start();
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
            <div class="container" style="padding:20px 10px;border-radius: 25px;" >   
                <div class="row justify-content-center text-center">
                    <div class="col-12 text-center "style="padding:15px; margin:10px -5px">
                        <form class="form-row justify-content-center text-center " enctype="multipart/form-data" action="operacoes/deletarjogo.php" method="Post">
                        <h3>Selecione o Id do Jogo para deletar</h3><br>
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
?>