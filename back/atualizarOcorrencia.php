<?php
session_start();
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_ocorrenciaaluno = $_POST['id_ocorrenciaaluno'];
    $id_ocorrencia = $_POST['id_ocorrencia'];

    $sql = "UPDATE ocorrenciaaluno 
            SET id_ocorrencia = ? 
            WHERE id_ocorrenciaaluno = ?";
    
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ii", $id_ocorrencia, $id_ocorrenciaaluno);
    
    if ($stmt->execute()) {
        header("Location: ../front/historicoOcorrencia.php");
    } else {
        echo "Erro ao atualizar a ocorrência: " . $conexao->error;
    }
    
    $stmt->close();
    $conexao->close();
}
?> 