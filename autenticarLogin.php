<?php
require 'conexao.php';

try {
    // Verifica se os dados do formulário foram enviados
    if (isset($_POST['email']) && isset($_POST['senha'])) {
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
            // Redirecionar para uma página protegida
            // header("Location: dashboard.php");
            // exit;
        } else {
            echo "Email ou senha inválidos.";
        }
    } else {
        echo "Por favor, preencha o formulário.";
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

// Fecha a conexão
$conn = null;
?>
