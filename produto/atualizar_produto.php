<?php
require '../db.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$fornecedor_id = $_POST['fornecedor_id'];

$sql = "UPDATE produtos SET nome = ?, preco = ?, descricao = ?, fornecedor_id = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sdsii", $nome, $preco, $descricao, $fornecedor_id, $id);

if ($stmt->execute()) {
    header("Location: listar_produtos.php");
    exit;
} else {
    echo "Erro ao atualizar produto: " . $stmt->error;
}
