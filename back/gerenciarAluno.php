<?php
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['acao'])) {
    // Caso o botão "Alterar" seja clicado
    if ($_POST['acao'] == 'editar') {
        $id_aluno = $_POST['aluno_id'];
        $nome_aluno = $_POST['nome_aluno'];
        $numero_matricula = $_POST['numero_matricula'];
        $turma_id = $_POST['filtro_turma'];

        $sql = "UPDATE aluno SET nome=?, matricula=?, id_turma=? WHERE id_aluno=?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ssii", $nome_aluno, $numero_matricula, $turma_id, $id_aluno);
        
        if ($stmt->execute()) {
            echo "Dados do aluno atualizados com sucesso!";
        } else {
            echo "Erro ao atualizar dados: " . $stmt->error;
        }
    }
    // Caso o botão "Deletar" seja clicado
    else if ($_POST['acao'] == 'deletar') {
        $id_aluno = $_POST['aluno_id'];
        
        $sql = "DELETE FROM aluno WHERE id_aluno=?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $id_aluno);
        
        if ($stmt->execute()) {
            echo "Aluno deletado com sucesso!";
        } else {
            echo "Erro ao deletar aluno: " . $stmt->error;
        }
    }
}

