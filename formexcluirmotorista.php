<?php
	//include '..\controles\manterusuario.php';


	$msg = "";

	$fk_idUsuario = "";
	$cnh = "";
	$placaCarro = "";
	$modelo = "";
	$potencia_cilindradas = "";
	$cor= "";
    $lotacao= "";

	if(isset($_GET['fk_idUsuario'])){
    	$fk_idUsuario= $_GET['fk_idUsuario'];

		$con = mysqli_connect("localhost","userbdembarcanessa","0208", "bdembarcanessa");
        $sql = "Select * from motorista where fk_idUsuario = " . $fk_idUsuario . ";" ;
	
		$result = mysqli_query($con, $sql);

		//$result = pegarUsuario($idUsuario);

    	$numRegistros = mysqli_num_rows($result);

		if ($numRegistros > 0) {
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result)) {
		    	$fk_idUsuario = $row["fk_idUsuario"];
		    	$cnh = $row["cnh"];
		    	$placaCarro = $row["placaCarro"];
		    	$modelo = $row["modelo"];
		    	$potencia_cilindradas= $row["potencia_cilindradas"];
		    	$cor = $row["cor"];
                $lotacao = $row["lotacao"];

		    }

		}

   }

   	if(isset($_POST['btexcluir'])){
		

		
		if(isset($_POST['fk_idUsuario'])){
	    	$fk_idUsuario = $_POST['fk_idUsuario'];
    	}

		if(isset($_POST['cnh'])){
	    	$cnh = $_POST['cnh'];
	   }
	   	if(isset($_POST['placaCarro'])){
	    	$placaCarro = $_POST['placaCarro'];
	   }
	   	if(isset($_POST['modelo'])){
	    	$modelo = $_POST['modelo'];
	   }
	  	if(isset($_POST['potencia_cilindradas'])){
	    	$potencia_cilindradas = $_POST['potencia_cilindradas'];
	   }
		if(isset($_POST['cor'])){
	    	$cor = $_POST['cor'];
	   }
       if(isset($_POST['lotacao'])){
            $lotacao = $_POST['lotacao'];
       }

    	//$msg = excluirMotoristas($fk_idUsuario);

		$con = mysqli_connect("localhost","userbdembarcanessa","0208", "bdembarcanessa");

		$sql = "DELETE FROM bdembarcanessa.motorista WHERE fk_idUsuario=" . $fk_idUsuario . ";" ;

		$result = mysqli_query($con, $sql);

		echo "Dado excluido!";
   }

 ?>

 <html>
	<body>
		<form action="formexcluirmotorista.php" name="formExcluirMotorista" 
		id="formExcluirMotorista" method="POST">

		<table>
			<tr>
				<td colspan="2"><b><a href="\embarcanessa\index.php"><<< Voltar</a></b></td>
			</tr>
			<tr>
				<td colspan="2"><h2>Excluir Motorista</h2> </td>
			</tr>
			<tr>
				<td colspan="2">  <?php echo $msg ?></td>
			</tr>
			<tr>
				<td><b>Id Usuario: </b></td>
				<td> <input type="text" name="fk_idUsuario" value="<?php echo $fk_idUsuario ?>" readonly> </td>
			</tr>
			<tr>
				<td><b>CNH: </b></td>
				<td> <input type="text" name="cnh" value="<?php echo $cnh ?>"> </td>
			</tr>
			<tr>
				<td><b>Placa do Carro: </b></td>
				<td> <input type="text" name="placaCarro" value="<?php echo $placaCarro ?>"> </td>
			</tr>
			<tr>
				<td><b>Modelo: </b></td>
				<td> <input type="text" name="modelo" value="<?php echo $modelo ?>"> </td>
			</tr>
			<tr>
				<td><b>Potência em cilindradas: </b></td>
				<td> <input type="text" name="potencia_cilindradas" value="<?php echo $potencia_cilindradas ?>"> </td>
			</tr>
			<tr>
				<td><b>Cor: </b></td>
				<td> <input type="text" name="cor" value="<?php echo $cor ?>"> </td>
			</tr>
            <tr>
				<td><b>Lotação: </b></td>
				<td> <input type="text" name="lotacao" value="<?php echo $lotacao ?>"> </td>
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
