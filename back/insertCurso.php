<?php
session_start();
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $curso = $_POST['curso'];
    
    $sql = "INSERT INTO curso (nome) VALUES (?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $curso);
    
    if ($stmt->execute()) {
        echo "<script>alert('Curso criado com sucesso!');
        window.location.href='../front/createBD.php';</script>";
    } else {
        echo "<script>alert('Erro ao criar curso!');
        window.location.href=../front/createBD.php;</script>";
    }
    
    $stmt->close();
    $conexao->close();
}