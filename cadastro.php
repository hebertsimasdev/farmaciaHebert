<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRAR</title>
</head>



<body>
    <div>
        <section class="container">
            <h1 text-align: center;>CADASTRAMENTO DE PRODUTO</h1>
            <br>
            <form action="inseriProduto.php" method="post">
                <h2>MEDICAMENTO <input type="text" name="medicamento"></h2>
                <br>
                <h2>QUANTIDADE<input type="number" name="quantidade"></h2>
                <br>
                <h2>PREÇO<input type="float" name="preco"></h2>
                <br>
                <h2>VALIDADE <input type="date" name="validade"></h2>
                <br>
                <h2>CATEGORIA <input type="text" name="categoria"></h2>




                <button type="submit" class="btn-outline">CADASTRAR</button>
            </form>
        </section>
    </div>
    
    <?php

    $medicamento = $_POST["medicamento"] ?? null;
    $quantidade = $_POST["quantidade"] ?? null;
    $preco = $_POST["preco"] ?? null;
    $validade = $_POST["validade"] ?? null;
    $categoria = $_POST["categoria"] ?? null;




    if (isset($_POST['CADASTRAR'])) {
        $medicamento = $_POST["medicamento"] ?? null;
        $quantidade = $_POST["quantidade"] ?? null;
        $preco = $_POST["preco"] ?? null;
        $validade = $_POST["validade"] ?? null;
        $categoria = $_POST["categoria"] ?? null;
    }

    ?>
    

</body>

</html>