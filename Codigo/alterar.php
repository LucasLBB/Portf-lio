<?php

include "conexao.php";
include "validacaoalt.html";

$dados=$_POST['txtdados'];
$nome=$_POST['txtnome'];

$sql= "UPDATE usu set codigo='{$dados}', nome='{$nome}' where codigo='{$dados}'";

if(mysqli_query($conexao, $sql))
{
    echo "Dados Alterados com sucesso";
}
else
{
    echo "Não foi possível alterar os dados";
}

mysqli_close($conexao);
?>