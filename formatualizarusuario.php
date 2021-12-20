<?php
	//include '..\controles\manterusuario.php';


	$msg[0] = 0;
	$msg[1] = "";

	$idUsuario = "";
	$nome = "";
	$telefone = "";
	$email = "";
	$login= "";
    $senha= "";

	if(isset($_GET['idUsuario'])){
		
    	$idUsuario = $_GET['idUsuario'];

		$con = mysqli_connect("localhost","userbdembarcanessa","0208", "bdembarcanessa");

		$sql = "Select * from usuario_carona where idUsuario = " . $idUsuario . ";" ;

		$result = mysqli_query($con, $sql);
        
		
		//$result = pegarUsuario($idUsuario);

    	$numRegistros = mysqli_num_rows($result);

		if ($numRegistros > 0) {
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result)) {
		    	$idUusuario = $row["idUsuario"];
		    	$nome = $row["nome"];
		    	$telefone = $row["telefone"];
		    	$email = $row["email"];
		    	$login = $row["login"];
                $senha = $row["senha"];

		    }

		}

   }

   	if(isset($_POST['btatualizar'])){
		
		if(isset($_POST['idUsuario'])){
	    	$idUsuario = $_POST['idUsuario'];
    	}

		if(isset($_POST['nome'])){
	    	$nome = $_POST['nome'];
	   }
	   	if(isset($_POST['telefone'])){
	    	$telefone = $_POST['telefone'];
	   }
	   	if(isset($_POST['email'])){
	    	$email = $_POST['email'];
	   }
		if(isset($_POST['login'])){
	    	$login = $_POST['login'];
	   }
        if(isset($_POST['senha'])){
        $senha = $_POST['senha'];
       }
    	//$msg = atualizarUsuario($idUsuario, $nome, $telefone, $email, $login, $senha);
		$con = mysqli_connect("localhost","userbdembarcanessa","0208", "bdembarcanessa");
		

		$sql = "UPDATE usuario_carona SET " .
		"nome = '" . $nome . "', " .
		"telefone = '" . $telefone . "', " .
		"email = '" . $email . "', " .
		"login = '" . $login . "', " .
		"senha = '" . $senha . "' " .
		"WHERE idUsuario = " . $idUsuario . ";" ;

		$result = mysqli_query($con, $sql);
        
		echo "Dado atualizado!";
   }

 ?>

 <html>
	<body>
		<form action="formatualizarusuario.php" name="formAtualizarUsuario" 
		id="formAtualizarUsuario" method="POST">

		<table>
			<tr>
				<td colspan="2"><b><a href="areausuario.php"><<< Voltar</a></b></td>
			</tr>
			<tr>
				<td colspan="2"><h2>Atualizar Usuario</h2> </td>
			</tr>
			<tr>
				<td colspan="2">  <?php echo $msg[1] ?></td>
			</tr>
			<tr>
				<td><b>Id Usuario: </b></td>
				<td> <input type="text" name="idUsuario" value="<?php echo $idUsuario ?>" readonly> </td>
			</tr>
			<tr>
				<td><b>Nome: </b></td>
				<td> <input type="text" name="nome" value="<?php echo $nome ?>"> </td>
			</tr>
			<tr>
				<td><b>Telefone: </b></td>
				<td> <input type="text" name="telefone" value="<?php echo $telefone ?>"> </td>
			</tr>
			<tr>
				<td><b>Email: </b></td>
				<td> <input type="text" name="email" value="<?php echo $email ?>"> </td>
			</tr>
			<tr>
				<td><b>Login: </b></td>
				<td> <input type="text" name="login" value="<?php echo $login ?>"> </td>
			</tr>
            <tr>
				<td><b>Senha: </b></td>
				<td> <input type="text" name="senha" value="<?php echo $senha ?>"> </td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="btatualizar" value="Atualizar" >
				</td>
			</tr>
		</table>
		</form>
	</body>
</html>

