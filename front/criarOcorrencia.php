<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: ../back/logIn.php");
    exit(); 
}

<<<<<<< HEAD
$selectedId = isset($_POST['ocorrencia']) ? $_POST['ocorrencia'] : '';

=======
>>>>>>> b04242288b6d737dafddc7af8f822fb0db4cc72e
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
<<<<<<< HEAD
            background-color: white;
            border-radius: 8px;
            width: 400px;   
            margin-bottom: 60px;
=======
            position: fixed;
            background-color: white;
            border-radius: 8px;
            width: 300px;   
>>>>>>> b04242288b6d737dafddc7af8f822fb0db4cc72e
            top: 120px;
        }
        
        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
<<<<<<< HEAD
            margin-top: 30px;
=======
            margin-top: 10px;
>>>>>>> b04242288b6d737dafddc7af8f822fb0db4cc72e
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            margin-top: 10px;
<<<<<<< HEAD
            border: 2px solid black;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 30px;
=======
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
>>>>>>> b04242288b6d737dafddc7af8f822fb0db4cc72e
        }

        input[type="submit"], button {
            width: 100%;
            padding: 10px;
<<<<<<< HEAD
            height: 40px;
=======
>>>>>>> b04242288b6d737dafddc7af8f822fb0db4cc72e
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

<<<<<<< HEAD
        .botao-voltar {
            position: fixed;
            left: 20px;
            top: 100px;
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

        @media only screen and (max-width: 1280px) {

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
            margin-left: 40px;
            width: 100px;
            align-self: flex-start; 

            } 

            .form-ocorrencia {
            background-color: #fff;
            padding: 40px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            height: 300px;
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
            margin-top: -10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .campo-pesquisa {
            width: 200px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        .campo-pesquisa:focus {
            border-color: #4CAF50;
            outline: none;
        }

        h1 {
            font-size: 30px;
        }

        label {
            display: block;
            margin-top: 0px;
            margin-bottom: 20px;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            margin-top: 10px;
            border: 2px solid black;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 30px;
        }

        input[type="submit"], button {
            width: 100%;
            padding: 10px;
            height: 40px;
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
  
        }

    </style>
</head>

<nav>
    <a href="homePage.php"><img src="assets/loguinho-removebg-preview (1).png" alt="Logo"></a>
</nav>

<a href="homePage.php" class="botao-voltar">Voltar</a>

<div class="form-container">

<h1>Registrar uma ocorrência com descrição e aluno</h1>
    

        <form action="../back/enviarOcorrencia.php" method="post" class="form-ocorrencia">
=======
    </style>
</head>

  <nav>
  <a href="homePage.php"><img src="assets/loguinho-removebg-preview (1).png" alt="Logo"></a>
  </nav>
  
    <div class="form-container">

        <form action="" method="post" class="form-ocorrencia">
>>>>>>> b04242288b6d737dafddc7af8f822fb0db4cc72e
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
<<<<<<< HEAD
                        return aluno.nome.toLowerCase().includes(value.toLowerCase());
=======
                        return aluno.nome
>>>>>>> b04242288b6d737dafddc7af8f822fb0db4cc72e
                    });
                    alunosFiltrados.forEach(function(aluno) {
                        var alunoDiv = document.createElement('div');
                        alunoDiv.textContent = aluno.nome + ' - ' + aluno.turma;
                        alunoDiv.style.cursor = 'pointer';
                        alunoDiv.onclick = function() {
                            document.getElementById('pesquisaAluno').value = aluno.nome + ' - ' + aluno.turma;
<<<<<<< HEAD
                            document.getElementById('pesquisaAluno').name = 'pesquisaAluno';
=======
>>>>>>> b04242288b6d737dafddc7af8f822fb0db4cc72e
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
<<<<<<< HEAD

            <label for="ocorrencia">Ocorrência:</label>
            <select id="ocorrencia" name="ocorrencia" required class="descOcorrência">
                <option value="">Selecione uma ocorrência</option>
                <?php foreach ($ocorrencias as $ocorrencia): ?>
                    <option value="<?php echo $ocorrencia['id_ocorrencia']; ?>" 
                            data-descricao="<?php echo $ocorrencia['descricao']; ?>"
                            data-tipo="<?php echo $ocorrencia['tipo']; ?>" 
                            <?php echo ($selectedId == $ocorrencia['id_ocorrencia']) ? 'selected' : ''; ?>>
=======
            <select id="ocorrencia" name="ocorrencia" required class="descOcorrência" onchange="this.form.submit()">
                <option value="">Selecione uma ocorrência</option>
                <?php foreach ($ocorrencias as $ocorrencia): ?>
                    <option value="<?php echo $ocorrencia['id_ocorrencia']; ?>" data-descricao="<?php echo $ocorrencia['descricao']; ?>" <?php echo (isset($selectedId) && $selectedId == $ocorrencia['id_ocorrencia']) ? 'selected' : ''; ?>>
>>>>>>> b04242288b6d737dafddc7af8f822fb0db4cc72e
                        <?php echo $ocorrencia['descricao']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

<<<<<<< HEAD
            <div id="cartaoOcorrencia" style="display: none; margin-top: 20px; padding: 10px; border-radius: 5px; background-color: #f9f9f9;"></div>

            <script>
            document.getElementById('ocorrencia').addEventListener('change', function() {
                var selectedOption = this.options[this.selectedIndex];
                var cartao = document.getElementById('cartaoOcorrencia');
                
                if (this.value) {
                    var descricao = selectedOption.getAttribute('data-descricao');
                    var tipo = selectedOption.getAttribute('data-tipo');
                    cartao.innerHTML = '<strong>Ocorrência Selecionada:</strong> <span>' + descricao + '</span>';
                    cartao.style.display = 'block';
                    cartao.style.border = '2px solid ' + (tipo === 'Grave' ? 'blue' : 'red');
                } else {
                    cartao.style.display = 'none';
                }
            });
            </script>
=======
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
>>>>>>> b04242288b6d737dafddc7af8f822fb0db4cc72e

            <input type="submit" value="Registrar Ocorrência" class="btn-registrar">
        </form>
    </div>
</body>
</html>