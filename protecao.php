<?php

if(!isset($_SESSION)){
    session_start();
  }
//evitar que a pessoa edite a pagina sem estar logada
  if(!isset($_SESSION['id'])){
    die("Você não  pode acessar esta página sem estar logado. <p> <a href=\"login.php\">Entrar</a></p>");
}
?>