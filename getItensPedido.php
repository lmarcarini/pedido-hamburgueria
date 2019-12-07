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
// conecta ao banco de dados
$con = mysqli_connect($host, $user, $pass, $db);
// check connection 
if($con->connect_error) {
    die("connection failed : " . $con->connect_error);
} else {
    // echo "Successfully Connected";
}
// cria a instrução SQL que vai selecionar os dados
$query = sprintf("SELECT `itemspedidos`.quantidade AS `quantidade`, `itemspedidos`.`pedidoid` AS `pedidoid`, `itemspedidos`.`itemid` AS `itemid`, `items`.nome AS `nome` FROM `itemspedidos` JOIN `items` ON `itemspedidos`.itemid = `items`.id WHERE `itemspedidos`.`pedidoid`=$pedidoid");
// executa a query
$result = mysqli_query($con,$query);
if($result==false) die("Erro SQL!");
// transforma os dados em um array
$linha=array();
while($row=mysqli_fetch_assoc($result)){
    $linha[]=$row;
}
http_response_code(200);
echo json_encode($linha);
mysqli_free_result($result);
mysqli_close($con)
?>