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
    <title>Editar Aluno</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #2C2C2C;
            font-family: Arial, sans-serif;
        }

        nav {
            background-color: yellow;
            padding: 5px;
            display: flex;
            height: 70px;
            align-items: center;
            justify-content: space-between;
        }

        nav img {
            height: 50px;
            margin-left: 25px;
            width: 100px;
        }

        .container {
            width: 80%;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #3c3c3c;
            border-radius: 8px;
        }

        h2 {
            color: white;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            color: white;
            font-size: 18px;
        }

        input, select {
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        button {
            padding: 10px;
            background-color: gray;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        button:hover {
            background-color: #666;
        }
    </style>
</head>
<body>
    <nav>
        <a href="homePage.php"><img src="assets/loguinho-removebg-preview (1).png" alt="Logo"></a>
    </nav>

    <div class="container">
        <h2>Editar Aluno</h2>
        <?php
        require_once('../back/connection.php');

        if (isset($_GET['matricula'])) {
            $id_aluno = $_GET['matricula'];
            
            // Buscar dados do aluno
            $sql = "SELECT aluno.*, turma.numero as turma_numero 
                    FROM aluno 
                    JOIN turma ON aluno.id_turma = turma.id_turma 
                    WHERE aluno.id_aluno = ?";
            
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("i", $id_aluno);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($aluno = $result->fetch_assoc()) {
                ?>
                <form action="../back/atualizarAluno.php" method="POST">
                    <input type="hidden" name="id_aluno" value="<?php echo $aluno['id_aluno']; ?>">
                    
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" value="<?php echo $aluno['nome']; ?>" required>
                    
                    <label for="matricula">Matrícula:</label>
                    <input type="text" name="matricula" id="matricula" value="<?php echo $aluno['matricula']; ?>" required>
                    
                    <label for="turma">Turma:</label>
                    <select name="turma" id="turma">
                        <?php
                        $sql_turmas = "SELECT id_turma, numero FROM turma";
                        $result_turmas = $conexao->query($sql_turmas);
                        
                        while($turma = $result_turmas->fetch_assoc()) {
                            $selected = ($turma['id_turma'] == $aluno['id_turma']) ? 'selected' : '';
                            echo "<option value='" . $turma['id_turma'] . "' $selected>" . $turma['numero'] . "</option>";
                        }
                        ?>
                    </select>
                    
                    <button type="submit">Atualizar Aluno</button>
                </form>
                <?php
            } else {
                echo "<p style='color: white;'>Aluno não encontrado.</p>";
            }
        } else {
            echo "<p style='color: white;'>ID do aluno não fornecido.</p>";
        }
        ?>
    </div>
</body>
</html> 