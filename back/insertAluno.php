<?php
session_start();
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $matricula = $_POST['matricula'];
    $id_turma = $_POST['id_turma'];

    if (empty($nome) || empty($matricula) || empty($id_turma)) {
        $_SESSION['message'] = "Por favor, preencha todos os campos!";
        $_SESSION['status'] = "error";
        header("Location: ../front/createBD.php");
        exit();
    }

    $sql = "INSERT INTO aluno (nome, matricula, id_turma) VALUES (?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssi", $nome, $matricula, $id_turma);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Aluno cadastrado com sucesso!";
        $_SESSION['status'] = "success";
    } else {
        $_SESSION['message'] = "Erro ao cadastrar aluno: " . $conexao->error;
        $_SESSION['status'] = "error";
    }

    $stmt->close();
    header("Location: ../front/createBD.php");
    exit();
}