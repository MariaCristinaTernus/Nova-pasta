<!DOCTYPE html>
<html lang="pt-br">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>landingPage</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      position: relative;
    }

    body::before {
      content: '';
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.6); 
      z-index: -1;
    }

    .fundo {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: -2;
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
      justify-content: space-between; /* Alterado de flex-direction: space-around; */
      padding-bottom: 20px; /* Adicionado para dar espaço na parte inferior */
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
    }

    nav img {

      margin-top: 8px;
      height: 50px;
      margin-left: 25px;
      width: 100px;
      align-self: flex-start; 

    }

    .logs {
        display: flex;
        justify-content: center; 
        height: auto;
        margin-top: -20px;
        gap: 450px;
    }

    .logs img {
      height: 60px;
      width: auto; 

    }

    footer {
    height: 53px;
    background-color: yellow;
    margin-top: auto; 
  }

    
  </style>
</head>
<body>
  
  <nav>
  <a href="landingPage.php"><img src="assets/loguinho-removebg-preview (1).png" alt="Logo"></a>
  </nav>

  <div class="bem-vindo">
    <h1>SEJA BEM VINDO!</h1>

    <div class="logs">
        <a href="cadastrar.php"><img src="assets/cadastrar.svg" alt=""></a>
        <a href="login.php"><img src="assets/logar.svg" alt=""></a>
    </div>

    </div>
  
  <img class='fundo' src="assets/fundo.jpg" alt="Imagem de fundo">
  
  <footer>

  </footer>
</body>
</html>