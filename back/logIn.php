<?php
session_start();
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['Email'];
    $senha = $_POST['Senha'];

    $sql = "SELECT id_usuario, nome, senha FROM usuario WHERE email = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($senha, $row['senha'])) {
            $_SESSION['user_id'] = $row['id_usuario'];
            $_SESSION['user_nome'] = $row['nome'];
            $_SESSION['logged_in'] = true; 
            header("Location: ../front/homePage.php");
            exit();
        } else {
            header("Location: ../front/login.php");
            exit();
        }
    } else {
        header("Location: ../front/login.php?erro=email");
        exit();
    }

} else {
    header("Location: ../front/login.php?erro=metodo");
    exit();
}

