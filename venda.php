<?php
session_start();
require 'conexao.php';

// Função para vender medicamento
function venderMedicamento($conn) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['vender'])) {
        $id = $_POST['id'];
        $quantidadeVendida = $_POST['quantidadeVendida'];

        $stmt = $conn->prepare("SELECT quantidade FROM produto WHERE id= :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $medicamento = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($medicamento && $medicamento['quantidade'] >= $quantidadeVendida) {
            $novaQuantidade = $medicamento['quantidade'] - $quantidadeVendida;
            $stmt = $conn->prepare("UPDATE produto SET quantidade = :novaQuantidade WHERE id = :id");
            $stmt->bindParam(':novaQuantidade', $novaQuantidade);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            echo "<script>alert('Venda realizada com sucesso!');</script>";
        } else {
            echo "<script>alert('Estoque insuficiente para realizar a venda!');</script>";
        }
    }
}

// Chamar a função para processar a venda
venderMedicamento($pdo);

// Buscar medicamentos disponíveis para venda
$stmt = $pdo->prepare("SELECT id, medicamento, quantidade FROM produto");
$stmt->execute();
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venda de Medicamentos</title>
    <link rel="stylesheet" href="style.css"> <!-- Estilo opcional -->
</head>
<body>
    <h1>Venda de Medicamentos</h1>
    <form method="post" action="">
        <label for="medicamento">Selecione o Medicamento:</label>
        <select name="id" id="medicamento" required>
            <option value="">Escolha um medicamento</option>
            <?php foreach ($produtos as $produto): ?>
                <option value="<?= $produto['id'] ?>"><?= $produto['nome'] ?> (Disponível: <?= $produto['quantidade'] ?>)</option>
            <?php endforeach; ?>
        </select>

        <label for="quantidadeVendida">Quantidade a Vender:</label>
        <input type="number" name="quantidadeVendida" id="quantidadeVendida" min="1" required>

        <button type="submit" name="vender">Vender</button>
    </form>
</body>
</html>
