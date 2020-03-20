<?php
session_start();

include "conexao.php";
include "validalogin";

if(empty($_POST['txtcpf']) || empty($_POST['txtsenha']))
{
    $_SESSION['Usuário não autenticado']=true;
    echo "Usuário não autenticado";
    header("Location:login.html");
} 
    
$cpf = mysqli_real_escape_string($conexao, $_POST['txtcpf']);
$senha =  (md5(mysqli_real_escape_string($conexao, $_POST['txtsenha'])));

$sql="SELECT cpf, id from tbempresa1 where cpf='{$cpf}' and senha='{$senha}'";

$result= mysqli_query($conexao, $sql);

$row=mysqli_num_rows($result);

if($row == 1)
{
    $_SESSION['txtcpf']=$cpf;
    echo "Usuário autenticado";
    header("Location:entra.php");
}
else
{
    $_SESSION['Usuário não autenticado']=true;
    echo "Usuário não autenticado";
    header("Location:login.html");
}