<?php
include_once("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $acao = $_POST['acao'];

    // Alterar curso
    if ($acao == "alterar" && isset($_POST['curso_id']) && isset($_POST['novo_curso'])) {
        // Adiciona logs para debug
        error_log("Dados recebidos - ID: " . $_POST['curso_id'] . ", Novo nome: " . $_POST['novo_curso']);
        
        $id = mysqli_real_escape_string($conexao, $_POST['curso_id']);
        $novo_nome = mysqli_real_escape_string($conexao, $_POST['novo_curso']);
        
        error_log("Após escape - ID: " . $id . ", Novo nome: " . $novo_nome);
        
        // Adiciona validação para nome vazio
        if (empty(trim($novo_nome))) {
            echo "<script>
                    alert('O nome do curso não pode ficar em branco!');
                    window.location.href = '../front/getAndDel.php';
                  </script>";
            exit();
        }
        
        $sql = "UPDATE curso SET nome = ? WHERE id_curso = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("si", $novo_nome, $id);
        
        if ($stmt->execute()) {
            echo "<script>
                    alert('Curso alterado com sucesso!');
                    window.location.href = '../front/getAndDel.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Erro ao alterar o curso: " . $stmt->error . "');
                    window.location.href = '../front/getAndDel.php';
                  </script>";
        }
        $stmt->close();
    }
    
    // Deletar curso
    else if ($acao == "deletar" && isset($_POST['curso_id'])) {
        $id = mysqli_real_escape_string($conexao, $_POST['curso_id']);
        
        try {
            $sql = "DELETE FROM curso WHERE id_curso = ?";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("i", $id);
            
            if ($stmt->execute()) {
                echo "<script>
                        alert('Curso deletado com sucesso!');
                        window.location.href = '../front/getAndDel.php';
                      </script>";
            }
            $stmt->close();
        } catch (mysqli_sql_exception $e) {
            if (strpos($e->getMessage(), 'foreign key constraint fails') !== false) {
                echo "<script>
                        alert('Não é possível excluir este curso pois existem turmas vinculadas a ele. Por favor, exclua primeiro as turmas associadas.');
                        history.back();
                        window.location.href = '../front/getAndDel.php';
                      </script>";
                exit();
            } else {
                echo "<script>
                        alert('Erro ao deletar o curso: " . $e->getMessage() . "');
                        history.back();
                        window.location.href = '../front/getAndDel.php';
                      </script>";
                exit();
            }
        }
    }
} 