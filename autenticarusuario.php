<?php

$email = $_POST['email'];
$senha = $_POST['senha'];


$con = mysqli_connect('localhost','userbdembarcanessa','0208','bdembarcanessa') or die ('Erro ao conectar');

$sql = "SELECT * FROM usuario_carona WHERE email='$email' AND senha='$senha'";

$result = mysqli_query($con,$sql) or die ("Erro ao tentar verificar os dados");

if(mysqli_num_rows($result) > 0){
  header('Location: areausuario.php');
}else{
  header('Location: login.php');
}

?>









