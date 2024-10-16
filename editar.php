<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<body>
    <h1>Editar Produto</h1>
    <?php
    require 'conexao.php';
    $id = $_REQUEST["id"];
    $dados = []; // criando variavel vetor
    $sql = $pdo->prepare("SELECT * FROM produto WHERE id = :id");
    $sql->bindValue(":id", $id);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $dados = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location:cadastro.php");
        exit;
    }
    ?>
    <form action="editando.php" method="POST">
        <input type="hidden" name="id" id="id" value="<?= $dados['id']; ?>">

        <label for="medicamento">
            Medicamento <input type="text" name="medicamento" value="<?= $dados['medicamento']; ?>">
        </label>
        <label for="quantidade">
            Quantidade <input type="text" name="quantidade" value="<?= $dados['quantidade']; ?>">
        </label>
        <label for="preco">
            Preço <input type="float" name="preco" value="<?= $dados['preco']; ?>">
        </label>
        <label for="validade">
            Validade <input type="date" name="validade" value="<?= $dados['validade']; ?>">
        </label>
        <label for="categoria">
            Categoria <input type="text" name="categoria" value="<?= $dados['categoria']; ?>">
        </label>

        <button type="submit">Salvar</button>
    </form>
</body>

</html>