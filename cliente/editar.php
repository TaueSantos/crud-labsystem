<?php
include('../db.php');

// Verifica se o ID foi passado via GET
if (!isset($_GET['id'])) {
    echo "ID do cliente não informado!";
    exit;
}

$id = $_GET['id'];

// Buscar os dados do cliente
$sql = "SELECT * FROM clientes WHERE id = $id";
$resultado = $conn->query($sql);

if ($resultado->num_rows != 1) {
    echo "Cliente não encontrado!";
    exit;
}

$cliente = $resultado->fetch_assoc();

// Atualiza os dados se o formulário for enviado
if (isset($_POST['atualizar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    $sqlUpdate = "UPDATE clientes SET 
                    nome = '$nome',
                    email = '$email',
                    telefone = '$telefone',
                    endereco = '$endereco'
                  WHERE id = $id";

    if ($conn->query($sqlUpdate) === TRUE) {
        echo "<p style='color:green;'>Cliente atualizado com sucesso!</p>";
        echo "<a href='listar.php'>Voltar para a lista</a>";
        exit;
    } else {
        echo "<p style='color:red;'>Erro ao atualizar: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Cliente</title>
    <meta charset="UTF-8">
</head>
<body>
    <h2>Editar Cliente</h2>
    <form method="post">
        Nome: <input type="text" name="nome" value="<?php echo $cliente['nome']; ?>" required><br><br>
        Email: <input type="email" name="email" value="<?php echo $cliente['email']; ?>"><br><br>
        Telefone: <input type="text" name="telefone" value="<?php echo $cliente['telefone']; ?>"><br><br>
        Endereço: <input type="text" name="endereco" value="<?php echo $cliente['endereco']; ?>"><br><br>
        <input type="submit" name="atualizar" value="Atualizar">
    </form>
</body>
</html>
