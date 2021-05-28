<html>
  <?php
    session_start();
    include "operacoes/conn.php";
  ?>
    <head>
        <title>Cadastro Rede Gamer</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="bootstrap.min.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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
                        <input type="file" name="arquivo"accept="image/*">
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
                        <select class="form-select form-control mb-2" aria-label="Estado" name="estado" id="estado" required>
                            <option selected>----Estado----</option>
                            <?php
                                $sql=mysqli_query($conexao,"SELECT *FROM estados")or die("erro ao selecionar");                            
				                while($dados = mysqli_fetch_array($sql)){
                            ?>
                            <option value="<?=$dados['codigo_uf'];?>"><?=$dados['uf'];?></option><?php }?>
                        </select>
                    </div>
                    <div class="col-6">
                        <select class="form-select form-control mb-2" aria-label="cidade" name="cidade" id="cidade" required>
                            <option selected>----Cidade----</option>
                            <?php
                                $sql=mysqli_query($conexao,"SELECT *FROM municipios ORDER BY nome")or die("erro ao selecionar");                            
				                while($dados = mysqli_fetch_array($sql)){
                            ?>
                            <option value="<?=$dados['codigo_ibge'];?>"><?=$dados['nome'];?></option><?php }?>
                        </select>
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