<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: logIn.php");
    exit();
}

require_once 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM ocorrenciaaluno WHERE id_ocorrenciaaluno = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header("Location: ../front/historicoOcorrencia.php?msg=success");
    } else {
        header("Location: ../front/historicoOcorrencia.php?msg=error");
    }
    
    $stmt->close();
    $conexao->close();
} else {
    header("Location: ../front/historicoOcorrencia.php");
}
?>
