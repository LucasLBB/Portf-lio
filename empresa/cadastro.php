<?php

include "conexao.php";

$nomecompleto = filter_input(INPUT_POST,"txtnomecompleto",FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST,"txtemail",FILTER_SANITIZE_EMAIL);   
$cpf = filter_input(INPUT_POST,"txtcpf",FILTER_SANITIZE_NUMBER_INT);
$datanascimento = filter_input(INPUT_POST,"txtdatanascimento",FILTER_SANITIZE_NUMBER_INT);
$senha = md5(filter_input(INPUT_POST,"txtsenha",FILTER_SANITIZE_URL));
$cep = filter_input(INPUT_POST,"txtcep",FILTER_SANITIZE_NUMBER_INT);
$cidadeselect = filter_input(INPUT_POST,"procurarcidade",FILTER_SANITIZE_STRING);
$celular = filter_input(INPUT_POST,"txtcelular",FILTER_SANITIZE_NUMBER_INT);
$estadoselect = filter_input(INPUT_POST,"procurar",FILTER_SANITIZE_STRING);

$sql="INSERT INTO tbempresa1 (nomecompleto,cpf,dt_nascimento,email,senha,cep,celular,estado) 
VALUES ('$nomecompleto','$cpf','$datanascimento','$email','$senha','$cep','$celular','$estadoselect')";

$result = mysqli_query($conexao, $sql);

$endresult = mysqli_close($conexao);

if(md5(preg_match('/^[\w\d]{6,20}$/',$senha))) //Exige uma quantidade minima de 6 caracteres no campo senha e no máximo 20. 
{
    echo "Senha correta";
}
else
{
    echo "Não foi possível concluir o cadastro";
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
        
        echo "CEP válido";
        
    }
    
    if(strlen($celular) == 11)
    {
        echo "Celular Válido";
    }
    else
    {
        echo "Celular Inválido";
    }

    
    







