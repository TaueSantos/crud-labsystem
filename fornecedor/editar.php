<?php
include('../db.php');

// Verifica se ID foi passado
if (!isset($_GET['id'])) {
    echo "ID não informado!";
    exit;
}

$id = $_GET['id'];

// Busca o fornecedor no banco
$sql = "SELECT * FROM fornecedores WHERE id = $id";
$resultado = $conn->query($sql);

if ($resultado->num_rows != 1) {
    echo "Fornecedor não encontrado!";
    exit;
}

$fornecedor = $resultado->fetch_assoc();

// Atualiza se formulário for enviado
if (isset($_POST['atualizar'])) {
    $nome_fantasia = $_POST['nome_fantasia'];
    $cnpj = $_POST['cnpj'];
    $contato = $_POST['contato'];
    $telefone = $_POST['telefone'];

    $sqlUpdate = "UPDATE fornecedores SET 
                    nome_fantasia = '$nome_fantasia',
                    cnpj = '$cnpj',
                    contato = '$contato',
                    telefone = '$telefone'
                  WHERE id = $id";

    if ($conn->query($sqlUpdate) === TRUE) {
        echo "<p style='color:green;'>Fornecedor atualizado com sucesso!</p>";
        echo "<a href='listar.php'>Voltar à lista</a>";
        exit;
    } else {
        echo "<p style='color:red;'>Erro ao atualizar: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Fornecedor</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../estilo.css">
</head>
<body>
    <h2>Editar Fornecedor</h2>
    <form method="post">
        Nome Fantasia: <input type="text" name="nome_fantasia" value="<?php echo $fornecedor['nome_fantasia']; ?>" required><br><br>
        CNPJ: <input type="text" name="cnpj" value="<?php echo $fornecedor['cnpj']; ?>"><br><br>
        Contato: <input type="text" name="contato" value="<?php echo $fornecedor['contato']; ?>"><br><br>
        Telefone: <input type="text" name="telefone" value="<?php echo $fornecedor['telefone']; ?>"><br><br>
        <input type="submit" name="atualizar" value="Atualizar">
    </form>
</body>
</html>
