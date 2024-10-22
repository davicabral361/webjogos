<?php
  //pegar os codigos que estão na conexão
  include("conexao.php");

  // verificar se escreveu o e-mail e/ou a senha
  if (isset($_POST["login"]) ||  isset($_POST["senha"])){

    if (strlen($_POST["login"]) == 0 ){

      echo  "insira seu e-mail";
    }else if (strlen($_POST["senha"])  == 0 ){

      echo  "insira sua senha";
    }else{
      // limpar o login e a senha
      $email = $conexao -> real_escape_string($_POST["login"]);

      $senha = $conexao -> real_escape_string($_POST["senha"]);

      $sql_code  = "SELECT * FROM usuario WHERE email = '$email' AND senha='$senha'";

      // mensagem de erro
      $sql_query  = $conexao -> query($sql_code) or die("Erro na execução");

      $quantidade = $sql_query -> num_rows;

      if($quantidade == 1){
        $usuario = $sql_query -> fetch_assoc();
        //digitou certo
        if (!isset($_SESSION)){

          session_start();
        }

        $_SESSION["id"] = $usuario["id"];
        $_SESSION["nome"] = $usuario["nome"];

        header("location: index.php");
      }else{
          // digitou o login  ou  a  senha errado
        echo "E-mail ou senha incorretos, tente novamente.";
      }

    }

  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="login_style.css">
  </head>
  <body>
    <h1>Login</h1>
    <div class="login">
      <form action="" method="post">
        <p>
          Email/username:<br>
          <input type="text" name="login" placeholder="Email/username">
        </p>

        <p>
          Senha:<br>
          <input type="password" name="senha" placeholder="Senha">
        </p>

        <p>
          <input type="submit" value="Login">
        </p>
      </form>
    </div>

  </body>
</html>