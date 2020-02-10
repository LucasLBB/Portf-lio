<?php
session_start();
include "conexao.php";
//include "login.html";

// Se o campo email e senha for vazio redireciona para o login.html,impedindo o acesso sem inserir valores
if(empty($_POST['txtemail']) || empty($_POST['txtsenha'])) 
{
    header('Location:login.html');
    exit();
}
// Previne o Sql Injection
$email= mysqli_real_escape_string($conexao, $_POST['txtemail']);
$senha= mysqli_real_escape_string($conexao, $_POST['txtsenha']);

$sql= "SELECT email, senha from tbusuario where email='{$email}' and senha= '{$senha}'";

$result= mysqli_query($conexao, $sql);

$row= mysqli_num_rows($result);

if($row == 1)
{
    $_SESSION['email']= $email;
    header('Location:entrada.php');
    exit();
}
else
{
    $_SESSION['não autenticado']= true;
    header('Location:login.php');
    exit();
}

?>