<?php
	//include '..\controles\manterusuario.php';


	$msg[0] = 0;
	$msg[1] = "";
    
    $fk_idUsuario = "";
	$cnh = "";
	$validade = "";

	if(isset($_POST['fk_idUsuario'])){
    	$fk_idUsuario = $_POST['fk_idUsuario'];
   }
   if(isset($_POST['cnh'])){
    $cnh = $_POST['cnh'];
   }
   if(isset($_POST['validade'])){
	$validade = $_POST['validade'];
   }
   	

   	if(isset($_POST['btcadastrar'])){
    	//$msg = cadastrarMotorista($fk_idUsuario, $cnh, $validade);
        //echo "Deu certo!"

		$con = mysqli_connect("localhost","userbdembarcanessa","0208", "bdembarcanessa");

		$sql = "INSERT INTO motorista (fk_idUsuario,cnh, validade) VALUES (" .
				"'" . $fk_idUsuario . "', " .
                "'" . $cnh . "', " .
				"'" . $validade . "');" ;

	    $result = mysqli_query($con, $sql);

		echo "Motorista cadastrado com sucesso!";

	

   }

 ?>

 <html>
	 <head>
	 
	  </head>
 	</script>

	<body>
		<form action="formcadastrarmotorista.php" name="formCadastrarMotorista" 
		id="formCadastrarMotorista" method="POST" >
    
		<table>
			<tr>
				<td colspan="2"><b><a href="\embarcanessa\index.php"><<< Voltar</a></b></td>
			</tr>
			<tr>
				<td colspan="2"><h2>Cadastrar Motorista</h2> </td>
			</tr>
			<tr>
				<td colspan="2">  <?php echo $msg[1] ?></td>
			</tr>
			<tr>
				<td><b>Id Motorista: </b></td>
				<td> <input type="text" required name="fk_idUsuario" value="<?php echo $fk_idUsuario ?>"> </td>
			</tr>
            <tr>
				<td><b>CNH: </b></td>
				<td> <input type="text" inputmode="number" minlength="11" maxlength="11"
                autocomplete="off"required name="cnh" value="<?php echo $cnh ?>"> </td>
			</tr>
			<tr>
				<td><b>Validade: </b></td>
				<td> <input type="date"  required name="validade"   value="<?php echo $validade ?>"> </td>
			</tr>
			<td>
				<div id="msgemail"></div>
			</td>
			
			<tr>
				<td colspan="2" align="center">
					<?php if($msg[0] != 1){ 
						echo "<input type=\"submit\" name=\"btcadastrar\" value=\"Cadastrar\" >";
					}else{
						echo "<input type=\"submit\" name=\"btcadastrar\" value=\"Cadastrar\" disabled>";
					}
					?>
				</td>
			</tr>
		</table>
		</form>
	</body>
</html>
