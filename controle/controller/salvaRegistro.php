<?php

require_once "../model/conexao.php";
include "../view/restrito.php";

$dataString = "";
$url = header("Location:../view/restrito.php?id={$_SESSION['id_user']}");

$desc = $_POST['r1'];
$valor = $_POST['r2'];
$qtd = $_POST['r3'];
$id = $_SESSION['id_user'];
$data = date('Y-m-d');

$result = count($desc);

for ($i = 0; $i < $result; $i++) {
   //O trocaVirgula modifica a virgula por ponto.
   $trocaVirgula = str_replace(',', '.', $valor[$i]);
   //Verifica se o campo quantidade é númerico
   if(is_numeric($qtd[$i])){
      $Total = $qtd[$i] * $trocaVirgula;
   }else{
      echo "Apenas valores númericos";
   }
   $dataString .= "('$desc[$i]','$trocaVirgula','$qtd[$i]','$Total','$id','$data'),";
}

// retira a ultima virgula
$values = substr($dataString, 0, -1);

//Retira os parenteses, e aspas simples da string
$modify = str_replace(["(", ")", "'"], "", $values);

//Retira as vírgulas e tranforma em Array
$arrayValues = explode(",", $modify);


//Percorre o array, caso encontre um valor vazio, adiciona o valor true à variavel $erro
foreach ($arrayValues as $value => $key) {
   if (empty($key)) {
      $erro = true;
   }
}

//Verifica se a variavel $erro recebeu o valor boolean
if ($erro == true) {
   echo "Preencha os campos";
   $url;
   } else {
   echo "Valores corretos";
   
   //a query para inserir os dados no banco 
   $sql = ("INSERT INTO tbgastos (descricao,valor,quantidade,valorTotal,id_usuario,dtSalv) VALUES $values");

   //Verifica se a conexão foi feita com sucesso;
   $executaSql = mysqli_query($conexao, $sql);
   
   if ($executaSql) {
      echo "Tudo certo";
      mysqli_close($conexao);
      $url;
   } else {
      echo "Ocorreu um erro";
   }
}
