<?php
include('../db.php');

// Verifica se ID foi passado
if (!isset($_GET['id'])) {
    echo "ID não informado!";
    exit;
}

$id = $_GET['id'];

// Confirma se existe
$sql = "SELECT * FROM fornecedores WHERE id = $id";
$resultado = $conn->query($sql);

if ($resultado->num_rows != 1) {
    echo "Fornecedor não encontrado!";
    exit;
}

// Exclui o fornecedor
$sqlDelete = "DELETE FROM fornecedores WHERE id = $id";

if ($conn->query($sqlDelete) === TRUE) {
    header("Location: listar.php");
    exit;
} else {
    echo "Erro ao excluir: " . $conn->error;
}
?>
