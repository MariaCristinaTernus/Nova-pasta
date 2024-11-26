<?php
session_start();
include_once("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $turma_id = $_POST['turma_id'];
    $acao = $_POST['acao'];

    // Verifica se uma turma foi selecionada
    if (empty($turma_id)) {
        echo "<script>
                alert('Por favor, selecione uma turma!');
                window.location.href='../front/getAndDel.php';
              </script>";
        exit();
    }

    switch ($acao) {
        case 'alterar':
            $nova_turma = $_POST['nova_turma'];
            
            // Verifica se o novo número foi fornecido
            if (empty($nova_turma)) {
                echo "<script>
                        alert('Por favor, digite o novo número da turma!');
                        window.location.href='../front/getAndDel.php';
                      </script>";
                exit();
            }
            
            // Atualiza o número da turma
            $sql = "UPDATE turma SET numero = '$nova_turma' WHERE id_turma = $turma_id";
            
            if ($conexao->query($sql) === TRUE) {
                echo "<script>
                        alert('Turma atualizada com sucesso!');
                        window.location.href='../front/getAndDel.php';
                      </script>";
            } else {
                echo "<script>
                        alert('Erro ao atualizar turma: " . $conexao->error . "');
                        window.location.href='../front/getAndDel.php';
                      </script>";
            }
            break;

        case 'deletar':
            // Verifica se existem alunos vinculados à turma
            $verificaAlunos = "SELECT COUNT(*) as total FROM aluno WHERE id_turma = $turma_id";
            $resultVerifica = $conexao->query($verificaAlunos);
            $row = $resultVerifica->fetch_assoc();

            if ($row['total'] > 0) {
                echo "<script>
                        alert('Não é possível excluir esta turma pois existem alunos vinculados a ela!');
                        window.location.href='../front/getAndDel.php';
                      </script>";
                exit();
            }

            // Executa a exclusão da turma
            $sql = "DELETE FROM turma WHERE id_turma = $turma_id";
            
            if ($conexao->query($sql) === TRUE) {
                echo "<script>
                        alert('Turma excluída com sucesso!');
                        window.location.href='../front/getAndDel.php';
                      </script>";
            } else {
                echo "<script>
                        alert('Erro ao excluir turma: " . $conexao->error . "');
                        window.location.href='../front/getAndDel.php';
                      </script>";
            }
            break;

        default:
            echo "<script>
                    alert('Ação inválida!');
                    window.location.href='../front/getAndDel.php';
                  </script>";
            break;
    }
}

$conexao->close();
?>
