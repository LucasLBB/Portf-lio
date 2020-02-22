<?php

include "conexao.php";

$nomecompleto = $_POST['txtnomecompleto'];
$rg = $_POST['txtrg'];
$cpf = $_POST['txtcpf'];
$datanascimento = $_POST['txtdatanascimento'];
$email = $_POST['txtemail'];
$senha = md5($_POST['txtsenha']);
$cep = $_POST['txtcep'];
$celular = $_POST['txtcelular'];
$contrg= strlen($rg); // Faz a contagem dos caracteres da varíavel rg.

    // separando yyyy, mm, ddd
    list($ano, $mes, $dia) = explode('-', $datanascimento);

    // data atual
    $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
    // Descobre a unix timestamp da data de nascimento do fulano
    $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);

    // cálculo
    $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

$sql="INSERT INTO tbempresa (nomecompleto,rg,cpf,dt_nascimento,email,senha,cep,celular) VALUES ('$nomecompleto','$rg','$cpf','$datanascimento','$email','$senha','$cep','$celular')";

if(md5(preg_match('/^[\w\d]{6,20}$/',$senha))) //Exige uma quantidade minima de 6 caracteres no campo senha e no máximo 20. 
{
    echo "Senha correta";
}
else
{
    echo "Não foi possível concluir o cadastro";
    exit;
}

if($contrg == 9 ) //Pega o $contrg e vê quantos caracteres tem no campo rg e só aceita 9 caracteres.
{
    echo "RG Válido";
}
else
{
    echo "RG Inválido";
    exit;
}

if($idade >= 18) //Ecige a idade minima de 18 anos para se cadastrar no site.
{
    echo "Idade Válida";
}
else
{
    echo "Idade Inválida";
    exit;
}
