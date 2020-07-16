<?php

require_once "../model/conexao.php";

$idItem = $_POST['idItem'];
$descricao = $_POST['descricao'];
$valorUnitario = $_POST['valor'];
$quantidade = $_POST['quantidade'];

$valorTotalModificado = $valorUnitario * $quantidade;

//Alteração dos livros
$sql="UPDATE tbgastos set id = '$idItem', descricao = '$descricao', valor = '$valorUnitario', quantidade = '$quantidade', valorTotal = '$valorTotalModificado' WHERE id = $idItem";

$result = mysqli_query($conexao,$sql);

mysqli_close($conexao);

if($result){
    echo '<script type="text/javascript">
            alert("Item Alterado com Sucesso!");
            window.history.go(-1);
          </script>';
}else{
  echo '<script type="text/javascript">
            alert("Ocorreu um erro! Tente novamente.");
            window.history.go(1);
          </script>';
}
