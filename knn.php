<?php

include "vendor/autoload.php";
use Phpml\Clustering\KMeans;

$samples = [ 'marcus' => [1, 24], 'ronaldo' => [2, 24], 'luiz' => [1, 23],'joao' => [1, 24],'marcelo' => [2, 23]];
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
$kmeans = new KMeans(2);
$ola=$kmeans->cluster($samples);
var_dump($ola);

?>



