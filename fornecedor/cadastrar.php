<?php include('../db.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Fornecedor</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../estilo.css">
</head>
<body>
    <h2>Cadastrar Fornecedor</h2>
    <form method="post">
        Nome Fantasia: <input type="text" name="nome_fantasia" required><br><br>
        CNPJ: <input type="text" name="cnpj" required><br><br>
        Email: <input type="email" name="email" required style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;"><br><br>        
        Telefone: <input type="text" name="telefone"><br><br>
        Endereço: <input type="text" name="endereco"><br><br>
        <input type="submit" name="cadastrar" value="Salvar">
    </form>

    <?php
    if (isset($_POST['cadastrar'])) {
        $nome_fantasia = $_POST['nome_fantasia'] ?? '';
        $cnpj = $_POST['cnpj'] ?? '';
        $email = $_POST['email'] ?? '';
        $telefone = $_POST['telefone'] ?? '';
        $endereco = $_POST['endereco'] ?? '';

        // Verificar duplicidade de CNPJ
        $check = $conn->prepare("SELECT id FROM fornecedores WHERE cnpj = ?");
        $check->bind_param("s", $cnpj);
        $check->execute();
        $res = $check->get_result();

        if ($res->num_rows > 0) {
            echo "<p style='color:red;'>Já existe um fornecedor com esse CNPJ.</p>";
        } else {
            $sql = $conn->prepare("INSERT INTO fornecedores (nome_fantasia, cnpj, email, telefone, endereco) VALUES (?, ?, ?, ?, ?)");
            $sql->bind_param("sssss", $nome_fantasia,  $cnpj, $email, $telefone, $endereco);

            if ($sql->execute()) {
                echo "<p style='color:green;'>Fornecedor cadastrado com sucesso!</p>";
            } else {
                echo "<p style='color:red;'>Erro: " . $sql->error . "</p>";
            }
        }
    }
    ?>
</body>
</html>
