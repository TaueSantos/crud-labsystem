<?php
require '../db.php';

if (!isset($_GET['id'])) {
    die("ID não especificado.");
}

$id = $_GET['id'];
$sql = "DELETE FROM produtos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: listar_produtos.php");
    exit;
} else {
    echo "Erro ao excluir produto: " . $stmt->error;
}
