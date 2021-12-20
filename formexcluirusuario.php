<?php
	//include '..\controles\manterusuario.php';


	$msg = "";

	$idUsuario = "";
	$nome = "";
	$telefone = "";
	$email = "";
	$endereco = "";
	$login= "";
    $senha= "";

	if(isset($_GET['idUsuario'])){
    	$idUsuario= $_GET['idUsuario'];

		$con = mysqli_connect("localhost","userbdembarcanessa","0208", "bdembarcanessa");
        $sql = "Select * from usuario_carona where idUsuario = " . $idUsuario . ";" ;
	
		$result = mysqli_query($con, $sql);

		//$result = pegarUsuario($idUsuario);

    	$numRegistros = mysqli_num_rows($result);

		if ($numRegistros > 0) {
		    
		    while($row = mysqli_fetch_assoc($result)) {
		    	$idUsuario = $row["idUsuario"];
		    	$nome = $row["nome"];
		    	$telefone = $row["telefone"];
		    	$email = $row["email"];
		    	$endereco= $row["endereco"];
		    	$login = $row["login"];
                $senha = $row["senha"];

		    }

		}

   }

   	if(isset($_POST['btexcluir'])){
		

		
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
	  	if(isset($_POST['endereco'])){
	    	$endereco = $_POST['endereco'];
	   }
		if(isset($_POST['login'])){
	    	$login = $_POST['login'];
	   }
       if(isset($_POST['senha'])){
            $senha = $_POST['senha'];
       }

    	//$msg = excluirUsuarios($idUsuario);

		$con = mysqli_connect("localhost","userbdembarcanessa","0208", "bdembarcanessa");

		$sql = "DELETE FROM bdembarcanessa.usuario_carona WHERE idUsuario=" . $idUsuario . ";" ;

		$result = mysqli_query($con, $sql);

		echo "Dado excluido!";
   }

 ?>

 <html>
	<body>
		<form action="formexcluirusuario.php" name="formExcluirUsuario" 
		id="formExcluirUsuario" method="POST">

		<table>
			<tr>
				<td colspan="2"><b><a href="\embarcanessa\index.php"><<< Voltar</a></b></td>
			</tr>
			<tr>
				<td colspan="2"><h2>Excluir Usuario</h2> </td>
			</tr>
			<tr>
				<td colspan="2">  <?php echo $msg ?></td>
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
				<td><b>Endereço: </b></td>
				<td> <input type="text" name="endereco" value="<?php echo $endereco ?>"> </td>
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
					<input type="submit" name="btexcluir" value="Excluir">
				</td>
			</tr>
		</table>
		</form>
	</body>
</html>
