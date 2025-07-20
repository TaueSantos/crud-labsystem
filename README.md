
<img width="1024" height="1024" alt="capa" src="https://github.com/user-attachments/assets/9811e8f0-f529-499b-b710-f62d3828cfe4" />

# 📦 CRUD Labsystem

Sistema web desenvolvido em **PHP** e **MySQL**, com funcionalidades completas para cadastro, edição e listagem de **clientes**, **fornecedores** e **produtos**. Ideal para aprendizado, portfólio ou uso comercial.

---

## 🚀 Funcionalidades

- 🧑 Cadastro de Clientes (com validação de CPF)
- 🏢 Cadastro de Fornecedores (com validação de CNPJ)
- 📦 Cadastro de Produtos (relacionados ao fornecedor)
- 🔁 Listagem, edição e exclusão de todos os registros
- 🎨 Estilização com CSS
- ✅ Conexão com banco via `db.php`

---

## 🛠️ Tecnologias Utilizadas

- PHP (procedural)
- MySQL + MySQLi
- HTML5 + CSS3
- XAMPP (ambiente local)

---

## 📂 Estrutura de Pastas

crud-labsystem/ ├── cliente/ │ ├── cadastrar.php │ ├── editar.php │ ├── excluir.php │ └── listar.php ├── fornecedor/ │ ├── cadastrar.php │ ├── editar.php │ ├── excluir.php │ └── listar.php ├── produto/ │ ├── cadastrar_produto.php │ ├── editar_produto.php │ ├── excluir_produto.php │ └── listar_produtos.php ├── db.php ├── estilo.css └── index.php


---

## 💻 Como Rodar o Projeto Localmente

1. Clone o repositório:
   ```bash
   git clone https://github.com/TaueSantos/crud-labsystem.git
Mova a pasta para htdocs do XAMPP

Crie o banco de dados no phpMyAdmin com este script:

sql
CREATE DATABASE labsystem;
USE labsystem;

CREATE TABLE clientes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100),
  email VARCHAR(100),
  telefone VARCHAR(20),
  endereco VARCHAR(150),
  cpf VARCHAR(14) UNIQUE
);

CREATE TABLE fornecedores (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome_fantasia VARCHAR(100),
  razao_social VARCHAR(100),
  cnpj VARCHAR(20) UNIQUE,
  email VARCHAR(100),
  telefone VARCHAR(20),
  endereco VARCHAR(150)
);

CREATE TABLE produtos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) UNIQUE,
  preco DECIMAL(10,2),
  descricao TEXT,
  fornecedor_id INT,
  FOREIGN KEY (fornecedor_id) REFERENCES fornecedores(id)
);
Atualize o db.php com suas credenciais de banco

## 💾 Banco de Dados

O repositório inclui um backup em [`lab_crud.sql`](lab_crud.sql), que pode ser importado via **phpMyAdmin** para criar as tabelas e estrutura inicial do projeto.

**Importar no XAMPP:**
1. Acesse `http://localhost/phpmyadmin`
2. Crie um banco com o nome `labsystem` (ou o nome que preferir)
3. Vá na aba “Importar” e selecione o arquivo `lab_crud.sql`
4. Clique em “Executar”

Pronto! O sistema estará pronto para uso local 🎉


Acesse no navegador:

http://localhost/crud-labsystem/
🤝 Autor
Projeto desenvolvido por Tauê Santos.

