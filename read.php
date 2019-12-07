<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

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
$query = sprintf("SELECT * FROM `items` WHERE dispon LIKE 'sim'");
// executa a query
$result = mysqli_query($con,$query);
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