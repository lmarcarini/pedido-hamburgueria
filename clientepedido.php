<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

date_default_timezone_set('America/Sao_Paulo');
//dados de entrada
$endereco=$_POST['endereco'];//"Rua Toquinho";
$telefone=$_POST['telefone'];//"2733";
$observacao=$_POST['observacao'];//"sem cebola";
$formapagamento=$_POST['formapagamento'];//"cartao";
$formaentrega=$_POST['formaentrega'];//"entrega";
$cliente=$_POST['cliente'];
$data=new DateTime('NOW');
$datatxt=$data->format('Y-m-d H:i');
//Quantidades de itens
$itens=$_POST['items'];//array("1"=>"2", "2"=>"1");
// definições de host, database, usuário e senha
//include "config/config.php";
$host = "localhost:3308";
$db   = "hamburgueria";
$user = "root";
$pass = "";
// conecta ao banco de dados
$con = mysqli_connect($host, $user, $pass, $db);
// check connection 
if($con->connect_error) {
    die("connection failed : " . $con->connect_error);
} else {
    // echo "Successfully Connected";
}
// cria a instrução SQL que vai selecionar os dados
$query = sprintf("INSERT INTO `pedidos` (`telefone`, `horario`, `endereco`, `status`, `observacao`, `formapagamento`, `formaentrega`,`cliente`) VALUES ('$telefone', '$datatxt', '$endereco', 'pedido', '$observacao', '$formapagamento', '$formaentrega', '$cliente')");
// executa a query
$result = mysqli_query($con,$query);
//Pega o último id
$insert_id=mysqli_insert_id($con);
foreach ($itens as $itemid => $quantidade){
    $query = sprintf("INSERT INTO `itemspedidos` (`quantidade`,`pedidoid`,`itemid`) VALUES ('$quantidade','$insert_id','$itemid')");
    mysqli_query($con,$query);
}

http_response_code(200);
//echo json_encode($insert_id);
mysqli_close($con)
?>