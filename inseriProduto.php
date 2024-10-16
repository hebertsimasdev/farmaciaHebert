<<?php
    require 'conexao.php';

    $medicamento = $_POST['medicamento'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $validade = $_POST['validade'];
    $categoria = $_POST['categoria'];





    $sql = $pdo->prepare("INSERT INTO produto (medicamento,quantidade,preco,validade,categoria) Values (:medicamento, :quantidade, :preco, :validade, :categoria)");
    $sql->bindValue(':medicamento', $medicamento);
    $sql->bindValue(':quantidade', $quantidade);
    $sql->bindValue(':preco', $preco);
    $sql->bindValue(':validade', $validade);
    $sql->bindValue(':categoria', $categoria);

    


    $sql->execute();    

    header("Location: tabela.php");




    ?>