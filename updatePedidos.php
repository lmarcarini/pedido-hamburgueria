<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// definições de host, database, usuário e senha
$host = "localhost:3308";
$db   = "hamburgueria";
$user = "root";
$pass = "";
// Dado de verificacao
$pedidoid=$_POST['pedidoid'];
//Quantidades de itens
$itens=$_POST['items'];//array("1"=>"2", "2"=>"1");
// conecta ao banco de dados
$con = mysqli_connect($host, $user, $pass, $db);
// check connection 
if($con->connect_error) {
    die("connection failed : " . $con->connect_error);
} else {
    // echo "Successfully Connected";
}
// cria a instrução SQL que vai selecionar os dados
$query = sprintf("DELETE * FROM `itemspedidos` WHERE pedidoid = $pedidoid");
// executa a query
$result = mysqli_query($con,$query);
// cria a instrução SQL que vai repor os pedidos
foreach ($itens as $itemid => $quantidade){
    $query = sprintf("INSERT INTO `itemspedidos` (`quantidade`,`pedidoid`,`itemid`) VALUES ('$quantidade','$pedidoid','$itemid')");
    mysqli_query($con,$query);
}

http_response_code(200);
mysqli_free_result($result);
mysqli_close($con)
?>