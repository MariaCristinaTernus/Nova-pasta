<?php
session_start();
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extrair o ID do aluno e turma do campo de pesquisa
    $alunoInfo = $_POST['pesquisaAluno']; // Formato: "Nome - Turma"
    $ocorrenciaId = $_POST['ocorrencia'];
    
    // Separar o nome do aluno e a turma
    $partes = explode(' - ', $alunoInfo);
    $nomeAluno = $partes[0];
    
    // Buscar o ID do aluno baseado no nome
    $sqlAluno = "SELECT id_aluno FROM aluno WHERE nome = ?";
    $stmtAluno = $conexao->prepare($sqlAluno);
    $stmtAluno->bind_param("s", $nomeAluno);
    $stmtAluno->execute();
    $resultAluno = $stmtAluno->get_result();
    
    if ($resultAluno->num_rows > 0) {
        $row = $resultAluno->fetch_assoc();
        $alunoId = $row['id_aluno'];
        
        // Definindo o fuso horário para Brasil/São Paulo
        date_default_timezone_set('America/Sao_Paulo');
        $dataOcorrencia = date('Y-m-d H:i:s');
        
        // Inserir na tabela ocorrenciaalunos
        $sqlInserir = "INSERT INTO ocorrenciaaluno (id_aluno, id_ocorrencia, datahora) VALUES (?, ?, ?)";
        $stmtInserir = $conexao->prepare($sqlInserir);
        $stmtInserir->bind_param("iis", $alunoId, $ocorrenciaId, $dataOcorrencia);
        
        if ($stmtInserir->execute()) {
            $_SESSION['mensagem'] = "Ocorrência registrada com sucesso!";
            echo "<script>alert('" . $_SESSION['mensagem'] . "');</script>";
            header("Location: ../front/criarOcorrencia.php");
            exit();
        } else {
            $_SESSION['erro'] = "Erro ao registrar ocorrência: " . $conexao->error;
            echo "<script>alert('" . $_SESSION['erro'] . "');</script>";
            header("Location: ../front/criarOcorrencia.php");
            exit();
        }
    } else {
        $_SESSION['erro'] = "Aluno não encontrado!";
        echo "<script>alert('" . $_SESSION['erro'] . "');</script>";
        header("Location: ../front/criarOcorrencia.php");
        exit();
    }
}

$conexao->close();
?>
