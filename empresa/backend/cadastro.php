<?php

include "../conexao/conexao.php";

$nomecompleto = filter_input(INPUT_POST, "txtnomecompleto", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, "txtemail", FILTER_SANITIZE_EMAIL);
$senha = md5(filter_input(INPUT_POST, "txtsenha", FILTER_SANITIZE_URL));
$cidadeselect = filter_input(INPUT_POST, "procurarcidade", FILTER_SANITIZE_STRING);
$estadoselect = filter_input(INPUT_POST, "procurar", FILTER_SANITIZE_STRING);
$datanascimento = filter_input(INPUT_POST, "txtdatanascimento", FILTER_SANITIZE_NUMBER_INT);

$sql = "INSERT INTO tbempresa1 (nomecompleto,email,senha,estado,dt_nascimento) 
VALUES ('$nomecompleto','$email','$senha','$estadoselect','$datanascimento')";

//Valida o e-mail
if(filter_var($email, FILTER_VALIDATE_EMAIL) && (!empty($email))) {
}else {
    echo '<script type="text/javascript">
            alert("Erro ao cadastrar, e-mail Inválido!");
            window.history.go(-1);
        </script>';
    exit;
}

$consulta = "SELECT email FROM tbempresa1 WHERE email = '$email'";

$consultaresul = mysqli_query($conexao, $consulta);

$resultadoConsulta = mysqli_num_rows($consultaresul);

if($resultadoConsulta > 0){
    echo '<script type="text/javascript">
            alert("Erro ao cadastrar, e-mail já consta no banco de dados!");
            window.history.go(-1);
          </script>';
    exit;
}

// separando yyyy, mm, ddd
list($ano, $mes, $dia) = explode('-', $datanascimento);
// data atual
$hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
// Descobre a unix timestamp da data de nascimento da pessoa
$nascimento = mktime(0, 0, 0, $mes, $dia, $ano);
// cálculo
$idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

if ($idade < 18){ //Exige a idade minima de 18 anos para se cadastrar no site. 
    echo '<script type="text/javascript">
            alert("Erro ao cadastrar, idade inválida!");
            window.history.go(-1);
          </script>';
    exit;
}

$result = mysqli_query($conexao, $sql);

$endresult = mysqli_close($conexao);

if($result == true){
    echo '<script type="text/javascript">
            alert("Cadastrado com Sucesso!");
            window.history.go(-1);
          </script>';
}