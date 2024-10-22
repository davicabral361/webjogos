<?php

$usuario = "root";
$senha =  ""; // Certifique-se de usar senhas seguras e não criptografadas para ambientes de producão
$database ="webjogos";
$host = "localhost";

// Conexão com o MySQL
$conexao = new mysqli($host, $usuario, $senha, $database);

// Verificar se há erros de conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
} else {
    echo "Conexão bem-sucedida"; // Ou qualquer outra lógica que você deseja executar quando a conexão for bem-sucedida
}
