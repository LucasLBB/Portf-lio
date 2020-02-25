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

if(strlen($rg) == 9 ) //Vê quantos caracteres tem na variavel $rg e só aceita 9 caracteres.
{
    echo "RG Válido";
}
else
{
    echo "RG Inválido";
    exit;
}

// separando yyyy, mm, ddd
    list($ano, $mes, $dia) = explode('-', $datanascimento);

    // data atual
    $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
    // Descobre a unix timestamp da data de nascimento do fulano
    $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);

    // cálculo
    $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

if($idade >= 18) //Exige a idade minima de 18 anos para se cadastrar no site.
{
    
    echo "Idade Válida";
}
else
{
    echo "Idade Inválida";
    exit;
}

function validacpf($cpf)
    {
        $cpf=  preg_replace( '/[^0-9]/is', '', $cpf ); //Extrai os números.
        
        
    if(strlen($cpf) != 11) //Verifica se a quantidade de caracteres é diferente de 11.
    {
        return false;
    }
    
    if (preg_match('/(\d)\1{10}/', $cpf)) //Impossibilita a utilização de caracteres alfanumericos repetidos. Exemplo:"111.111.1111-11". 
    {
        return false;
    }
    
    //Faz a conta para verificar a autenticidade do cpf. 
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf{$c} * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf{$c} != $d) {
            return false;
        }
    }
    return true;

    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {   
        
        echo "E-mail inválido.";    
    }
    else
    {
        
        echo "Seu e-mail é ".$email;
    }

    if(!preg_match('/^[0-9]{5,5}([- ]?[0-9]{3,3})?$/', $cep)) 
    {
        echo "CEP inválido.";
    }
    else
    {
        mysqli_query($conexao, $sql);
        
        mysqli_close($conexao);
        
        echo "CEP válido";
        
    }








