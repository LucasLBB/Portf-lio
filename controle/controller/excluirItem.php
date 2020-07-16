<?php
include "../controller/restritoSession.php";
require_once "../model/conexao.php";
require_once "obterDados.php";

//Exclui o item selecionado
$dadosItem = $_GET['id'];

if (!isset($_SESSION['logado'])){
  header("Location: ../view/loginUser.php");
}else{
  $sql = "DELETE from tbgastos WHERE id = $dadosItem";
      
  $resultado = mysqli_query($conexao, $sql);
}
if($resultado){
    echo '<script type="text/javascript">
            alert("Item Excluído!");
            window.history.go(-2);
          </script>';
    exit;
}

mysqli_close($conexao);

