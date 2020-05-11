<!DOCTYPE html>

<html lang="pt-br">

    <head>
    <title>Login</title>    
    <link href="headerlog.css" rel="stylesheet">
    <meta charset="utf-8">
    </head>
    
    <body>

    <iframe src="headerlog.html"></iframe>

        <h1>Login</h1>

        <form method="POST" action="../Controller/login.php">

            <input type="text" size="25" name="txtemail" placeholder="E-mail" class="email"><br>
            
            <input type="password" size="25" name="txtsenha" size="20" class="senha" placeholder="Senha"><br>
            
            <input type="submit" value="Logar" class="enviar">
     
        </form>
    </body>
</html>