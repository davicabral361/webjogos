<?php
  // detectar se esta logado
  if(!isset($_SESSION)){
    session_start();
  }
?>

<!DOCTYPE html>
<html lang = "pt-br">
  <!--Cabeçalho-->
  <head>
    <title>Web Jogos</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="estilo.css">
    <style>
      /*Janela ilustrativa e informativa sobre o jogo (Parte onde irá conter as tabelas)*/
      #games{
        font-size:13px; 
        height:210px;
        width:60%;
        float:left;
        background-color: #283e4d;
        text-align:center;
        color: white;
        margin:0;
        padding:40px;
        border:1px;
        border-color:black;
        border-radius: 20px;
        text-align: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
      }
      table{
        text-align: center;
        position: absolute;
        top: 50%;
        left: 48%;
        transform: translate(-50%, -50%);
        border-radius:20px;
        padding:4px;
      }

      th, td{
        border-radius:7px;
      }
    </style>
  </head>  
  <body>
    <!-- Barra de navgeção-->
    <div id = "barra">
      <a href = "login.php"><input type="button" name="login" value="Login" class="login"></a>
      <a href = "criar_jogo.php"><input type = "submit" id = "criar" name = "criar" value = "Criar"></a>
      <div id = "saldo">
        <p>Saldo:</p>
      </div>
      <h1>MAETS</h1>
    </div>
      <hr>
    <!--Mensagem sobre o site danod as boas vindas ao Usuário-->

    <?php
      $usuario = "root";
      $senha =  "";
      $database ="webjogos";
      $host = "localhost";
      $senhacrip = md5($senha);
      //conexão com o mysql
      $conexao = mysqli_connect($host, $usuario, $senha, $database);

      if (!$conexao) {
        header("Location: http://127.0.0.1/webjogos/conexao.php");
      } else {
    ?>

    <div id="mensagem"><p><b>Bem vindo(a) ao nosso site de jogos! Navegue e Procure pelo jogos que mais irá te agradar.</p>
      <p>Para desenvolvedores acesse em 'Criar' e poste o seu Jogo aqui!</p></p>
    </div>
    <div id = "games"> 
      <?php
        $sql = "Select * FROM jogos ORDER BY data_de_lancamento, nome";
        $dados = mysqli_query($conexao, $sql);
        if (mysqli_num_rows($dados) > 0) {
      ?>
      <table border="2">
        <tr><th>Jogo</th><th>Gênero</th><th>Empresa</th><th>Data de lançamento</th><th>Multiplayer</th><th>Preço</tr>
        <?php while($linha = mysqli_fetch_assoc($dados)) { ?>
            <?php $id = $linha["id"]; ?>
            <?php $nome = $linha["nome"]; ?>
            <?php $genero = $linha["genero"]; ?>
            <?php $empresa = $linha["empresa"]; ?>
            <?php $ano = $linha["data_de_lancamento"]; ?>
            <?php $multi = $linha["multijogador"]; ?>
            <?php $preco = $linha["preco"]; ?>
            <?php echo " <tr><td>$nome</td><td>$genero</td><td>$empresa</td><td>$ano</td><td>$multi</td><td>R$ $preco</td>\n"; ?>
            <td><form action="form-alterar-dados.php">
              <input type="submit" value="Alterar">
            </form></td>
            <td><form action="excluir-jogo.php" method="post">
              <input type="hidden" name="id_para_excluir" id="id_para_excluir" value="<?php echo $id; ?>">
              <input type="submit" value="Excluir">
            </form></td></tr>
          <?php } 

          
          mysqli_close($conexao);
        ?>
      </table>
      <?php
        } else {
      ?>
      <h1>Sem dados disponíveis</h1>
      <?php
        }
      ?>
      <form method = "post">
        <a href="criar_jogo.php"><input name="adicionar" id="adicionar" type="button" value = "+Adicionar"></a>
      </form>
    </div>
  </body>
</html> 
<?php
}
?>