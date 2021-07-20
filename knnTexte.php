<?php

include "vendor/autoload.php";
use Phpml\Clustering\KMeans;
include "operacoes/conn.php";
$users=array();
session_start();
//$idusuario=$_SESSION['idusuario'];
//echo $idusuario."<br>";
$sql=mysqli_query($conexao,"SELECT idpublico, cidade, estado FROM usuarios")or die("erro ao selecionar");
while($dados = mysqli_fetch_array($sql)){
    $users[$dados['idpublico']]=array($dados['cidade'],$dados['estado']);
}
print_r($users);
$samples=$users;
echo"<br>";
//$samples = [ 'marcus' => [1, 24], 'ronaldo' => [2, 24], 'luiz' => [1, 23],'joao' => [1, 24],'marcelo' => [2, 23]];
print_r($samples);
foreach ($samples as $key => $value) {
    echo $key . " | ";
    foreach ($value as $item)
	    echo $item  . " | " ;
    echo "<br/>";
}



$kmeans = new KMeans(10);
$ola=$kmeans->cluster($samples);
var_dump($ola);
echo"<br/>";
echo"<br/>";
foreach ($ola as $key => $cluster) {
    echo "<br>Cluster " . $key . "<br/>";
    foreach ($cluster as $nome => $atributos)
	echo "....." . $nome."<br>" ;//. " / " . var_dump($atributos) . "<br/>";
}

?>



