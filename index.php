<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CRUD Labsystem</title>
    <link rel="stylesheet" href="estilo.css">
    <style>
        .menu {
            max-width: 400px;
            margin: auto;
            text-align: center;
        }

        .menu a {
            display: block;
            background-color: #007bff;
            color: white;
            padding: 12px;
            margin: 10px 0;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }

        .menu a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Bem-vindo ao Sistema Labsystem</h2>
    <div class="menu">
        <a href="cliente/form_cliente.php">Cadastrar Cliente</a>
        <a href="cliente/listar_clientes.php">Listar Clientes</a>

        <a href="fornecedor/form_fornecedor.php">Cadastrar Fornecedor</a>
        <a href="fornecedor/listar_fornecedores.php">Listar Fornecedores</a>

        <a href="produto/form_produto.php">Cadastrar Produto</a>
        <a href="produto/listar_produtos.php">Listar Produtos</a>
    </div>
</body>
</html>
