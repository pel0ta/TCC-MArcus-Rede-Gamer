<?php

include "vendor/autoload.php";
use Phpml\Clustering\KMeans;

$samples = [ 'marcus' => [1, 24], 'ronaldo' => [2, 24], 'luiz' => [1, 23],'joao' => [1, 24],'marcelo' => [2, 23]];
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
	echo "....." . $nome ;//. " / " . var_dump($atributos) . "<br/>";
}


//$samples = [ 'Label1' => [1, 1], 'Label2' => [8, 7], 'Label3' => [1, 2]];

/*javascript
 
$("#select-estados").change(function(){
    const codigo_uf = $("#select-estados").val()
 
    $.ajax({
        method: "POST",
        url: '../../busca-cidades',
        data: {codigo_uf},
        success: function(data){
           data = json.PARSE(data);
 
            let html = ´
                <option value=${data.value}>${data.label}</option>
            ´;
           $("#select-cidade").html(html)
        }
    });
});
 
Php{
    $uf = $_POST['codigo_uf'];
    $select = select * into municipios where estado_uf = :$uf
 
    if($select){
        $resultado = $select->fetchAll();
    }
 
 
    echo json_encode($resultado);
} */
?>



