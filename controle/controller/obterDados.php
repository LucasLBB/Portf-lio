<?php
    require_once "../model/conexao.php";
    
//Dados do Item

@$getId = $_GET['id'];

$sql = "SELECT * FROM tbgastos WHERE id = '$getId'";
$result = mysqli_query($conexao, $sql);


if ($dadosItem = mysqli_num_rows($result) > 0) {
    while ($linha = mysqli_fetch_assoc($result)) {

        $idItem = $linha['id'];
        $descricao = $linha['descricao'];
        $valor = $linha['valor'];
        $quantidade = $linha['quantidade'];
    }
}

    






