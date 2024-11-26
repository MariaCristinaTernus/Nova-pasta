<?php
require_once('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_aluno = $_POST['id_aluno'];
    $nome = $_POST['nome'];
    $matricula = $_POST['matricula'];
    $id_turma = $_POST['turma'];
    
    $sql = "UPDATE aluno SET nome = ?, matricula = ?, id_turma = ? WHERE id_aluno = ?";
    
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssii", $nome, $matricula, $id_turma, $id_aluno);
    
    if ($stmt->execute()) {
        header("Location: ../front/listagemDeAlunos.php");
        exit();
    } else {
        echo "Erro ao atualizar o aluno: " . $conexao->error;
    }
} else {
    header("Location: ../front/listagemDeAlunos.php");
    exit();
}
?> 