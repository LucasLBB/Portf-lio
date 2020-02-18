<?php

include "conexao.php";

$nomecompleto = $_POST['txtnomecompleto'];
$rg = $_POST['txtrg'];
$cpf = $_POST['txtcpf'];
$datanascimento = $_POST['txtdatanascimento'];
$email = $_POST['txtemail'];
$senha = md5($_POST['txtsenha']);
$cep = $_POST['txtcep'];
$telefone = $_POST['txttelefone'];
$celular = $_POST['txtcelular'];

$sql="INSERT INTO tbempresa (nomecompleto,rg,cpf,dt_nascimento,email,senha,cep,telefone,celular) VALUES ('$nomecompleto','$rg','$cpf','$datanascimento','$email','$senha','$cep','$telefone','$celular')";

if(md5(preg_match('/^[\w\d]{6,20}$/',$senha)))
{
    echo "Senha correta";
}
else
{
    echo "Não foi possível concluir o cadastro";
    exit;
}

if($rg = 9 )
{
    mysqli_query($conexao,$sql);
    
    mysqli_close($conexao);    
}
else
{
    echo "RG Inválido";
    exit;
}

