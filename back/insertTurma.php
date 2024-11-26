<?php

require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $numero = $_POST['turma'];
  $id_curso = $_POST['id_curso'];
  
  if (!empty($numero) && !empty($id_curso)) {

    try {
    $sql = "INSERT INTO turma (numero, id_curso) VALUES (?, ?)";
    
    // Prepara o statement
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ii", $numero, $id_curso);
    
    // Executa a query
    
    if ($stmt->execute()) {
      echo "<script>alert('Turma criada com sucesso!');
      window.location.href='../front/createBD.php';</script>";
  } else {
      echo "<script>alert('Erro ao criar turma!');
      window.location.href=../front/createBD.php;</script>";
  }
  
} catch (Exception $e) {
  $_SESSION['message'] = "Erro no sistema. Tente novamente.";
  $_SESSION['status'] = "error";
}
}
}