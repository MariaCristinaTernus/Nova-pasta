<!DOCTYPE html>
<html lang="pt-br">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
  <title>Cadastro de Usuário</title>
=======
  <title>Cadastro</title>
>>>>>>> b04242288b6d737dafddc7af8f822fb0db4cc72e
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

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top: 30px;
    }

    .form {
        height: 300px;
        width: 250px;
        background-color: white;
        border-radius: 10px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .form label {
        text-align: left;
        margin-bottom: 5px;
        font-weight: 400;
        font-size: 13px;
        width: 200px; 
        display: block;
    }
    
    .form input {
        width: 200px;
        height: 20px;
        margin-bottom: 10px;
        border: #D9D9D9 1px solid;
        border-radius: 6px;
    }

    .form button {
        margin-top: 40px;
        margin-bottom: -20px;
        width: 200px;
        padding: 10px;
        background-color: #2C2C2C;
        color: white;
        border: none;
        border-radius: 5px;
    }
  </style>
</head>
<body>
  
  <nav>
  <a href="landingPage.php"><img src="assets/loguinho-removebg-preview (1).png" alt="Logo"></a>
  </nav>

    <div class="form">
        <form action="../back/SignUp.php" method="POST">
            <label for="Nome">Nome</label>
            <input type="text" name="Nome" id="Nome">
            <label for="Email">Email</label>
            <input type="email" name="Email" id="Email">
            <label for="Senha">Senha</label>
            <input type="password" name="Senha" id="Senha">
            <button type="submit">Cadastrar</button>
        </form>
    </div>
  <img class='fundo' src="assets/fundo.jpg" alt="Imagem de fundo">
  
</body>
</html>