<?php
require "../model/conexao.php";

$email = $_POST['email'];
$nome = $_POST['nome'];
$senha = $_POST['senha'];

//Exige mínimo 10 caracteres, minimo 1 letra minúscula, 1 letra maiúscula, 1 caracter especial e 1 número
$verificaSenha = preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{10,}$/", $senha);

//Verifica se existe algo escrito no campo nome e senha
if(empty($nome) || (empty($senha))) {
    echo '<script type="text/javascript">
            alert("Erro ao cadastrar, preencha todos os campos!");
            window.history.go(-1);
        </script>';
    exit;
}

//Valida o e-mail
if(filter_var($email, FILTER_VALIDATE_EMAIL) && (!empty($email))) {
}else {
    echo '<script type="text/javascript">
            alert("Erro ao cadastrar, e-mail Inválido!");
            window.history.go(-1);
        </script>';
    exit;
}

//Verifica se a senha atende aos requisitos
if(!$verificaSenha) {
    echo '<script type="text/javascript">
            alert("Erro! senha Inválida!");
            window.history.go(-1);
        </script>';
    exit;
}

//Verifica se o e-mail já está cadastrado
$consulta = "SELECT email FROM tbcontrole WHERE email = '$email'";

$consultaresul = mysqli_query($conexao, $consulta);

$resultadoConsulta = mysqli_num_rows($consultaresul);

if($resultadoConsulta > 0){
    echo '<script type="text/javascript">
            alert("Erro ao cadastrar, e-mail já consta no banco de dados!");
            window.history.go(-1);
          </script>';
    exit;
}

//Insere no banco o registro se passar por todas as verificações
$senhaCript = password_hash($senha, PASSWORD_ARGON2ID);

$sql = "INSERT INTO tbcontrole (nome,email,senha) VALUES ('$nome','$email','$senhaCript')";

$exec = mysqli_query($conexao,$sql);

$endexec = mysqli_close($conexao);

if($exec == true){
    echo '<script type="text/javascript">
            alert("Cadastrado com Sucesso!");
            window.history.go(-1);
          </script>';
}else{
    echo '<script type="text/javascript">
            alert("Erro ao cadastrar, tente novamente mais tarde!");
            window.history.go(-1);
          </script>';
}

