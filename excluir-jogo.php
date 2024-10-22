<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$database = "webjogos";

// Conecta ao banco de dados
$conexao = new mysqli($host, $usuario, $senha, $database);

// Verifica a conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Coleta o ID fornecido pelo formulário
$id_para_excluir = $_POST['id_para_excluir'];

// Prepara a query de exclusão
$query = "DELETE FROM jogos WHERE id = $id_para_excluir";

// Executa a query de exclusão
if ($conexao->query($query) === TRUE) {
    header("Location: index.php");
} else {
    echo "Erro ao excluir registro: " . $conexao->error;
}

// Fecha a conexão
$conexao->close();
?>
