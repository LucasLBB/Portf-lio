<?php
session_start();
require "../model/conexao.php";

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$hashSenha = password_hash($senha, PASSWORD_ARGON2ID);

if(empty($email) || empty($senha)){
    echo 'Erro! preencha todos os campos';
}else{
    $sql = "SELECT * FROM tbcontrole WHERE email = '$email'";
    $result = mysqli_query($conexao,$sql);
    $row = mysqli_num_rows($result);
    $dados = mysqli_fetch_array($result);
    $dadoSenhaHash = $dados[3];

    if($row > 0 && password_verify($senha, $dadoSenhaHash)){
        $sql = "SELECT * FROM tbcontrole WHERE email = '$email' and senha = '$dadoSenhaHash'";
        $result = mysqli_query($conexao,$sql);
        $row = mysqli_num_rows($result);
  
        if($row == 1){
            mysqli_close($conexao);
            $_SESSION['logado'] = true;
            $_SESSION['id_user'] = $dados[0];
            header("Location:../view/restrito.php?id={$_SESSION['id_user']}");
        }else{
            echo "Erro! E-mail ou senha incorretos";
        }
    }else{
        echo "Erro! E-mail ou senha incorretos";
    }
}
