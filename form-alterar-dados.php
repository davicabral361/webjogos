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
?>
<!DOCTYPE html>
<html>
<body>
    <?php
        $sql = "SELECT * FROM jogos";
        $dados = mysqli_query($conexao, $sql);
        if ($dados && mysqli_num_rows($dados) > 0) {
    ?>

    <form action="alterar-jogo.php" method="post">
        <?php
            while ($linha = mysqli_fetch_assoc($dados)) {
                $id = $linha["id"];
                $preco = $linha["preco"];
                $nome = $linha["nome"];
                $genero = $linha["genero"];
                $empresa = $linha["empresa"];
                $ano = $linha["data_de_lancamento"];
                $multi = $linha["multijogador"];
            }    
        ?>
        <input type="hidden" id="id_para_atualizar" name="id_para_atualizar" value="<?php echo $id; ?>">
        <p>
            Preço (R$)
            <input type="number" id="novo_preco" name="novo_preco" class="estiloProjetos" value="<?php echo $preco; ?>">
        </p>
        <p>
            <label for="nome">Nome do Jogo</label>
            <input type="text" id="novo_nome" name="novo_nome" size="80" value="<?php echo $nome; ?>">
        </p>
        <p>
            <label for="genero">Gênero do Jogo</label>
            <select id="novo_genero" name="novo_genero">
                <option value="Terror">Terror</option>
                <option value="Ação">Ação</option>
                <option value="RPG">RPG</option>
                <option value="FPS">FPS</option>
                <option value="Aventura">Aventura</option>
                <option value="Sobrevivência">Sobrevivência</option>
                <option value="Moba">Moba</option>
            </select>
        </p>
        <p>
            <label for="empresa">Empresa</label>
            <input type="text" name="nova_empresa" id="nova_empresa" size="80" value="<?php echo $empresa; ?>">
        </p>
        <p>
            <label for="data_de_lancamento">Data de lançamento</label>
            <input type="date" name="novo_ano" id="novo_ano" required value="<?php echo $ano; ?>">
        </p>
        <p>
            <label for="multi">Multijogador</label>
            <select id="novo_multi" name="novo_multi">
                <option value="Sim">Sim</option>
                <option value="Não">Não</option>
            </select>
        </p>
        <input type="submit" value="Concluir">
    </form>

    <?php
        } else {
            echo "Nenhum registro encontrado.";
        }
        mysqli_close($conexao);
    ?>
</body>
</html>
