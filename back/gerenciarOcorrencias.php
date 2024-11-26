<?php
session_start();
require_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os valores do formulário
    $id_ocorrencia = $_POST['ocorrencia'];
    $nova_descricao = $_POST['novaDescricao'];
    $novo_tipo = $_POST['tipo'];
    
    // Verifica qual botão foi clicado
    if (isset($_POST['acao'])) {
        if ($_POST['acao'] == 'alterar') {
            // Atualiza a ocorrência
            $sql = "UPDATE ocorrencias 
                   SET descricao = ?, tipo = ? 
                   WHERE id_ocorrencia = ?";
            
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("ssi", $nova_descricao, $novo_tipo, $id_ocorrencia);
            
            if ($stmt->execute()) {
                echo "<script>
                        alert('Ocorrência atualizada com sucesso!');
                        window.location.href = '../front/getAndDel.php';
                      </script>";
            } else {
                echo "<script>
                        alert('Erro ao atualizar ocorrência!');
                        window.location.href = '../front/getAndDel.php';
                      </script>";
            }
            
        } elseif ($_POST['acao'] == 'deletar') {
            // Deleta a ocorrência
            $sql = "DELETE FROM ocorrencias WHERE id_ocorrencia = ?";
            
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("i", $id_ocorrencia);
            
            if ($stmt->execute()) {
                echo "<script>
                        alert('Ocorrência deletada com sucesso!');
                        window.location.href = '../front/getAndDel.php';
                      </script>";
            } else {
                echo "<script>
                        alert('Erro ao deletar ocorrência!');
                        window.location.href = '../front/getAndDel.php';
                      </script>";
            }
        }
    }
}

$conexao->close();
?>
