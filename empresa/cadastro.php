<?php

include "conexao.php";

$nomecompleto = filter_input(INPUT_POST, "txtnomecompleto", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, "txtemail", FILTER_SANITIZE_EMAIL);
$senha = md5(filter_input(INPUT_POST, "txtsenha", FILTER_SANITIZE_URL));
$cidadeselect = filter_input(INPUT_POST, "procurarcidade", FILTER_SANITIZE_STRING);
$estadoselect = filter_input(INPUT_POST, "procurar", FILTER_SANITIZE_STRING);

$sql = "INSERT INTO tbempresa1 (nomecompleto,email,senha,estado) 
VALUES ('$nomecompleto','$email','$senha','$estadoselect')";

$result = mysqli_query($conexao, $sql);

$endresult = mysqli_close($conexao);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "E-mail inválido.";
} else {
    return $email;
}
