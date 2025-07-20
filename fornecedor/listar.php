<?php include('../db.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Fornecedores</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../estilo.css">
</head>
<body>
    <h2>Fornecedores Cadastrados</h2>
    <a href="cadastrar.php">+ Novo Fornecedor</a><br><br>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome Fantasia</th>
                <th>CNPJ</th>
                <th>Contato</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM fornecedores";
            $resultado = $conn->query($sql);

            if ($resultado->num_rows > 0) {
                while($fornecedor = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fornecedor["id"] . "</td>";
                    echo "<td>" . $fornecedor["nome_fantasia"] . "</td>";
                    echo "<td>" . $fornecedor["cnpj"] . "</td>";
                    echo "<td>" . $fornecedor["contato"] . "</td>";
                    echo "<td>" . $fornecedor["telefone"] . "</td>";
                    echo "<td>
                            <a href='editar.php?id=" . $fornecedor["id"] . "'>Editar</a> |
                            <a href='excluir.php?id=" . $fornecedor["id"] . "' onclick=\"return confirm('Deseja realmente excluir?');\">Excluir</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nenhum fornecedor encontrado.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
