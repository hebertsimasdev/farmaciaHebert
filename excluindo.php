<<?php
    require 'conexao.php';

    $medicamento = $_POST['medicamento'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $validade = $_POST['validade'];
    $categoria = $_POST['categoria'];
    $id = $_POST['id'];




    $sql = $pdo->prepare("DELETE from produto WHERE id = :id;");
     $sql->bindValue(':id', $id);




    $sql->execute();

    header("Location:tabela.php");




    ?>