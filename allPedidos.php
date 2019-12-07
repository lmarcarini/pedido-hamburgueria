<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// definições de host, database, usuário e senha
$host = "localhost:3308";
$db   = "hamburgueria";
$user = "root";
$pass = "";
// Dado de verificacao
$nome="user";//$_POST['user'];
$senha="user";//$_POST['senha']
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
if(mysqli_num_rows($result)>0){
    $query = sprintf("SELECT * FROM `pedidos` ORDER BY horario DESC");
    // executa a query
    $result2 = mysqli_query($con,$query);
    if($result2==false) die("Erro SQL!");
    // transforma os dados em um array
    $linha=array();
    while($row=mysqli_fetch_assoc($result2)){
        $linha[]=$row;
    }
    echo json_encode($linha);
    mysqli_free_result($result2);
}
http_response_code(200);
mysqli_free_result($result);
mysqli_close($con)
?>