<?php
include "conexao.php";
?>
<!DOCTYPE html>

<html lang="pt-br">

<head>
    <title>Cadastro</title>
    <link href="headerlog.css" rel="stylesheet">
    <link href="cadastro.css" rel="stylesheet">
    <meta charset="utf-8">
</head>

<body>

    <iframe src="headerlog.html"></iframe>

    <h1>Cadastro</h1>

    <?php
        if(isset($_SESSION["error"])){
            print "<script>alert(\"{$_SESSION['error']}\")</script>";
        }

        if(isset($_SESSION["Error_consult"])){
            print "<script>alert(\"{$_SESSION['Error_consult']}\")</script>";
        }
    ?>

    <form method="POST" action="cadastro.php">

        <input type="text" size="25" name="txtnomecompleto" placeholder="Nome Completo" class="nome" required><br>
   
        <input type="text" size="25" name="txtemail" placeholder="E-mail" class="email" required><br>

        <input type="password" size="25" name="txtsenha" class="senha" pattern=".{6,20}" minlenght=6 maxlength="20" size="20" placeholder="Senha de mín:6 e max:20" required><br>

        <select name="procurar" class="estado" required><br>
            <?php
            $resultEstado = "SELECT * FROM estado";
            $resultado = mysqli_query($conexao, $resultEstado);
            while ($row = mysqli_fetch_assoc($resultado)) { ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['nome']; ?></option><?php
            }
            ?>

        <input type="date" size="80" name="txtdatanascimento" class="data" placeholder="Data de Nascimento" required><br>

            <p>
                <input type="submit" value="Cadastrar Usuário" class="cadastrar">
            </p>

    </form>
</body>

</html>