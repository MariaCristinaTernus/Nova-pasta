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
    <title>Criar Ocorrência</title>
    <style>
        body {
            background-image: url('assets/sarinha.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding-top: 80px;
            font-family: Arial, sans-serif;
            overflow: hidden;
            
        }

        .form-container {
            position: fixed;
            background-color: white;
            border-radius: 8px;
            width: 300px;   
            top: 120px;
        }
        
        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            margin-top: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"], button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover, button:hover {
            background-color: #45a049;
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

        .form-ocorrencia {
            background-color: #fff;
            padding: 40px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            height: 400px;
        }
        .btn-registrar {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-bottom: 20px;
        }
        .btn-registrar:hover {
            background-color: #45a049;
        }

        .descOcorrência {
            margin-top: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-bottom: 0px;
        }

        .campo-pesquisa {
            width: 100%;
            padding: 8px;
            margin-top: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        .campo-pesquisa:focus {
            border-color: #4CAF50;
            outline: none;
        }

    </style>
</head>

  <nav>
  <a href="homePage.php"><img src="assets/loguinho-removebg-preview (1).png" alt="Logo"></a>
  </nav>
  
    <div class="form-container">

        <form action="" method="post" class="form-ocorrencia">
            <?php
            require_once '../back/connection.php';
            $alunos = [];
            $sql = "SELECT a.id_aluno, a.nome, t.numero AS turma FROM aluno a JOIN turma t ON a.id_turma = t.id_turma";
            $result = $conexao->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $alunos[] = $row;
                }
            }
            ?>
            <label for="aluno">Aluno:</label>
            <input type="text" id="pesquisaAluno" onkeyup="pesquisarAluno(this.value)" placeholder="Pesquise um aluno..." class="campo-pesquisa">
            <div id="resultado-pesquisa" style="display:none;"></div>
            <script>
            function pesquisarAluno(value) {
                var resultadoPesquisa = document.getElementById('resultado-pesquisa');
                resultadoPesquisa.innerHTML = '';
                if (value.trim() !== '') {
                    var alunosFiltrados = <?php echo json_encode($alunos); ?>.filter(function(aluno) {
                        return aluno.nome
                    });
                    alunosFiltrados.forEach(function(aluno) {
                        var alunoDiv = document.createElement('div');
                        alunoDiv.textContent = aluno.nome + ' - ' + aluno.turma;
                        alunoDiv.style.cursor = 'pointer';
                        alunoDiv.onclick = function() {
                            document.getElementById('pesquisaAluno').value = aluno.nome + ' - ' + aluno.turma;
                            resultadoPesquisa.style.display = 'none';
                        };
                        resultadoPesquisa.appendChild(alunoDiv);
                    });
                    resultadoPesquisa.style.display = 'block';
                } else {
                    resultadoPesquisa.style.display = 'none';
                }
            }
            </script>
            
           
            <?php
  
            $ocorrencias = [];
            $sql = "SELECT id_ocorrencia, descricao, tipo FROM ocorrencias";
            $result = $conexao->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $ocorrencias[] = $row;
                }
            }
            ?>
            <select id="ocorrencia" name="ocorrencia" required class="descOcorrência" onchange="this.form.submit()">
                <option value="">Selecione uma ocorrência</option>
                <?php foreach ($ocorrencias as $ocorrencia): ?>
                    <option value="<?php echo $ocorrencia['id_ocorrencia']; ?>" data-descricao="<?php echo $ocorrencia['descricao']; ?>" <?php echo (isset($selectedId) && $selectedId == $ocorrencia['id_ocorrencia']) ? 'selected' : ''; ?>>
                        <?php echo $ocorrencia['descricao']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ocorrencia'])) {
                $selectedId = $_POST['ocorrencia'];
                $selectedDescricao = '';
                $selectedTipo = '';

                foreach ($ocorrencias as $ocorrencia) {
                    if ($ocorrencia['id_ocorrencia'] == $selectedId) {
                        $selectedDescricao = $ocorrencia['descricao'];
                        $selectedTipo = $ocorrencia['tipo'];
                        break;
                    }
                }
                $borderColor = $selectedTipo == 'simples' ? 'blue' : 'red';
                echo '<div id="cartaoOcorrencia" style="margin-top: 20px; padding: 10px; border: 1px solid ' . $borderColor . '; border-radius: 5px; background-color: #f9f9f9;">';
                echo '<strong>Ocorrência Selecionada:</strong> <span>' . $selectedDescricao . '</span>';
                echo '</div>';
            }
            ?>

            <input type="submit" value="Registrar Ocorrência" class="btn-registrar">
        </form>
    </div>
</body>
</html>