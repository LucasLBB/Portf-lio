<?php
require_once "../model/conexao.php";
require_once "obterDados.php";

//Pega o ano atual
$anoAtual = date('Y');
//id do user
$id = $_SESSION['id_user'];
//mês selecionado para a busca
$mesSelecionado = $_POST['mes'];

//Seleciona os valores de acordo com o mês solicitado
$sqlSelect = "SELECT * FROM tbgastos WHERE $id = id_usuario and $mesSelecionado = month(dtSalv) and $anoAtual = year(dtSalv)";

$execSelect = mysqli_query($conexao, $sqlSelect);

//Verifica as linhas contidas na tabela
function retornaLinhas($execSelect,$dadosItem){

    if (mysqli_num_rows($execSelect) > 0) {
        while ($linha = mysqli_fetch_assoc($execSelect)) {

            $dadosItem = $linha['id'];
            $descricao = $linha['descricao'];
            $valor = $linha['valor'];
            $quantidade = $linha['quantidade'];
            $valorTotal = $linha['valorTotal'];
            $dtSalv = $linha['dtSalv'];
?>

            <table>
                <tr>
                    <td><?= $dadosItem ?></td>
                    <td><?= $descricao ?></td>
                    <td><?= $valor ?></td>
                    <td><?= $quantidade ?></td>
                    <td><?= $valorTotal ?></td>
                    <td><?= $dtSalv ?></td>
                    <a href="../controller/excluirItem.php?id=<?php echo $dadosItem ?>">Excluir</a>
                    <a href="alterarItens.php?id=<?php echo $dadosItem ?>">Alterar</a>
                </tr>
            </table>

<?php
        }
    } else {
        echo '<script type="text/javascript">
                alert("Você não possui registros neste mês ou não selecionou um mês!");
                window.history.go(-1);
              </script>';
    }
}

//Faz a soma total dos valores do mês selecionado
$sqlSelectTotal = "SELECT id_usuario, sum(valorTotal) as total, dtSalv FROM tbgastos WHERE $id = id_usuario and $mesSelecionado = month(dtSalv) and $anoAtual = year(dtSalv)";

$execSelectTotal = mysqli_query($conexao, $sqlSelectTotal);

//Enquanto tiver valores execute a impressão deles
while ($tot = mysqli_fetch_array($execSelectTotal)) {
    $total = $tot['total'];
    //Formata o resultado
    $totalFormatado = number_format($total, 2, '.', '');
    echo $totalFormatado;
}
mysqli_close($conexao);

?>