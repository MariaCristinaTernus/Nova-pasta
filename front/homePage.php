<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: ../back/logIn.php");
    exit(); 
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <style>

    * {
        font-family: 'Inter', sans-serif;
    }
    body {
        margin: 0;
        padding: 0;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        position: relative;
        background-image: url('assets/sarinha.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        height: 100vh;
      
    }

    body::before {
      content: '';
      position: fixed;
      top: 0;
      left: 0;

    }



    .bem-vindo {
      background-color: rgba(255, 255, 255, 0.4 );  
      font-family: Arial, Helvetica, sans-serif;
      position: absolute;
      margin-top: 80px;
      left: 0;
      width: 100%;
      height: 260px;
      color: white;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: space-between; 
      padding-bottom: 20px; 
    }

    .bem-vindo h1 {
        font-size: 100px;
        font-weight: 100;
        font-family: 'Julius Sans One', sans-serif;
        margin-top: 40px;
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
    
    .tituloPrincipal {
      color: white;
      font-size: 100px;
      text-align: left;
      margin-top: 20px;
      font-family: 'Julius Sans One', sans-serif;
      width: 430px;
      line-height: 100px;
      margin-left: 60px;
      margin-top: 60px;

    }

    .leftcard1,.leftcard2, .rightcard1,.rightcard2 {
      padding-top: 20px;
      background-color: aliceblue;
      opacity: 0.3;
      filter: blur(30x);
      width: 945px;
      height: 300px;
    }

    .rightcard1 {
      padding-top: 37px;
      height: 283px;
    }

    .rightcard2 {
      padding-top: 24px;
      height: 296px;
    }

    .leftcard1, .rightcard1 {
      margin-bottom: 3px;
    }

    .leftcard1, .leftcard2 {
      margin-left: -10px;
    }

    footer {
      height: 400px;
      align-self: center;
      gap: 1px;
      width: 99%;
      margin-top: 200px;
      display: flex;
      flex-direction: row;
      justify-content: space-between;
    }

    .imgCard {
      margin: 30px 0 10px 30px;
    }

    .text {
      margin-left: 40px;
      font-size: 30px;
      font-weight: 600;
      font-family: "Julius Sans One", sans-serif;
    }

@media only screen and (max-width: 1366px) {

  body {
    font-size: 16px;
    background-image: url('assets/sarinha.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
  }
  .tituloPrincipal {
    font-size: 70px;
    margin-top: 40px;
  }
  .leftcard1, .leftcard2, .rightcard1, .rightcard2 {
    width: 800px;
    height: 250px;
  }
  .imgCard {
    margin: 20px 0 10px 20px;
  }
  .text {
    font-size: 24px;
  }
  footer {
    height: 350px;
  }
}

@media only screen and (max-width: 1280px) {

  body {
    font-size: 14px;
    background-image: url('assets/sarinha.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
  }

  nav {
    width: 1388px;
  }
  .bem-vindo {
    height: 200px;
    padding-bottom: 10px;
  }
  .bem-vindo h1 {
    font-size: 60px;
  }
  .tituloPrincipal {
    font-size: 70px;
    margin-top: 30px;
    width: 500px;
  }
  .leftcard1, .leftcard2, .rightcard1, .rightcard2 {
    width: 700px;
    height: 220px;
  }

  .leftcard1 {

    height: 237px;
    
  }

  .leftcard2 {
    height: 225px;
  }
  .imgCard {
    margin: 15px 0 10px 15px;
  }
  .text {
    font-size: 20px;
  }
  footer {
    height: 300px;
  }
}

/* Adicione essas regras para telas menores (1024x600) */
@media only screen and (max-width: 1024px) {
  /* Ajuste o tamanho da fonte e do espaçamento */
  body {
    font-size: 12px;
  }
  .bem-vindo {
    height: 180px;
    padding-bottom: 5px;
  }
  .bem-vindo h1 {
    font-size: 40px;
  }
  .tituloPrincipal {
    font-size: 40px;
    margin-top: 20px;
  }
  .leftcard1, .leftcard2, .rightcard1, .rightcard2 {
    width: 600px;
    height: 200px;
  }
  .imgCard {
    margin: 10px 0 10px 10px;
  }
  .text {
    font-size: 16px;
  }
  footer {
    height: 250px;
  }
}
      </style>
</head>
<body>
  
  <nav>
  <a href="homePage.php"><img src="assets/loguinho-removebg-preview (1).png" alt="Logo"></a>
  <a href="configuracaoUser.php"><p><?php echo $_SESSION['user_nome']; ?></p></a>
  </nav>

  <p class="tituloPrincipal">
    JUNTOS POR UM MUNDO MELHOR 
  </p>

  
  <footer>
    <div class="esquerda">
          <div class="leftcard1">
                <a class="imgCard" href="criarOcorrencia.php">
                    <img src="./assets/leftCard.svg" alt="">
                </a>
                <hr>
                <p class="text">Escolha/selecione uma turma por curso <br>e registre a ocorrência diretamente pelo <br>nome do aluno.</p>
          </div>
          <div class="leftcard2">
                <a class="imgCard" href="createBD.php">
                    <img src="./assets/cadastrarTabelas.png" alt="">
                </a>
                <hr>
                <p class="text">Escolha um formulário para preencher <br>e poder criar ocorrências, alunos, turmas <br>e cursos, tudo de forma simples</p>
          </div>
    </div>

    <div class="direita">
            <div class="rightcard1">
                      <a class="imgCard" href="historicoOcorrencia.php">
                          <img src="./assets/rightCard.svg" alt="">
                      </a>
                      <hr>
                      <p class="text">Verifique o histórico de ocorrências <br>já registradas.</p>
            </div>
            <div class="rightcard2">
                <a class="imgCard" href="getanddel.php">
                    <img src="./assets/atualizarOuExcluir.png" alt="">
                </a>
                <hr>
                <p class="text">Faça alteração ou delete alunos, turmas, <br/> cursos e ocorrencias de forma simples</p>
            </div>
    </div>
  </footer>

</body>
</html>
