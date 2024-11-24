<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: ../back/logIn.php");
    exit(); 
}

require_once '../back/connection.php';
$id_usuario = $_SESSION['user_id']; // Supondo que o ID do usuário está armazenado na sessão
$sql = "SELECT * FROM usuario WHERE id_usuario = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();

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

</body>
</html>