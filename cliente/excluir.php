<?php
include('../db.php');

// Verifica se o ID foi passado via GET
if (!isset($_GET['id'])) {
    echo "ID não informado!";
    exit;
}

$id = $_GET['id'];

// Verifica se o cliente existe
$sql = "SELECT * FROM clientes WHERE id = $id";
$resultado = $conn->query($sql);

if ($resultado->num_rows != 1) {
    echo "Cliente não encontrado!";
    exit;
}

// Exclui o cliente
$sqlDelete = "DELETE FROM clientes WHERE id = $id";

if ($conn->query($sqlDelete) === TRUE) {
    header("Location: listar.php");
    exit;
} else {
    echo "Erro ao excluir: " . $conn->error;
}
?>
