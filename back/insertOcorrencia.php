<?php

require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados do formulário
    $descricao = $_POST['ocorrencia'] ?? '';
    $tipo = $_POST['tipo'] ?? '';
    
    try {
        // Prepara e executa a query de inserção
        $sql = "INSERT INTO ocorrencias  (descricao, tipo) VALUES (?, ?)";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ss", $descricao, $tipo);
           
        if ($stmt->execute()) {
          echo "<script>alert('ocorrencia criada com sucesso!');
          window.location.href='../front/createBD.php';</script>";
      } else {
          echo "<script>alert('Erro ao criar ocorrencia!');
          window.location.href=../front/createBD.php;</script>";
      }
        
    } catch (Exception $e) {
        header("Location: ../front/createBD.php");
    }
    
    $stmt->close();
    $conexao->close();
}