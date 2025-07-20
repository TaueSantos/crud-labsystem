<?php 
require '../db.php'; // Garante a conexão MySQLi
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="../estilo.css">
</head>
<body>
    <h2>Produtos Cadastrados</h2>

    <?php
    $sql = "SELECT p.id, p.nome AS produto_nome, p.preco, p.descricao, 
                   f.nome_fantasia AS fornecedor_nome 
            FROM produtos p
            LEFT JOIN fornecedores f ON p.fornecedor_id = f.id";

    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        echo "<table border='1' cellpadding='8'>";
        echo "<tr><th>Nome</th><th>Preço</th><th>Descrição</th><th>Fornecedor</th><th>Ações</th></tr>";

        while ($prod = $res->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$prod['produto_nome']}</td>";
            echo "<td>R$ " . number_format($prod['preco'], 2, ',', '.') . "</td>";
            echo "<td>{$prod['descricao']}</td>";
            echo "<td>{$prod['fornecedor_nome']}</td>";
            echo "<td>
            <a href='editar_produto.php?id={$prod['id']}'>Editar</a> |
            <a href='excluir_produto.php?id={$prod['id']}' onclick='return confirm(\"Tem certeza que deseja excluir?\")'>Excluir</a>
        </td>";
        echo "</tr>";
    
            
        }
        echo "</table>";
    } else {
        echo "<p>Nenhum produto cadastrado.</p>";
    }

    $conn->close();
    ?>
</body>
</html>
