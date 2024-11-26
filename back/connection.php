<?php
// Configurações de conexão com o banco de dados
$host = "localhost"; // Endereço do servidor MySQL
$usuario = "root"; // Nome de usuário do MySQL
$senha = ''; // Senha do MySQL
$banco = "bancotcc"; // Nome do banco de dados

// Estabelece a conexão com o banco de dados
$conexao = mysqli_connect($host, $usuario, $senha, $banco);

// Verifica se houve erro na conexão
if (mysqli_connect_errno()) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Define o conjunto de caracteres para UTF-8
mysqli_set_charset($conexao, "utf8");

// Função para fechar a conexão com o banco de dados
function fecharConexao($conexao) {
    mysqli_close($conexao);
}
