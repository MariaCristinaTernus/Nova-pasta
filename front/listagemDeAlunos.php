<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: ../back/logIn.php");
    exit(); 
}

$selectedId = isset($_POST['ocorrencia']) ? $_POST['ocorrencia'] : '';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
    <style>

        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            position: relative;
            background-color: #2C2C2C;
            height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
          }
      
        table {
            border-collapse: collapse;
            width: 100%;
            width: 90%;
            align-self: center;
        }

        th, td {
            border: 2px solid black;
            padding: 8px;
            text-align: left;
            color: white;

        }

        td {
          background-color: white;
          color: black;
          font-size: 20px;
          border: 2px solid gray;
        }
        th {
            background-color: gray ;
        }

        nav {
            background-color: yellow;
            padding: 5px;
            display: flex;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        nav img {
            margin-top: 8px;
            height: 50px; 
            margin-left: 25px;
            width: 100px;
            align-self: flex-start; 
        }
    
        nav a {
            text-decoration: none;
            font-size: 20px;
            margin-right: 30px;
            color: black;
          }

        .tittle {
          color: white;
          align-self: center;
        }

        form {
          margin-top: 40px;
        }

        label {

          font-size: 20px;
          color: white;

        }

        form {
          display: flex;
          flex-direction: column;
          width: 300px;
          align-items: center;
          justify-content: center;
          align-self: center;

        }

        select {
          border: 1px solid black ;
          width: 100px;
          height: 40px;
          text-align: center;
          border-radius: 5px;
          margin: 10px 10px;
          color: gray;
          font-family: Arial, Helvetica, sans-serif;
          font-size: 20px;
          font-weight: bold;
        }

        button {
          border: 1px solid black ;
          width: 100px;
          height: 50px;
          text-align: center;   
          border-radius: 5px;
          margin-bottom: 20px;
          background-color: gray;
          color: white;
          font-family: Arial, Helvetica, sans-serif;
          font-size: 15px;
          font-weight: bold;
        }

        .none {
          align-self: center;
          color: white;
          
        }

        .botao-voltar {
        align-self: flex-start;
        margin-top: 30px;
        margin-left: 20px;
        padding: 8px 20px;
        background-color: white;
        color: black;
        text-decoration: none;
        border-radius: 5px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .botao-voltar:hover {
        background-color: #f0f0f0;
    }

    </style>
</head>
<body>

<nav>
  <a href="homePage.php"><img src="assets/loguinho-removebg-preview (1).png" alt="Logo"></a>
  </nav>

  <a href="getanddel.php" class="botao-voltar">Voltar</a>

    <h2 class="tittle">Listagem de Alunos por Turma</h2>
    
    <form method="POST">
        <label for="turma">Selecione uma Turma:</label>
        <select name="turma" id="turma">
            <?php
            // Usando a conexão existente
            require_once('../back/connection.php');
            
            // Consulta para buscar as turmas
            $sql_turmas = "SELECT id_turma, numero FROM turma";
            $result_turmas = $conexao->query($sql_turmas);
            
            while($turma = $result_turmas->fetch_assoc()) {
                echo "<option value='" . $turma['id_turma'] . "'>" . $turma['numero'] . "</option>";
            }
            ?>
        </select>
        <button type="submit">Buscar Alunos</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['turma'])) {
        $turma_id = $_POST['turma'];
        
        // Consulta modificada para junção direta entre aluno e turma
        $sql_alunos = "SELECT aluno.id_aluno, aluno.nome, aluno.matricula, turma.numero as turma 
                       FROM aluno 
                       JOIN turma ON aluno.id_turma = turma.id_turma 
                       WHERE aluno.id_turma = $turma_id";
        $result_alunos = $conexao->query($sql_alunos);
        
        if ($result_alunos->num_rows > 0) {
            ?>
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Matrícula</th>
                    <th>Turma</th>
                    <th>Ações</th>
                </tr>
                <?php
                while($aluno = $result_alunos->fetch_assoc()) {

                    echo "<tr>";
                    echo "<td>" . $aluno['nome'] . "</td>";
                    echo "<td>" . $aluno['matricula'] . "</td>";
                    echo "<td>" . $aluno['turma'] . "</td>";
                    echo "<td>
                            <a href='editarAluno.php?matricula=" . $aluno['id_aluno'] . "'>
                                <button type='button' style='width: auto; margin: 5px;'>Alterar</button>
                            </a>
                            <a href='../back/deletarAluno.php?id_aluno=" . $aluno['id_aluno'] . "' 
                               onclick='return confirm(\"Tem certeza que deseja excluir este aluno?\");'>
                                <button type='button' style='width: auto; margin: 5px; background-color: #ff4444;'>Deletar</button>
                            </a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </table>
            <?php
        } else {
            echo "<p class='none'>Nenhum aluno encontrado nesta turma.</p>";
        }
    }

    ?>
</body>
</html>