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
    $codestado=$dados['estado'];
    $codcidade=$dados['cidade'];
    $sqlestado=mysqli_query($conexao,"SELECT latitude,longitude FROM estados Where codigo_uf=$codestado")or die("erro ao selecionar");
    while($dadosestado = mysqli_fetch_array($sqlestado)){
        $estadolat=$dadosestado['latitude'];
        $estadolong=$dadosestado['longitude'];    
    }
    $sqlcidade=mysqli_query($conexao,"SELECT latitude,longitude FROM municipios Where codigo_ibge=$codcidade")or die("erro ao selecionar");
    while($dadoscidade = mysqli_fetch_array($sqlcidade)){
        $cidadelat=$dadoscidade['latitude'];
        $cidadelong=$dadoscidade['longitude'];
    }
    $users[$dados['idpublico']]=array($estadolat,$estadolong,$cidadelat,$cidadelong);
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



$kmeans = new KMeans(2);
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