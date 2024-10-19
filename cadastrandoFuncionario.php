<<?php
    require 'conexao.php';

    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cargo = $_POST['cargo'];
    $senha = $_POST['senha'];



    $sql = $pdo->prepare("INSERT INTO funcionario(nome,endereco,telefone,email,cargo,senha) VALUES (:nome, :endereco, :telefone, :email, :cargo, :senha)");
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':endereco', $endereco);
    $sql->bindValue(':telefone', $telefone);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':cargo', $cargo);
    $sql->bindValue(':senha', $senha);



    $sql->execute();
    header("Location: cadastroFuncionario.php");

    ?>  