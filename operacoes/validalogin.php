<?php
	session_start();
	include "conn.php";
	$email=$_POST['email'];
	$senha=$_POST['senha'];
	$sql=mysqli_query($conexao,"SELECT *FROM usuarios WHERE email = '$email' AND senha = md5('$senha')")or die("erro ao selecionar");
	if(mysqli_num_rows($sql)==0){
		header('Location: ../login.php');
		$_SESSION['sucesso'] = 2;
		die();
	}
	
	else{
		while($dados = mysqli_fetch_array($sql)){
			$_SESSION['idusuario']= $dados['idpublico'];
			echo $_SESSION['idusuario'];
		}
		$_SESSION['login'] = 1;
		header('Location: ../index.php');
		
	}
?>		