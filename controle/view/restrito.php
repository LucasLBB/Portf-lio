<?php
    require "../controller/restritoSession.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Área Restrita</title>
    <meta charset="utf-8">
</head>

<body>
    <noscript>
        <p><b>Para completo funcionamento do site, por favor ative o JavaScript.</b></p>
    </noscript>

    <h1>Olá, <?php echo $dados['nome']; ?></h1>

    <a href="../controller/logout.php">Sair</a>
    <form action="../controller/salvaRegistro.php" method="POST">
        <table id="tabela">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Valor Unitário</th>
                    <th>Quantidade</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" name="r1[]" placeholder="Ex: Pão" onkeypress="return somenteLN(event)" required></td>
                    <td><input type="text" id="val" name="r2[]" placeholder="Ex: 0.30" onkeyup="preencher(this)" required></td>
                    <td><input type="text" name="r3[]" placeholder="Ex: 10" onkeypress="return somenteN(event)" required></td>
                    <a href="#" class="remover" onclick="removerLinha()">Remover Campo</a>
                    <a href="#" class="add">adicionar campo</a>
                    <a href="outraTela.php">Outra Tela</a>
                </tr>
            </tbody>
            <tfoot></tfoot>
        </table>

        <input id="enviar" type="submit" value="salvar">
    </form>
    <script src="javascript/main.js"></script>
</body>

</html>