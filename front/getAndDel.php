<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: ../back/logIn.php");
    exit(); 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

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
      
    }
nav {
      background-color: yellow;
      padding: 5px;
      display: flex;
      height: 70px;
      display: flex;
      align-items: center;
    }

    nav img {
      margin-top: 8px;
      height: 50px; 
      margin-left: 25px;
      width: 100px;
      align-self: flex-start; 
    }   

    section {
      display: flex;
      flex-direction: column;
      justify-content: space-around;
      align-items: center;
      height: 90vh;
      margin-top: 10px;
      width: 100%;
    }  

    .cursoTurma {

      display: flex;
      flex-direction: row;
      height: 390px;
      align-items: center;
      justify-content: center;
      width: 100%;
    }

    .alunoOcorrencia {

      display: flex;
      flex-direction: row;
      height: 390px;
      width: 100%;
      align-items: center;
      justify-content: center;
    }

    form {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      margin: 0 30px 0 30px;
      background-color: white;
      border-radius: 10px;
      height: 350px;
      width: 330px;

    }

    form label {
      font-family: Arial, Helvetica, sans-serif;
      align-self: start;
      font-size: 20px;
      color: gray;
      margin-left: 18px;

    }

    form input {

      border: none;
      height: 30px;
      width: 270px;  
      margin: 10px 0 10px 0; 
      border: solid 2px gray;
      border-radius: 5px;
      padding-left: 10px;

    }

    form select {

      border: none;
      height: 34px;
      width: 285px;  
      margin: 10px 0 0 0; 
      border: solid 2px gray;
      border-radius: 5px;
      color: gray;
      padding-left: 5px;

    }

    .titulo-form1, .titulo-form2, .titulo-form3, .titulo-form4, .titulo-form5 {
      font-family: Arial, Helvetica, sans-serif;
    }

    .titulo-form1 {
      margin-top: -50px;
    }

    .titulo-form2 {
      margin-top: -9px;
    }

    .titulo-form3 {
      margin-top: 55px;
    }

    .titulo-form4 { 
      margin-top: 10px;
    }

    .titulo-form5 { 
      margin-top: -200px;
    }

    .botao-alterar {
        width: 120px;
        padding: 10px;
        margin: 5px;
        background-color: #4CAF50; /* verde */
        color: white;
        border: 2px solid black;
        border-radius: 5px;
        cursor: pointer;
    }

    .botao-deletar {
        width: 120px;
        padding: 10px;
        margin: 5px;
        border: 2px solid black;
        background-color: #f44336; /* vermelho */
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }

    .container-botoes {
        display: flex;
        justify-content: center;
        margin-top: 10px;
        margin-bottom: 20px;
        width: 100%;
    }

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

    .listarA {
      text-decoration: none;
      font-size: 20px;
      font-weight: bold;
      color: green;
      font-family: Arial, Helvetica, sans-serif;
    }

    @media only screen and (max-width: 1280px) {
      section {
        height: 300px;
      }

      .cursoTurma {
        margin-top: -20px;
        margin-bottom: 30px;
      }


      form {
        height: 280px;
        width: 264px;
      }

      form label {
        font-size: 16px;  /* Reduzido de 20px */
      }

      form input {
        height: 24px;     /* Reduzido de 30px */
        width: 216px;     /* Reduzido de 270px */
      }

      form select {
        height: 28px;     /* Reduzido de 34px */
        width: 228px;     /* Reduzido de 285px */
      }

      .titulo-form1, .titulo-form2, .titulo-form3, .titulo-form4, .titulo-form5 {
        font-size: 20px;
      }

      .titulo-form1 {
        margin-top: -15px;
        margin-bottom: 25px;
      }

      .botao-alterar, .botao-deletar {
        width: 96px;      /* Reduzido de 120px */
        padding: 8px;     /* Reduzido de 10px */
      }

      .listarA {
        font-size: 16px;  /* Reduzido de 20px */
        margin-bottom: -30px;
      }

      .botao-voltar {
        align-self: flex-start;
        margin-left: 20px;
        height: 20px;
        background-color: white;
        color: black;
        text-decoration: none;
        border-radius: 5px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .botao-voltar:hover {
        background-color: #f0f0f0;
    }




    }

</style>
<body>

  <nav>
  <a href="homePage.php"><img src="assets/loguinho-removebg-preview (1).png" alt="Logo"></a>
  </nav>

  <section>

  <a href="homePage.php" class="botao-voltar">Voltar</a>

    <div class="cursoTurma">
      <form action="../back/gerenciarCurso.php" method="POST">
        <h1 class="titulo-form1">Gerenciar Cursos</h1>
        
        <select name="curso_id" id="selectCurso" onchange="mostrarInput()">
            <option value="">Selecione um curso</option>
            <?php
                include_once("../back/connection.php");
                $sql = "SELECT * FROM curso";
                $result = $conexao->query($sql);
                
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id_curso'] . "'>" . $row['nome'] . "</option>";
                }
            ?>
        </select>

        <input type="text" id="novoCurso" name="novo_curso" placeholder="Digite o novo nome do curso">
        
        <div class="container-botoes">
            <button type="submit" class="botao-alterar" name="acao" value="alterar">Alterar</button>
            <button type="submit" class="botao-deletar" name="acao" value="deletar">Deletar</button>
        </div>
     </form>

     <form action="../back/gerenciarTurma.php" method="POST">
      <h1 class="titulo-form2">Gerenciar Turmas</h1>
        <select name="turma_id" id="selectTurma" required>
            <option value="">Selecione uma turma</option>
            <?php
                include_once("../back/connection.php");
                $sql = "SELECT * FROM turma";
                $result = $conexao->query($sql);
                
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id_turma'] . "'>" . $row['numero'] . "</option>";
                }
            ?>
        </select>
        
        <input type="text" id="novaTurma" name="nova_turma" placeholder="Digite o novo número da turma">
        
        <div class="container-botoes">
