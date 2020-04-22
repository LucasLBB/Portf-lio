<?php

include "conexao.php";

$nomecompleto = filter_input(INPUT_POST, "txtnomecompleto", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, "txtemail", FILTER_SANITIZE_EMAIL);
$datanascimento = filter_input(INPUT_POST, "txtdatanascimento", FILTER_SANITIZE_NUMBER_INT);
$senha = md5(filter_input(INPUT_POST, "txtsenha", FILTER_SANITIZE_URL));
$estadoselect = filter_input(INPUT_POST, "procurar", FILTER_SANITIZE_STRING);

$sql = "INSERT INTO tbempresa1 (nomecompleto,dt_nascimento,email,senha,estado) 
VALUES ('$nomecompleto','$datanascimento','$email','$senha','$estadoselect')";

$result = mysqli_query($conexao, $sql);

$endresult = mysqli_close($conexao);

// separando yyyy, mm, ddd
list($ano, $mes, $dia) = explode('-', $datanascimento);

// data atual
$hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
// Descobre a unix timestamp da data de nascimento da pessoa
$nascimento = mktime(0, 0, 0, $mes, $dia, $ano);
// cálculo
$idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

if ($idade >= 18) { //Exige a idade minima de 18 anos para se cadastrar no site.
    
} else {
    echo "Idade Inválida";
    exit;
}

if (filter_var($email, FILTER_VALIDATE_EMAIL) && $result) {
   
} else {
    echo "E-mail inválido.";
}
