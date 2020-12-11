<?php
	session_start();
	include "conn.php";
	$email=$_POST['email'];
	$senha=$_POST['senha'];
	$sql=mysqli_query($conexao,"SELECT email, senha FROM usuarios WHERE email = '$email' AND senha = md5('$senha')")or die("erro ao selecionar");
	if(mysqli_num_rows($sql)==0){
		header('Location: ../login.php');
		$_SESSION['sucesso'] = 2;
		die();
	}
	else{
		header('Location: ../index.php');
		$_SESSION['login'] = 1;
		
	}
	//$sql=mysqli_query($conexao,"SELECT email,senha FROM usuarios WHERE email = '$email' AND senha = md5('$senha')");
	//	if(mysqli_num_rows($sql)==0){
	//		header('Location:../login.php');
	//		$_SESSION['sucesso'] = 2;
	//	}
	//	else{
	//		header('Location: ../index.php');
	//		$_SESSION['login'] = 1;		
	//	}
?>		