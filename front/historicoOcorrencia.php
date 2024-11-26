<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: ../back/logIn.php");
    exit(); 
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Histórico de Ocorrências</title>
    <style>
        body {
<<<<<<< HEAD
            background-color: #333;
=======
            background-color: white;
>>>>>>> b04242288b6d737dafddc7af8f822fb0db4cc72e
            height: 100vh;
            margin: 0;
            padding-top: 80px;
            font-family: Arial, sans-serif;
            overflow: hidden;
        }
        .container {
            
<<<<<<< HEAD
            background-color:gray;
=======
            background-color:aqua;
>>>>>>> b04242288b6d737dafddc7af8f822fb0db4cc72e
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-y: auto; /* Permite rolagem se necessário */
            max-height: 80vh; /* Limita a altura do contêiner */
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
<<<<<<< HEAD
            font-weight: 300;
            color: #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            border: 2px solid black;
            color: black !important;
        }
=======
            padding: 8px;
            text-align: left;
        }
>>>>>>> b04242288b6d737dafddc7af8f822fb0db4cc72e
        th {
            background-color: #f2f2f2;
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
<<<<<<< HEAD

        .botao-voltar {
        align-self: flex-start;
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

=======
>>>>>>> b04242288b6d737dafddc7af8f822fb0db4cc72e
    </style>
</head>
<body>

<nav>
    <a href="homePage.php"><img src="assets/loguinho-removebg-preview (1).png" alt="Logo"></a>
</nav>

<<<<<<< HEAD

<div class="container">
    <a href="homePage.php" class="botao-voltar">Voltar</a>
=======
<div class="container">
>>>>>>> b04242288b6d737dafddc7af8f822fb0db4cc72e
    <h1>Histórico de Ocorrências</h1>
    <table>
        <thead>
            <tr>
                <th>Aluno</th>
                <th>Curso</th>
                <th>Turma</th>
                <th>Ocorrência</th>
                <th>Data</th>
<<<<<<< HEAD
                <th>Tipo</th>
                <th>Ações</th>
=======
                <th>tipo    </th>
>>>>>>> b04242288b6d737dafddc7af8f822fb0db4cc72e
            </tr>
        </thead>
        <tbody>
            <?php
            
            require_once '../back/connection.php';

            if ($conexao->connect_error) {
                die("Conexão falhou: " . $conexao->connect_error);
            }
<<<<<<< HEAD
            $sql = "SELECT oa.id_ocorrenciaaluno, a.nome AS aluno, c.nome AS curso, t.numero AS turma, 
                    o.descricao AS ocorrencia, oa.datahora AS data, o.tipo 
=======
            $sql = "SELECT a.nome AS aluno, c.nome AS curso, t.numero AS turma, o.descricao AS ocorrencia, oa.datahora AS data, o.tipo 
>>>>>>> b04242288b6d737dafddc7af8f822fb0db4cc72e
                    FROM ocorrenciaaluno AS oa
                    JOIN aluno AS a ON oa.id_aluno = a.id_aluno
                    JOIN turma AS t ON a.id_turma = t.id_turma
                    JOIN curso AS c ON t.id_curso = c.id_curso
                    JOIN ocorrencias AS o ON oa.id_ocorrencia = o.id_ocorrencia";
            $result = $conexao->query($sql);

            // Verifica se há resultados e exibe na tabela
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['aluno']}</td>
                            <td>{$row['curso']}</td>
                            <td>{$row['turma']}</td>
                            <td>{$row['ocorrencia']}</td>
                            <td>{$row['data']}</td>
                            <td>{$row['tipo']}</td>
<<<<<<< HEAD
                            <td>
                                <a href='editarOcorrencia.php?id={$row['id_ocorrenciaaluno']}' 
                                   style='background-color: #4CAF50; color: white; border: none; padding: 5px 10px; border-radius: 3px; cursor: pointer; text-decoration: none; display: inline-block; margin-right: 5px;'>
                                   Editar
                                </a>
                                <button onclick=\"if(confirm('Tem certeza que deseja excluir esta ocorrência?')) 
                                window.location.href='../back/deletarOcorrencia.php?id={$row['id_ocorrenciaaluno']}'\" 
                                style='background-color: #ff4444; color: white; border: none; padding: 5px 10px; border-radius: 3px; cursor: pointer;'>
                                Excluir</button>
                            </td>
=======
>>>>>>> b04242288b6d737dafddc7af8f822fb0db4cc72e
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nenhuma ocorrência registrada.</td></tr>";
            }

            // Fecha a conexão
            $conexao->close();
            ?>

        </tbody>
    </table>
</div>

</body>
</html>
