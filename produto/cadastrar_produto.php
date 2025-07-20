<?php
require '../db.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);


// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $preco = $_POST['preco'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $fornecedor_id = $_POST['fornecedor_id'] ?? '';

    // Verifica se nome está preenchido
    if (empty($nome)) {
        die("Erro: O campo nome é obrigatório.");
    }

    // Verifica duplicidade de nome
    $check = $conn->prepare("SELECT id FROM produtos WHERE nome = ?");
    $check->bind_param("s", $nome);
    $check->execute();
    $res = $check->get_result();

    if ($res->num_rows > 0) {
        echo "<p style='color: red; font-weight: bold;'>⚠️ Já existe um produto com esse nome!</p>";
        exit;
    }
    

    // Prepara e executa a query
    $stmt = $conn->prepare("INSERT INTO produtos (nome, preco, descricao, fornecedor_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sdsi", $nome, $preco, $descricao, $fornecedor_id);

    if ($stmt->execute()) {
        header('Location: listar_produtos.php');
        exit;
    } else {
        echo "Erro ao cadastrar produto: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
