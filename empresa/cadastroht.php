<?php
include "conexao.php";
?>
<!DOCTYPE html>

<html lang="pt-br">

    <head>
    <title>Cadastro</title>    
    <link href="cadastro.css" rel="stylesheet">
    <meta charset="utf-8">
    </head>
    
    <body>
    
        <form method="POST" action="cadastro.php">
        
        <label for="txtnomecompleto">Nome Completo</label>
        <input type="text" size="25" name="txtnomecompleto" placeholder="Exemplo:Fulano Silva" required><br>

        <label for="txtemail">Email</label><br>
        <input type="text" size="25" name="txtemail" placeholder="exemplo@exemplo.com" required><br>
            
        <label for="txtdatanascimento">Data de Nascimento</label><br>
        <input type="date" size="25" name="txtdatanascimento" required><br>
            
        <label for="txtsenha">Senha</label><br>
        <input type="password" size="25" name="txtsenha" pattern=".{6,20}" minlenght=6 maxlength="20" size="20" placeholder="mín:6 e max:20" required><br>

        <label>Estado</label><br>
        <select name="procurar"><br>
        <option>Selecione</option><br>
        <?php
            $resultEstado = "SELECT * FROM estado";
            $resultado = mysqli_query($conexao,$resultEstado);
            while($row = mysqli_fetch_assoc($resultado)){ ?> 
                <option value="<?php echo $row['id'];?>"><?php echo $row['nome'];?></option><?php
            } 
    ?>
            
        <p>
        <input type="submit" value="Cadastrar Usuário">
        </p>
            
        </form>
    </body>
</html>