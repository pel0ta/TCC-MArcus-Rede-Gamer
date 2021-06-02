<?php

include "vendor/autoload.php";
use Phpml\Clustering\KMeans;
include "operacoes/conn.php";
$users=array();
//session_start();
$idusuario=$_SESSION['idusuario'];
//echo $idusuario."<br>";
$sql=mysqli_query($conexao,"SELECT idpublico, cidade, estado FROM usuarios")or die("erro ao selecionar");
while($dados = mysqli_fetch_array($sql)){
    $users[$dados['idpublico']]=array($dados['cidade'],$dados['estado']);
}
//print_r($users);
$samples=$users;
//echo"<br>";
//$samples = [ 'marcus' => [1, 24], 'ronaldo' => [2, 24], 'luiz' => [1, 23],'joao' => [1, 24],'marcelo' => [2, 23]];
//print_r($samples);
//foreach ($samples as $key => $value) {
    //echo $key . " | ";
  //  foreach ($value as $item)
	   // echo $item  . " | " ;
   // echo "<br/>";
//}

$kmeans = new KMeans(2);
$ola=$kmeans->cluster($samples);
//var_dump($ola);
//echo"<br/>";
//echo"<br/>";
foreach ($ola as $key => $cluster) {
    
       // echo "<br>Cluster " . $key . "<br/>";
    foreach ($cluster as $nome => $atributos)
    if($nome==$idusuario){
        $aux=$key;
    }
    //echo $nome."<br>" ;//. " / " . var_dump($atributos) . "<br/>";
}
//echo $aux."<br>";
foreach ($ola as $key => $cluster) {
    if($key==$aux){
        // echo "<br>Cluster " . $key . "<br/>";
        foreach ($cluster as $nome => $atributos){
            if($nome!=$idusuario){//$nome
                $buscaamigo=mysqli_query($conexao,"SELECT idpublico,foto FROM usuarios WHERE idpublico='$nome'")or die("erro ao selecionar");
                while($dados=mysqli_fetch_array($buscaamigo)){
                    $idpublico=$dados['idpublico'];
                    $foto=$dados['foto'];
                    //mostrar o card de sugestao de amizade
                    $novabusca=mysqli_query($conexao,"SELECT *FROM amizades WHERE idpublico1='$idusuario' AND idpublico2='$nome'")or die("erro ao selecionar");
                    $novabusca1=mysqli_query($conexao,"SELECT *FROM amizades WHERE idpublico1='$nome' AND idpublico2='$idusuario'")or die("erro ao selecionar");
                    if(mysqli_fetch_row($novabusca)){
                    }
                    else{
                        if(mysqli_fetch_row($novabusca1)){
                        }
                        else{
                            ?>
                            <div class="col-6">
                                <div class="card text-white bg-secondary mb-3 align-items-center justify-content-center" >
                                    <img class="card-img-top" src="imagensPerfil/<?php if($foto=="NULL")echo"null.png"; else echo "$foto" ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <?php echo$idpublico?><br>
                                        <form action="operacoes/pedidodeamizade.php" method="POST">
                                            <input type="hidden" id="recebepedido" name="recebepedido" value="<?php echo$idpublico?>"/>
                                            <button type="submit"class="btn btn-primary">Adicionar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php  
                        }
                    }   
                }
            }
        }  
    }
    
}
//var_dump($ola[0]);


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



