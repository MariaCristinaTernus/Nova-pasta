<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: ../back/logIn.php");
    exit(); 
}

require_once '../back/connection.php';

$id_ocorrencia = $_GET['id'];

$sql = "SELECT oa.*, a.matricula AS aluno_matricula, a.nome AS aluno_nome, o.descricao AS ocorrencia_descricao, t.id_turma, t.numero
        FROM ocorrenciaaluno oa 
        JOIN aluno a ON oa.id_aluno = a.id_aluno 
        JOIN ocorrencias o ON oa.id_ocorrencia = o.id_ocorrencia 
        JOIN turma t ON a.id_turma = t.id_turma
        WHERE oa.id_ocorrenciaaluno = ?";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id_ocorrencia);
$stmt->execute();
$result = $stmt->get_result();
$ocorrencia = $result->fetch_assoc();

// Buscar lista de alunos
$sql_alunos = "SELECT id_aluno, nome FROM aluno";
$alunos = $conexao->query($sql_alunos);

// Buscar lista de ocorrências
$sql_ocorrencias = "SELECT id_ocorrencia, descricao FROM ocorrencias";
$ocorrencias = $conexao->query($sql_ocorrencias);

// Adicionar busca de turmas
$sql_turmas = "SELECT id_turma, numero FROM turma";
$turmas = $conexao->query($sql_turmas);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Ocorrência</title>
    <style>
        body {
            background-color: #333;
            font-family: Arial, sans-serif;
            margin: 0;
            padding-top: 80px;
        }
        .container {
            max-width: 600px;
            margin: 60px auto;
            padding: 20px;
            background-color: gray;
            border-radius: 5px;
        }
        h1 {
            text-align: center;
            color: white;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label {
            color: white;
            font-weight: bold;
        }
        select, input {
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        .botoes {
            display: flex;
            gap: 10px;
            justify-content: center;
        }
        .botao {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: white;
        }
        .salvar {
            background-color: #4CAF50;
        }
        .cancelar {
            background-color: #f44336;
        }
        nav {
        background-color: yellow;
        padding: 5px;
        display: flex;
        height: 70px;
        align-items: center;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
        }

    nav img {
            margin-top: 8px;
            height: 50px;
            margin-left: 25px;
            width: 100px;
            align-self: flex-start; 

            }
    </style>
</head>
<body>

<nav>
    <a href="homePage.php"><img src="assets/loguinho-removebg-preview (1).png" alt="Logo"></a>
</nav>
  
    <div class="container">
        <h1>Editar Ocorrência</h1>
        <form action="../back/atualizarOcorrencia.php" method="POST">
            <input type="hidden" name="id_ocorrenciaaluno" value="<?php echo $id_ocorrencia; ?>">
            
            <label for="turma">Turma:</label>
            <input type="text" value="<?php echo $ocorrencia['numero']; ?>" disabled 
                   style="background-color: #f0f0f0;">

            <label for="aluno">Nome do Aluno:</label>
            <input type="text" value="<?php echo $ocorrencia['aluno_nome']; ?>" disabled 
                   style="background-color: #f0f0f0;">

            <label for="ocorrencia">Ocorrência:</label>
            <select name="id_ocorrencia" id="ocorrencia" required>
                <?php while($oc = $ocorrencias->fetch_assoc()): ?>
                    <option value="<?php echo $oc['id_ocorrencia']; ?>"
                            <?php if($oc['id_ocorrencia'] == $ocorrencia['id_ocorrencia']) echo 'selected'; ?>>
                        <?php echo $oc['descricao']; ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <div class="botoes">
                <button type="submit" class="botao salvar">Salvar</button>
                <a href="historicoOcorrencia.php" class="botao cancelar" style="text-decoration: none;">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html> 