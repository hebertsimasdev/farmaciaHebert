<<?php
    require 'conexao.php';

    $medicamento = $_POST['medicamento'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $validade = $_POST['validade'];
    $categoria = $_POST['categoria'];
    $id = $_POST['id'];


$sql = $pdo->prepare("UPDATE prod SET produto = :medicamento , quantidade = :quantidade, preco = :preco, validade = :validade, categoria = :categoria WHERE id = $id_Produto");
$sql->bindValue(':medicamento', $medicamento);
    $sql->bindValue(':quantidade', $quantidade);
    $sql->bindValue(':preco', $preco);
    $sql->bindValue(':validade', $validade);
    $sql->bindValue(':categoria', $categoria);



    $sql->execute();

    header("Location:cadastro.php");




    ?>