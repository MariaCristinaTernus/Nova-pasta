<?php

require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST['Nome'];
    $email = $_POST['Email'];
    $senha = password_hash($_POST['Senha'], PASSWORD_DEFAULT);

    $stmt = $conexao->prepare("INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $email, $senha);

    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso!";
        header("Location: ../front/login.php");
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    $stmt->close();
}

$conexao->close();
