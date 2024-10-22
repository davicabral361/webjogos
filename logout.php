<?php
//se estiver logado
if(!isset($_SESSION)){
    session_start();
  }
// deslogar
session_destroy();

header("Location: login.php");
?>