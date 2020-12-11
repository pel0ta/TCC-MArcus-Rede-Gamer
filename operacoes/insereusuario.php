
<?php
    session_start();
    include "conn.php";
    $nome = $_POST['nome'];
    $idpublico = $_POST['idpublico'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    $datanas = $_POST['datanas'];
    $pais = $_POST['pais'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    if($_FILES['arquivo']['name']){
      $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
      $novonome = md5(time()) . $extensao;
      $PASTA="../imagensPerfil.php/";
      
      if (!file_exists($PASTA)){
          mkdir("$PASTA", 0700);
          }	
       move_uploaded_file($_FILES['arquivo']['tmp_name'], $PASTA.$novonome);
        $sql=mysqli_query($conexao,"SELECT idpublico,email FROM usuarios WHERE idpublico = '$idpublico' OR email='$email'")or die("idpublico ja cadastrado");
          if(mysqli_num_rows($sql)==0){
          $adc="INSERT INTO usuarios  VALUES ('$nome','$idpublico','$email','$senha','$datanas','$pais','$cidade','$estado','$novonome')";
          }
          if (mysqli_query($conexao, $adc)) {
          $_SESSION['sucesso'] = 1;
          echo "adicionou";
          header('Location: ../login.php');    

        }
        else{
          header('Location: ../cadastro.php');
              $_SESSION['erro'] = 1;
              echo "email ou idpublico ja cadastrado";
        }
    }
    else{
    $sql=mysqli_query($conexao,"SELECT idpublico,email FROM usuarios WHERE idpublico = '$idpublico' OR email='$email'")or die("idpublico ja cadastrado");
	  if(mysqli_num_rows($sql)==0){
		$adc="INSERT INTO usuarios  VALUES ('$nome','$idpublico','$email','$senha','$datanas','$pais','$cidade','$estado','NULL')";
    }
    if (mysqli_query($conexao, $adc)) {
		$_SESSION['sucesso'] = 1;
		echo "adicionou";
      header('Location: ../login.php');    

	}
	else{
		header('Location: ../cadastro.php');
        $_SESSION['erro'] = 1;
        echo "email ou idpublico ja cadastrado";
  }	
}
?>