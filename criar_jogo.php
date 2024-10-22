<?php
    // puxar os  codigos da proteção
    include('protecao.php');

    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $database = "webjogos";
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crie seu jogo</title>
    <style>
      body{
        background: linear-gradient(to bottom, #000080, #000000);
        background-repeat: no-repeat;
        background-attachment: fixed;   
        color: white;
      }
      .tab_vend{
        background-color: #283e4d;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border-radius: 20px;
        padding-left: 5px;
        padding: 30px;
      }

      input {
        border-radius: 5px;
      }

      .button {
        border-radius: 5px;
        margin-left: 170px;
      }
    </style>
  </head>
  <body>
    Bem vindo a criação de jogo, <?php echo $_SESSION['nome'];?>
    <br>
    <form action = "inserir-jogo.php" method = "POST" class="tab_vend">
      
      <!-- Tipo de Projeto-->
      <p>
        Preço (R$)
        <input type="number" id="preco" name="preco" class = "estiloProjetos">
      </p>

      <!-- Nome do jogo-->
      <p>
        <label for="nome">Nome do Jogo</label>
       <input type="text" id="nome" name="nome" size="40">
      </p>

      <!-- Genero do jogo-->
      <p><label for="genero">Gênero do Jogo</label>
        <select id  = "genero" name = "genero">
          <option id = "terror" name = "terror" value="Terror">Terror</option>
          <option id = "acao" name = "acao" value="Ação">Ação</option>
          <option id = "rpg" name = "rpg" value="RPG">RPG</option>
          <option id = "fps" name = "fps" value="FPS">FPS</option>
          <option id = "aventura" name = "aventura" value="Aventura">Aventura</option>
          <option id = "sobrevivencia" name = "sobrevivencia" value="Sobrevivência">Sobrevivência</option>
          <option id = "moba" name = "moba" value="Moba">Moba</option>
        </select>
      </p>

      <!-- Nome da empresa -->
      <p>
        <label for="empresa">Empresa</label>
        <input type="text" name="empresa" id="empresa" size="40">
      </p>

      <!-- Data de lançamento -->
      <p>
        <label for="data_de_lancamento">Data de lançamento</label>
        <input type="date" name="data_de_lancamento" id="data_de_lancamento" required>
      </p>

      <!-- Tipo de jogo -->
      <p>
        Multijogador?
        <select id  = "multijogador" name = "multijogador">
          <option id = "sim" name = "sim" value="Sim">Sim</option>
          <option id = "nao" name = "nao" value="Não">Não</option>
        </select>
      </p>

      <input type="submit" class="button" value = "Concluir">
    </form>
    <p aling="">
      <a href="logout.php"><input type="button" name="logout" value="Sair da conta"></a>
    </p>
  </body>
</html>