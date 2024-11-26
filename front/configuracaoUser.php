<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: ../back/logIn.php");
    exit(); 
}

require_once '../back/connection.php';

// Supondo que o ID do usuário esteja armazenado na sessão
$id_usuario = $_SESSION['user_id'];

// Buscar informações do usuário
$sql = "SELECT nome, email FROM usuario WHERE id_usuario = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações do Usuário</title>
    <style>
        body {
            background-color: #333;
            font-family: Arial, sans-serif;
            margin: 0;
            padding-top: 80px;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: gray;
            border-radius: 5px;
        }
        h1 {
            text-align: center;
            color: white;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label {
            color: white;
            font-weight: bold;
        }
        input {
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        .botoes {
            display: flex;
            gap: 10px;
            justify-content: center;
        }
        .botao {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: white;
        }
        .salvar {
            background-color: #4CAF50;
        }
        .cancelar {
            background-color: #f44336;
        }

        .botao-voltar {
        align-self: flex-start;
        margin-left: 20px;
        padding: 8px 20px;
        background-color: white;
        color: black;
        text-decoration: none;
        border-radius: 5px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .botao-voltar:hover {
        background-color: #f0f0f0;
    }
    </style>
</head>
<body>

<a href="homePage.php" class="botao-voltar">Voltar</a>

<div class="container">
    <h1>Configurações do Usuário</h1>
    <form action="../back/atualizarUsuario.php" method="POST">
        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $usuario['nome']; ?>" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $usuario['email']; ?>" required>

        <label for="senha">Nova Senha:</label>
        <input type="password" name="senha" placeholder="Digite uma nova senha (deixe em branco para não alterar)">

        <div class="botoes">
            <button type="submit" class="botao salvar">Salvar</button>
            <a href="homePage.php" class="botao cancelar" style="text-decoration: none;">Cancelar</a>
        </div>
    </form>

    <!-- Formulário para Sair -->
    <form action="../back/logout.php" method="POST" style="margin-top: 20px;">
        <button type="submit" class="botao cancelar" style="background-color: #f44336;">Sair</button>
    </form>
</div>
</body>
</html>