<?php
    include "../controller/restritoSession.php";
    require_once "../controller/obterDados.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Item</title>
</head>
<body>
    <form action="../controller/alterarDados.php" method="POST">
    
        <input type="text" name="idItem" placeholder="id" value="<?php echo $idItem ?>" hidden readonly>
        <input type="text" name="descricao" placeholder="Descrição" value="<?php echo $descricao ?>" onkeypress="return somenteLN(event)">
        <input type="text" name="valor" placeholder="Valor Unitário" value="<?php echo $valor ?>" onkeyup="preencher(this)">
        <input type="text" name="quantidade" placeholder="Quantidade" value="<?php echo $quantidade ?>" onkeypress="return somenteN(event)">

        <input type="submit" value="Alterar">
    </form>

    <script src="javascript/main.js"></script>
</body>
</html>