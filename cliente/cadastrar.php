<?php include('../db.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Cliente</title>
    <link rel="stylesheet" href="../estilo.css">
</head>

<body>
    <h2>Cadastrar Cliente</h2>
    <form method="post">
        Nome: <input type="text" name="nome" required><br><br>
        CPF: <input type="text" name="cpf" required><br><br>
        Email: <input type="email" name="email" required style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;"><br><br>
        Telefone: <input type="text" name="telefone"><br><br>
        Endereço: <input type="text" name="endereco"><br><br>
        <input type="submit" name="cadastrar" value="Salvar">
    </form>

    <?php
    if (isset($_POST['cadastrar'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
        $cpf = $_POST['cpf'];

        // Verificar duplicidade de CPF
        $check = $conn->prepare("SELECT id FROM clientes WHERE cpf = ?");
        $check->bind_param("s", $cpf);
        $check->execute();
        $res = $check->get_result();

        if ($res->num_rows > 0) {
            echo "<p style='color:red;'>Já existe um cliente com esse CPF.</p>";
        } else {
            // Inserir cliente
            $sql = $conn->prepare("INSERT INTO clientes (nome, email, telefone, endereco, cpf) VALUES (?, ?, ?, ?, ?)");
            $sql->bind_param("sssss", $nome, $email, $telefone, $endereco, $cpf);

            if ($sql->execute()) {
                echo "<p style='color:green;'>Cliente cadastrado com sucesso!</p>";
            } else {
                echo "<p style='color:red;'>Erro: " . $sql->error . "</p>";
            }
        }
    }
    ?>
</body>
</html>
