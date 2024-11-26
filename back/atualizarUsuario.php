<?php
session_start();
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_usuario = $_POST['id_usuario'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Atualizar nome e email
    $sql = "UPDATE usuario SET nome = ?, email = ? WHERE id_usuario = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssi", $nome, $email, $id_usuario);
    $stmt->execute();

    // Se a senha foi fornecida, atualizá-la
    if (!empty($senha)) {
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        $sql_senha = "UPDATE usuario SET senha = ? WHERE id_usuario = ?";
        $stmt_senha = $conexao->prepare($sql_senha);
        $stmt_senha->bind_param("si", $senha_hash, $id_usuario);
        $stmt_senha->execute();
        $stmt_senha->close();
    }

    // Atualizar as informações na sessão
    $_SESSION['user_nome'] = $nome;
    $_SESSION['email'] = $email;

    $stmt->close();
    $conexao->close();

    header("Location: ../front/homePage.php");
}