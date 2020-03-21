<?php
session_start();

include "conexao.php";

if(empty($_POST['txtemail']) || empty($_POST['txtsenha']))
{
    $_SESSION['errorlogin']="Usuário não autenticado";
    header('Location:login.html');
    exit();
} 
    //Evita o SQL INJECTION
$nome = mysqli_real_escape_string($conexao, $_POST['txtnome']);
$email = mysqli_real_escape_string($conexao, $_POST['txtemail']);
$senha =  mysqli_real_escape_string($conexao, $_POST['txtsenha']);

$sql="SELECT id,nomecompleto,email FROM tbempresa1 WHERE nomecompleto='$nome' and email='$email' and senha= md5('{$senha}')";

$result= mysqli_query($conexao, $sql);

$row=mysqli_num_rows($result);

if ($row == 1)
{
    $_SESSION['nomecompleto']= $nome;
    $_SESSION['email']= $email;
    header('Location:privado.php'); 
    exit();
}
else
{ 
    header('Location:login.html');
    exit();
}
