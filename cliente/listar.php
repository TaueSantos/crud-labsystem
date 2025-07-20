<?php include('../db.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Clientes</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../estilo.css">
</head>
<body>
    <h2>Clientes Cadastrados</h2>
    <a href="cadastrar.php">+ Novo Cliente</a><br><br>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM clientes";
            $resultado = $conn->query($sql);

            if ($resultado->num_rows > 0) {
                while($cliente = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $cliente["id"] . "</td>";
                    echo "<td>" . $cliente["nome"] . "</td>";
                    echo "<td>" . $cliente["email"] . "</td>";
                    echo "<td>" . $cliente["telefone"] . "</td>";
                    echo "<td>" . $cliente["endereco"] . "</td>";
                    echo "<td>
                            <a href='editar.php?id=" . $cliente["id"] . "'>Editar</a> |
                            <a href='excluir.php?id=" . $cliente["id"] . "' onclick=\"return confirm('Tem certeza que deseja excluir?');\">Excluir</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nenhum cliente encontrado.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
