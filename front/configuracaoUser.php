<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: ../back/logIn.php");
    exit(); 
}

require_once '../back/connection.php';
<<<<<<< HEAD

// Supondo que o ID do usuário esteja armazenado na sessão
$id_usuario = $_SESSION['user_id'];

// Buscar informações do usuário
$sql = "SELECT nome, email FROM usuario WHERE id_usuario = ?";
=======
$id_usuario = $_SESSION['user_id']; // Supondo que o ID do usuário está armazenado na sessão
$sql = "SELECT * FROM usuario WHERE id_usuario = ?";
>>>>>>> b04242288b6d737dafddc7af8f822fb0db4cc72e
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();
<<<<<<< HEAD
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
=======

// Verifica se o usuário foi encontrado
if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    // Aqui você pode usar os dados do usuário conforme necessário
} else {
    echo "Usuário não encontrado.";
}

$stmt->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>


    body {

        margin: 0;
        height: 100vh;
        width: 100%;
        padding: 0;
        background-color: #2c2c2c;
        display: flex;
        justify-content: center;
        align-items: center;

        }

nav {
        background-color: yellow;
        padding: 5px;
        display: flex;
        height: 70px;
        align-items: center;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
        }

        nav img {
            margin-top: 8px;
            height: 50px;
            margin-left: 25px;
            width: 100px;
            align-self: flex-start; 

            }

            form {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                height: 400px;
                width: 350px;
                background-color: white;
                margin-top: 40px;
                border-radius: 10px;
            }

            form input {
                border: none;
                height: 30px;
                width: 300px;
                margin: 10px 0 10px 0;
                border-radius: 5px;
            }

            form h1 {
                font-family: Arial, Helvetica, sans-serif;
                text-align: center;
            }
            
            

</style>
<body>
    
  <nav>
  <a href="homePage.php"><img src="assets/loguinho-removebg-preview (1).png" alt="Logo"></a>
  </nav>
    <?php

    

    ?>
  <form action="" method="PUT">
    <h1>Editar ou Deletar <br>Usuário</h1>
    <input type="text" placeholder="Nome atual: <?php
    echo $_SESSION['user_nome']
    ?>" id="Nome" name="Nome">
    <input type="email" id="Email" name="Email">
    <input type="password" id="Senha" name="Senha">

    <input class="Alterar" type="submit" value="Alterar">
    <input class="Deletar" type="submit" value="Deletar">
  </form>

>>>>>>> b04242288b6d737dafddc7af8f822fb0db4cc72e
</body>
</html>