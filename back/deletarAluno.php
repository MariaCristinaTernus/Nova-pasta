<?php
include_once "connection.php";

// Verifica se foi recebido o parâmetro da matrícula
if(isset($_GET['id_aluno'])) {
    $id = $_GET['id_aluno'];
    
    // Primeiro deleta as ocorrências relacionadas ao aluno
    $sql_ocorrencia = "DELETE FROM ocorrenciaaluno WHERE id_aluno = '$id'";
    $conexao->query($sql_ocorrencia);
    
    // Depois deleta o aluno
    $sql = "DELETE FROM aluno WHERE id_aluno = '$id'";
    
    if($conexao->query($sql) === TRUE) {
        echo "<script>
                alert('Aluno deletado com sucesso!');
                window.location.href = '../front/listagemDeAlunos.php';
              </script>";
    } else {
        echo "<script>
                alert('Erro ao deletar aluno: " . $conexao->error . "');
                window.location.href = '../front/listagemDeAlunos.php';
              </script>";
    }
}
