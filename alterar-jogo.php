<?php
$usuario = "root";
$senha =  ""; // Certifique-se de usar senhas seguras e não criptografadas para ambientes de produção
$database ="webjogos";
$host = "localhost";

// Conexão com o MySQL
$conexao = new mysqli($host, $usuario, $senha, $database);

// Verificar se há erros de conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_para_atualizar = $_POST['id_para_atualizar'];
    $novo_nome = $_POST['novo_nome'];
    $novo_genero = $_POST['novo_genero'];
    $nova_empresa = $_POST['nova_empresa'];
    $novo_ano = $_POST['novo_ano'];
    $novo_multi = $_POST['novo_multi'];
    $novo_preco = $_POST['novo_preco'];

    // Query de atualização
    $query = "UPDATE jogos SET 
              preco = '$novo_preco',
              nome = '$novo_nome',
              genero = '$novo_genero',
              empresa = '$nova_empresa',
              data_de_lancamento = '$novo_ano',
              multijogador = '$novo_multi'
              WHERE id = $id_para_atualizar";

    // Executa a query de atualização
    if ($conexao->query($query) === TRUE) {
        header("Location: index.php"); // Redireciona de volta para a página após a atualização
    } else {
        echo "Erro ao atualizar registro: " . $conexao->error;
    }
}

// Fecha a conexão
$conexao->close();
?>
