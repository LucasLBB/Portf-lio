<?php
session_start();
require_once "../model/conexao.php";

//Verifica se está logado
if (!isset($_SESSION['logado'])){
    header("Location: ../view/loginUser.php");
}

//Dados
$id = $_SESSION['id_user'];
$sql = "SELECT * FROM tbcontrole WHERE id_usuario = '$id'";
$result = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_array($result);
//mysqli_close($conexao);


