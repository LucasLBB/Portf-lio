<?php

include "conexao.php";

$dados=$_POST['txtdados'];
$nome=$_POST['txtnome'];

$sql= "INSERT INTO usu (codigo,nome) VALUES ('$dados','$nome')";

$result= mysqli_query($conexao, $sql);

$row='$result';

if($result == true and $row != 1)
{
    echo "Cadastrado com Sucesso";
}
else
{
    echo "Erro ao Cadastrar";
}

?>