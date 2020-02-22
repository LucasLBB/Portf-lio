<?php

include "conexao.php";
include "validacaoalt.html";

$dados=$_POST['txtdados'];
$nome=$_POST['txtnome'];

$sql= "UPDATE usu set codigo='{$dados}', nome='{$nome}' where codigo='{$dados}'";

mysqli_query($conexao, $sql);

mysqli_close($conexao);

echo "Alterado com sucesso!!!";
?>