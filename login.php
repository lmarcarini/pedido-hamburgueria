<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//Get the email and username
$nome=$_POST["user"];
//$email="leonardo.marcarini@yahoo.com.br";
$senha=$_POST["senha"];
// definições de host, database, usuário e senha
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
$query = sprintf("SELECT id, tipo FROM usuarios WHERE user = '$nome' AND senha = '$senha'"); //O ideal é criptografar a senha
// executa a query
$result = mysqli_query($con,$query);
if($result==false) die("Erro SQL!");
// transforma os dados em um array
if(mysqli_num_rows($result)>0)
    echo json_encode(mysqli_fetch_assoc($result));
else
    echo '{"id":"0","tipo":""}';
http_response_code(200);
mysqli_free_result($result);
?>