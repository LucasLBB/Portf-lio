<?php
session_start();

include "conexao.php";

if(empty($_POST['txtemail']) || empty($_POST['txtsenha'])){
    $_SESSION['errorlogin']="Usuário não autenticado";
    header('Location:login.html');
    exit();
} 
    //Evita o SQL INJECTION
$email = mysqli_real_escape_string($conexao, $_POST['txtemail']);
$senha =  mysqli_real_escape_string($conexao, $_POST['txtsenha']);

$sql="SELECT * FROM tbempresa1 WHERE email='$email' and senha= md5('{$senha}')";

$result= mysqli_query($conexao, $sql);

$row=mysqli_num_rows($result);

if ($row > 0){
    $_SESSION['senha']= $senha;
    $_SESSION['email']= $email;
    header('Location:privado.php'); 
    exit();
}
else{ 
    header('Location:login.html');
    exit();
}
