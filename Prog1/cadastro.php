<?php

include "conexao.php";
include "cadastro.php";

$usuario=$_POST['txtusuario'];
$email=$_POST['txtemail'];
$senha=$_POST['txtsenha'];
$confsenha=$_POST['txtconfsenha'];

$sql="INSERT INTO tbusuario (usuario,email,senha,confsenha) VALUES ('$usuario','$email','$senha','$confsenha')";

if ($senha == $confsenha && $email)
{
    mysqli_query($conexao,$sql);
    
    mysqli_close($conexao);
    
    //header("refresh: 2 ,url=Sucesso.html");
}
else
{
    echo "Não foi possivel realizar o cadastro";
}
?>