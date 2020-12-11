<?php
    session_start();
?>
<html>
	<head>
		<title>Pagina de login</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="bootstrap.min.css">
		<link rel="stylesheet" href="styles.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>	

	</head>

	<body class="text-center ">
		<form class="form-signin" action="operacoes/validalogin.php" id="formlogin" method="POST">
        <?php 	
          
            if( !$_SESSION){
                
            }
            else if ($_SESSION['sucesso']==1){?>
                <div class="alert alert-success" role="alert">
                cadastro com sucesso!
            </div><?php
            }
            else if($_SESSION['sucesso']==2){?>
                <div class="alert alert-danger" role="alert">
                email ou senha incorretos!
            </div><?php
            }
        session_destroy();
		 ?>
			<img src="imagens/logo.png" width="250px" alt="Logo">
			<input type="email" name="email" id="email" class="form-control" placeholder="E-mail"  required autofocus>
        	<input type="password" name="senha" placeholder="Senha" class="form-control" maxlength="32" required>
			<button type="submit" class="btn btn-dark btn-lg btn-block">Entrar</button>
			<div class="dropdown-divider"></div>
				Fazer cadastro? <a href="cadastro.php">Clique aqui</a>
			</div>
			<div class="alert alert-danger fade mt-3" role="alert">
				Usuário e/ou senha incorretos!
			</div>
		</form>
	</body>
</html>