<?php
require '../db.php';

if (!isset($_GET['id'])) {
    die("ID do produto não especificado.");
}

$id = $_GET['id'];
$sql = "SELECT * FROM produtos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();

if ($res->num_rows == 0) {
    die("Produto não encontrado.");
}

$produto = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="../estilo.css">
</head>
<body>
    <h2>Editar Produto</h2>
    <form action="atualizar_produto.php" method="post">
        <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
        Nome: <input type="text" name="nome" value="<?php echo $produto['nome']; ?>" required><br><br>
        Preço: <input type="number" name="preco" step="0.01" value="<?php echo $produto['preco']; ?>" required><br><br>
        Descrição: <textarea name="descricao"><?php echo $produto['descricao']; ?></textarea><br><br>
        Fornecedor:
        <select name="fornecedor_id" required>
            <option value="">-- Selecione --</option>
            <?php
            $res_f = $conn->query("SELECT id, nome_fantasia FROM fornecedores");
            while ($f = $res_f->fetch_assoc()) {
                $selected = ($f['id'] == $produto['fornecedor_id']) ? "selected" : "";
                echo "<option value='{$f['id']}' $selected>{$f['nome_fantasia']}</option>";
            }
            ?>
        </select><br><br>
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
