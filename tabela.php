

<?php 
require 'conexao.php';

$lista = [];

$sql = $pdo->query("SELECT*FROM produto");
$lista = [];
if ($sql->rowCount()>0) {
$lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tabela</title>
</head>

<body>
    <h1>SISTEMA XPTO</h1>
    <
    <table border="1PX">
        <tr>
            <th>ID</th>
            <th>MEDICAMENTO</th>
            <th>QUANTIDADE</th>
            <th>PREÇO</th>
            <th>VALIDADE</th>
            <th>CATEGORIA</th>


        </tr>   

        <?php foreach($lista as $a): ?>
            <tr>

            <td> <?php echo $a['id']; ?> </td>
            <td> <?php echo $a['medicamento']; ?> </td>
            <td> <?php echo $a['quantidade']; ?> </td>
            <td><?php echo $a['preco']; ?> </td>
            <td><?php echo $a['validade']; ?> </td>
            <td><?php echo $a['categoria']; ?> </td>


            <td>
<a href="editar.php?id=<?=$a['id'];?>">[Editar]</a>
<a href="excluir.php?id=<?=$a['id'];?>">[Excluir]</a>


            </td>

            </tr>

            <?php endforeach; ?>
    </table>

    <a href="cadastro.php">Cadastro Medicamento</a>
</body>

</html>