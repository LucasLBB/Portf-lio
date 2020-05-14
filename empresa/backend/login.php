<?php
session_start();

include "../conexao/conexao.php";

if(empty($_POST['txtemail']) || empty($_POST['txtsenha'])){
    echo '<script type="text/javascript">
            alert("Erro ao logar, preencha todos os campos!");
            window.history.go(-1);
          </script>';
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
    header('Location:../frontend/privado.php'); 
    exit();
}
else{ 
    echo '<script type="text/javascript">
            alert("Erro ao logar, e-mail ou senha inválidos!");
            window.history.go(-1);
          </script>';
    exit();
}