<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Se não estiver logado, redireciona para a página de login
    header("Location: ../front/login.php");
    exit();
}

// Se o usuário estiver logado, permite o acesso à página criarOcorrencia.php
// Você pode adicionar mais verificações aqui se necessário, como verificar permissões específicas

// Redireciona para a página criarOcorrencia.php
header("Location: ../front/criarOcorrencia.php");
exit();

// Adiciona uma verificação de erro
if (!headers_sent()) {
    echo "Erro: Não foi possível redirecionar. Por favor, clique <a href='../front/criarOcorrencia.php'>aqui</a> para continuar.";
}