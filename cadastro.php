<html>
  <?php
    session_start();
  ?>
    <head>
        <title>Cadastro Rede Gamer</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="bootstrap.min.css">
		<link rel="stylesheet" href="styles.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>	
    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript">
      function validar(){
        var senha= formulario.senha.value;
        var confirmasenha= formulario.confirmasenha.value;
        if(senha!=confirmasenha){
            alert("As senhas são diferentes");
            formcad.senha.focus();
            return false;
        }
      }
    </script>
    <body>
    <div class="container-fluid h-100 d-flex align-items-center">
        <div class="row">
            <div class="col d-flex align-items-center justify-content-center">
              <img src="imagens/ima2.svg" width="300px">
            </div>
            <div class="h-100 col d-flex align-items-center">    
                <form class="form-row " enctype="multipart/form-data" action="operacoes/insereusuario.php" method="POST">
                    <div class="col-3">
                        <a href="login.php"
                            style="text-decoration: none; color: black; font-weight: bold; font-size: 18px;">
                            <div class="d-flex  align-items-center justify-content-center btn btn-primary">
                                <img src="icones/left-arrow-back.svg" width="20px"
                                    style="margin-right: 10px;">
                                    <span>Voltar</span>
                            </div>
                        </a>
                    </div>
                    <div>
                      <?php
                          if(isset($_SESSION['erro'])){	
                            if($_SESSION['erro'] == 1){?>
                      <div class="alert alert-danger" role="alert">
                          Erro ao casdastrar!<br>Email e/ou ID publico ja cadastrado!
                      </div>
                      <?php
                          }
                            session_destroy();
                          }
                      ?>
                   </div>
                    <div class="col-12 d-flex justify-content-center" style="margin-bottom: 20px;">
                        <h5>Crie sua conta na RG</h5>
                    </div>

                    <div class="col-6">
                        <input type="text" name="nome" id="nome" class="form-control mb-2" placeholder="Nome"
                            minlength="3" required autofocus>
                    </div>

                    <div class="col-6">
                        <input type="text" name="idpublico" id="idpublico" class="form-control mb-2"
                            placeholder="ID publico " minlength="4" required autofocus>
                    </div>

                    <div class="col-12">
                        <input type="email" name="email" id="email" class="form-control mb-2" placeholder="E-mail"
                            required autofocus>
                    </div>

                    <div class="col-6">
                        <input type="password" name="senha" id="senha" class="form-control mb-2" placeholder="Senha"
                            minlength="6" required autofocus>
                    </div>
                    <div class="col-6" style="margin-bottom: 20px;">
                        <input type="password" name="confirmasenha" id="confirmasenha" class="form-control mb-2"
                            placeholder="Confirmar Senha" required autofocus>
                    </div>
                    <div class="col-12">
                        <h5>Adicionar Foto:</h5>
                        <input type="file" name="arquivo">
                    </div>

                    <div class="col-12 mt-3">
                        <h5>Data de nascimento:</h5>
                        <input type="date" name="datanas" id="datanas" class="form-control mb-2" required autofocus>
                    </div>
                    <div class="col-12">
                        <h5>Nacionalidade:</h5>
                        <input type="text" name="pais" id="pais" class="form-control mb-2" placeholder="País"
                            minlength="4" required autofocus>
                    </div>
                    <div class="col-6">
                        <input type="text" name="cidade" id="cidade" class="form-control mb-2" placeholder="Cidade">
                    </div>
                    <div class="col-6">
                        <input type="text" name="estado" id="estado" class="form-control mb-2" placeholder="Estado">
                    </div>

                    <div class="d-flex col-6 mt-3">
                      <button type="reset" class="btn btn-white col-12 mb-3 mr-3 btn-outline-dark ">Limpar</button>
                      <button type="submit" class="btn btn-dark col-12 mb-3"onclick="return validar()">cadastrar</button>
                    </div>
                    
                </form>
            </div>
            
            <div class="col d-flex align-items-center justify-content-center">
              <img src="imagens/ima1.svg" width="300px"> 
            </div>
        </div>
</body>
</html>