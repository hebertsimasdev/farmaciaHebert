<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionário</title>
</head>

<body>
    <h1>Cadastro de Funcionário</h1>
    <form action="cadastrandoFuncionario.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>


        <label for="endereco">Endereco:</label>
        <input type="text" id="endereco" name="endereco" required><br><br>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <select name="cargo">
            <option value="adm">Administrador</option>
            <option value="funcionario">Funcionário</option>
        </select>  <br><br>

        <label for="senha">SENHA:</label>
        <input type="password" id="senha" name="senha" required><br><br>




        <button type="submit" name="CADASTRAR">CADASTRAR</button>
    </form>

    <?php

    $nome = $_POST["nome"] ?? null;
    $endereco = $_POST["endereco"] ?? null;
    $telefone = $_POST["telefone"] ?? null;
    $email = $_POST["email"] ?? null;
    $cargo = $_POST["cargo"] ?? null;




    if (isset($_POST['CADASTRAR'])) {
        $nome = $_POST["nome"] ?? null;
        $endereco = $_POST["endereco"] ?? null;
        $telefone = $_POST["telefone"] ?? null;
        $email = $_POST["email"] ?? null;
        $cargo = $_POST["cargo"] ?? null;
    }

    ?>
</body>

</html>