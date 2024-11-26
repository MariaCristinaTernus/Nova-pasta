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

    .botao-form-1, .botao-form-2, .botao-form-3, .botao-form-4 {
        width: 200px;
        padding: 10px;
        margin-top: 20px;
        background-color: yellow;
        color: black;
        border: 1px black solid;
        border-radius: 5px;
        cursor: pointer;
    }

    .botao-form-1 {

      margin-bottom: -45px;
    }

    .botao-form-3 {
      margin-bottom: 20px;
    }

    .titulo-form1, .titulo-form2, .titulo-form3, .titulo-form4 {
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

    @media only screen and (max-width: 1280px) {


      section {
        height: 630px;
      }

      form {
        height: 290px;
        margin-top: -20px;
      }

      .titulo-form4 { 
    }

    form input {

      border: none;
      height: 30px;
      width: 270px;  
      margin: 9px 0 9px 0; 
      border: solid 2px gray;
      border-radius: 5px;
      padding-left: 10px;

      }

      .titulo-form3 {
      margin-top: 30px;
    }

    .titulo-form4 {
      margin-bottom: 50px;
    }
    }



</style>
<body>

  <nav>
  <a href="homePage.php"><img src="assets/loguinho-removebg-preview (1).png" alt="Logo"></a>
  </nav>

  <section>

  <a href="homePage.php" class="botao-voltar">Voltar</a>

  <?php
  
  require_once '../back/connection.php';

   $sql = 'SELECT id_curso, nome FROM curso';
   $result = $conexao->query($sql)
   
  ?>

    <div class="cursoTurma">
      <form action="../back/insertCurso.php" method="POST">
        <h1 class="titulo-form1">Criação de Cursos</h1>
        <input type="text" id="curso" name="curso" placeholder="Escreva um curso" required>
        <button type="submit" class="botao-form-1">Criar curso</button>
     </form>

     <form action="../back/insertTurma.php" method="POST">
      <h1 class="titulo-form2">Criação de Turmas</h1>
        <input type="number" id="turma" name="turma" placeholder="Digite o número da turma" required>
        <select name="id_curso" id="cursoOpt">
            <option value="">Selecione um curso</option>
            <?php while($curso = $result->fetch_assoc()): ?>
                <option value="<?php echo $curso['id_curso']; ?>"><?php echo $curso['nome']; ?></option>
            <?php endwhile; ?>
        </select>
        <button type="submit" class="botao-form-2">Criar Turma</button>
     </form>
    </div>

    <div class="alunoOcorrencia">
      
    <form action="../back/insertAluno.php" method="POST">
      <h1 class="titulo-form3">Criação de Alunos </h1>
      <input type="text" className="inpt1" name="nome" id="nome" placeholder="Digite o nome" required>
      <input type="number" className="inpt2" name="matricula" id="matricula" placeholder="Digite a matrícula" required>
      <select name="id_turma" className="inpt3" id="turmaOpt">
        <option value="">Selecione uma turma</option>
        <?php 
        $sql_turma = 'SELECT id_turma, numero FROM turma';
        $result_turma = $conexao->query($sql_turma);
        while($turma = $result_turma->fetch_assoc()): 
        ?>
            <option value="<?php echo $turma['id_turma']; ?>"><?php echo $turma['numero']; ?></option>
        <?php endwhile; ?>
      </select>
      <button type="submit" class="botao-form-3">Criar Aluno</button>
    </form>
      
      
      
      <form action="../back/insertOcorrencia.php" method="POST">
        <h1 class="titulo-form4">Criação de Ocorrências</h1>
        <input type="text" name="ocorrencia" placeholder="Escreva uma ocorrencia" id="ocorrencia" required>

        <select name="tipo" id="tipo" required>
            <option value="">Selecione o tipo</option>
            <option value="SIMPLES">Simples</option>
            <option value="GRAVE">Grave</option>
        </select>

        <button type="submit" class="botao-form-4">Criar ocorrência</button>
      </form>
    </div>

    

  </section>

  <script>
    <?php
    if (isset($_SESSION['message']) && isset($_SESSION['status'])) {
        echo "alert('" . $_SESSION['message'] . "');";
        // Limpa as mensagens da sessão
        unset($_SESSION['message']);
        unset($_SESSION['status']);
    }
    ?>
  </script>
</body>
</html>