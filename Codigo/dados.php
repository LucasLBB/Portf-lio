<?php 

include "conexao.php";
include "alterar.html";

$dados=$_POST['txtdados'];
$nome=$_POST['txtnome'];
    
$sql= "SELECT codigo, nome from usu where codigo= '{$dados}' and nome= '{$nome}'";

$result= mysqli_query($conexao, $sql);

$row= mysqli_num_rows($result);

if($row == 1)
{
    echo "Bem Vindo, ". $nome . ".";
}
else
{
    echo "Código Incorreto";
}

?>