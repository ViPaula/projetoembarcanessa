<?php
  
  header("Content-Type: text/html; charset=UTF-8");
  $mysqli = new mysqli('localhost', 'userbdembarcanessa', '0208', 'bdembarcanessa');
  $user = filter_input(INPUT_POST, 'email');
  $sql = "SELECT * FROM `usuario_carona` WHERE `email` = '{$user}'"; 
  $query = $mysqli->query( $sql ); 
  if( $query->num_rows > 0 ) {//se retornar algum resultado
    echo 'já existe!';
  } else {
    echo 'Não existe ainda!';
  }
  ?>