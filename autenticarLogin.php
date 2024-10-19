<?php
require 'conexao.php';

try {

    // Captura os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Prepara a consulta SQL
    $stmt = $conn->prepare("SELECT * FROM funcionario WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Verifica se o funcionário existe
    $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($funcionario && password_verify($senha, $funcionario['senha'])) {
        // Autenticação bem-sucedida
        session_start();
        $_SESSION['id'] = $funcionario['id'];
        $_SESSION['nome'] = $funcionario['nome'];
        echo "Bem-vindo, " . $funcionario['nome'] . "!";
        // Redirecionar para uma página protegida (ex: dashboard.php)
        // header("Location: dashboard.php");
    } else {
        echo "Email ou senha inválidos.";
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

// Fecha a conexão
$conn = null;
