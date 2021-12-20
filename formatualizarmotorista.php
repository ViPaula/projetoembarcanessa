<?php
	//include '..\controles\manterusuario.php';


	$msg[0] = 0;
	$msg[1] = "";

	$fk_idUsuario = "";
	$cnh = "";
	$validade = "";

	if(isset($_GET['fk_idUsuario'])){
		
    	$fk_idUsuario = $_GET['fk_idUsuario'];

		$con = mysqli_connect("localhost","userbdembarcanessa","0208", "bdembarcanessa");

		$sql = "Select * from motorista where fk_idUsuario = " . $fk_idUsuario . ";" ;

		$result = mysqli_query($con, $sql);

    	$numRegistros = mysqli_num_rows($result);

		if ($numRegistros > 0) {
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result)) {
		    	$fk_idUusuario = $row["fk_idUsuario"];
		    	$cnh = $row["cnh"];
		    	$validade = $row["validade"];

		    }
		}

	}
 
		if(isset($_POST['btatualizar'])){
		 
		 if(isset($_POST['fk_idUsuario'])){
			 $fk_idUsuario = $_POST['fk_idUsuario'];
		 }
 
		 if(isset($_POST['cnh'])){
			 $cnh = $_POST['cnh'];
		}
			if(isset($_POST['validade'])){
			 $validade = $_POST['validade'];
		}
			
		 $con = mysqli_connect("localhost","userbdembarcanessa","0208", "bdembarcanessa");
		 
 
		 $sql = "UPDATE motorista SET " .
		 "fk_idUsuario = '" . $fk_idUsuario . "', " .
		 "cnh = '" . $cnh . "', " .
		 "validade = '" . $validade . "', " .
		 "WHERE fk_idUsuario = " . $fk_idUsuario . ";" ;
 
		 $result = mysqli_query($con, $sql);
		 
		 echo "Dado atualizado!";
	}
 
  ?>
 
  <html>
	 <body>
		 <form action="formatualizarmotorista.php" name="formAtualizarMotorista" 
		 id="formAtualizarMotorista" method="POST">
 
		 <table>
			 <tr>
				 <td colspan="2"><b><a href="/embarcanessa/visoes/formconsultarmotorista.php"><<< Voltar</a></b></td>
			 </tr>
			 <tr>
				 <td colspan="2"><h2>Atualizar Motorista</h2> </td>
			 </tr>
			 <tr>
				 <td colspan="2">  <?php echo $msg[1] ?></td>
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
				 <td><b>Validade: </b></td>
				 <td> <input type="date" name="validade" value="<?php echo $validade ?>"> </td>
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
 
 