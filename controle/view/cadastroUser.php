<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Controle de Gastos</title>
    </head>
    <body>
        <form action="../controller/cadastro.php" method="POST" onsubmit="return verificaAutenticidade()">

            <div><input type="text" name="nome" placeholder="Nome" size="25" required></div>
            <div><input type="text" name="email" placeholder="E-mail" size="25" pattern="^\w*(\.\w*)?@\w*\.[a-z]+(\.[a-z]+)?$" required></div>
            <div><input type="password" id="senha" name="senha" placeholder="Senha" onkeyup="return senhaVerifica(this)" size="25" required></div>

            <input type="submit" id="cad" value="Cadastrar">
        
        </form>

        <div id="resultado"></div>
        <script src="javascript/cad.js"></script>
    </body>
</html>