<button type="submit" class="botao-alterar" name="acao" value="alterar">Alterar</button>
<button type="submit" class="botao-deletar" name="acao" value="deletar">Deletar</button>
        </div>


     </form>
    </div>

    <div class="alunoOcorrencia">      
      
      <form action="../back/gerenciarOcorrencias.php" method="POST">
        <h1 class="titulo-form4">Gerenciar Ocorrências</h1>

        <select name="ocorrencia" id="ocorrencia" onchange="atualizarDescricao()">
            <option value="">Selecione a Ocorrencia</option>
            <?php
                require_once "../back/connection.php";
                $sql = "SELECT * FROM ocorrencias";
                $result = $conexao->query($sql);
                
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id_ocorrencia'] . "' data-descricao='" . $row['descricao'] . "'>" . $row['descricao'].' - ' . $row['tipo']. "</option>";
                }
            ?>
        </select>

        <input type="text" id="novaDescricao" name="novaDescricao" placeholder="Digite uma nova Descrição">

          <select name="tipo" id="tipo">
            <option value="">Selecione o tipo</option>
            <option value="SIMPLES">Simples</option>
            <option value="GRAVE">Grave</option>
        </select>

        <div class="container-botoes">
            <button type="submit" class="botao-alterar" name="acao" value="alterar">Alterar</button>
            <button type="submit" class="botao-deletar" name="acao" value="deletar">Deletar</button>
        </div>
      </form>

      <form action="#">
      <h1 class="titulo-form5">Gerenciar Alunos</h1>
        <a class="listarA" href="listagemDeAlunos.php">Listar alunos</a>
      </form>
    </div>

    

  </section>
  <script>
function atualizarDescricao() {
    const select = document.getElementById('ocorrencia');
    const input = document.getElementById('novaDescricao');
    const selectedOption = select.options[select.selectedIndex];
    
    if (selectedOption.value !== '') {
        input.value = selectedOption.getAttribute('data-descricao');
    } else {
        input.value = '';
    }
}
</script>
</body>
</html>