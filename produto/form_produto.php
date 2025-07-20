<?php 
require '../db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" href="../estilo.css">
</head>
<body>
    <h2>Cadastro de Produto</h2>
    <form action="cadastrar_produto.php" method="post">
        Nome: <input type="text" name="nome" required><br><br>
        Preço: <input type="number" name="preco" step="0.01" required><br><br>
        Descrição:<br>
        <textarea name="descricao" rows="5" cols="50" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;"></textarea><br><br>

        Fornecedor:
        <select name="fornecedor_id" required>
            <option value="">-- Selecione --</option>
            <?php
            $sql = "SELECT id, nome_fantasia FROM fornecedores";
            $res = $conn->query($sql);
            while ($f = $res->fetch_assoc()) {
                echo "<option value='{$f['id']}'>{$f['nome_fantasia']}</option>";
            }
            ?>
        </select><br><br>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
