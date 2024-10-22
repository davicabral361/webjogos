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

        // Coleta os dados do formulário
        $preco = $_POST['preco'];
        $nome = $_POST['nome'];
        $genero = $_POST['genero'];
        $empresa = $_POST['empresa'];
        $ano = $_POST['data_de_lancamento'];
        $multi = $_POST['multijogador'];

        // Prepara a query de inserção
        $query = "INSERT INTO jogos (preco, nome, genero, empresa, data_de_lancamento, multijogador) 
        VALUES ('$preco', '$nome', '$genero', '$empresa', '$ano', '$multi')";

        // Executa a query de inserção
        if ($conexao->query($query) === TRUE) {
          header("Location: index.php");
        } else {
          echo "Erro: " . $query . "<br>" . $conexao->error;
        }

        // Fecha a conexão
        $conexao->close();
?>        