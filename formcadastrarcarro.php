<?php

	$msg[0] = 0;
	$msg[1] = "";

	$fk_idMotorista = "";
	$placa = "";
	$ano= "";
    $modelo= "";
    $cilindradas= "";
    $cor= "";
    $lotacao= "";
    $combustivel= "";

   	if(isset($_POST['fk_idMotorista'])){
    	$fk_idMotorista = $_POST['fk_idMotorista'];
   }
   	if(isset($_POST['placa'])){
    	$placa = $_POST['placa'];
   }
	if(isset($_POST['ano'])){
    	$ano = $_POST['ano'];
   }
   if(isset($_POST['modelo'])){
    $modelo = $_POST['modelo'];
   }
   if(isset($_POST['cilindradas'])){
    $cilindradas = $_POST['cilindradas'];
   }
   if(isset($_POST['cor'])){
    $cor = $_POST['cor'];
   }
   if(isset($_POST['lotacao'])){
    $lotacao = $_POST['lotacao'];
   }
   if(isset($_POST['combustivel'])){
    $combustivel = $_POST['combustivel'];
   }


   	if(isset($_POST['btcadastrar'])){
    	//$msg = cadastrarUsuario($idVeiculo, $fk_idMotorista, $placa, $ano, $modelo, $cilindradas, $cor, $lotacao, $combustivel);
        //echo "Deu certo!"

		$con = mysqli_connect("localhost","userbdembarcanessa","0208", "bdembarcanessa");

		$sql = "INSERT INTO veiculo ( fk_idMotorista, placa, ano, modelo, cilindradas, cor, lotacao, combustivel) VALUES (" .
				$fk_idMotorista . ", " .
				"'" . $placa . "', " .
				"'" . $ano . "', " .
                "'" . $modelo . "', " .
                "'" . $cilindradas . "', " .
                "'" . $cor . "', " .
                 $lotacao . ", " .
				"'" . $combustivel . "');" ;
                
	    $result = mysqli_query($con, $sql);
      

		echo "Veículo cadastrado com sucesso!";
        
   }

 ?>

     <html>
	   <head>


    <style type="text/css">
    .button {
    font: bold 11px Arial;
    text-decoration: none;
    background-color: #EEEEEE;
    color: #333333;
    padding: 2px 6px 2px 6px;
    border-top: 1px solid #CCCCCC;
    border-right: 1px solid #333333;
    border-bottom: 1px solid #333333;
    border-left: 1px solid #CCCCCC;
  }
   </style>

	<body>
		<form action="formcadastrarcarro.php" name="formCadastrarCarro" 
		id="formCadastrarCarro" method="POST" onsubmit="return validaForm(this);">

		<table>
			<tr>
				<td colspan="2"><b><a href="\embarcanessa\visoes\areausuario.php"><<< Voltar</a></b></td>
			</tr>
			<tr>
				<td colspan="2"><h2>Cadastrar Carro  </h2> </td>
			</tr>
			<tr>
				<td colspan="2">  <?php echo $msg[1] ?></td>
			</tr>
			<tr>
				<td><b>fk do Motorista: </b></td>
				<td><input type="text" name="fk_idMotorista" value="<?php echo $fk_idMotorista ?>"> </td>
			</tr>
			<tr>
				<td><b>Placa do carro:</b></td>
				<td> <input type="text" required name="placa"  value="<?php echo $placa ?>"> </td>
			</tr>
			<tr>
				<td><b>Ano do Carro: </b></td>
				<td> <input type="text" required name="ano" value="<?php echo $ano ?>"> </td>
			</tr>
            <tr>
				<td><b>Modelo do Carro: </b></td>
				<td> <input type="text" required name="modelo"  value="<?php echo $modelo ?>"> </td>			
			</tr>
            <tr>
				<td><b>Potência/Cilindradas: </b></td>
				<td> <input type="text"  required name="cilindradas"  value="<?php echo $cilindradas ?>"> </td>			
		    </tr>    
            <tr>
				<td><b>Cor do Carro: </b></td>
				<td> <input type="text" required name="cor"  value="<?php echo $cor ?>"> </td>			
			</tr>
            <tr>
				<td><b>Lotação do Carro: </b></td>
				<td> <input type="number" required name="lotacao"  value="<?php echo $lotacao ?>"> </td>			
			</tr>
            <tr>
				<td><b>Tipo de Combustível: </b></td>
				<td> <input type="text" required name="combustivel" value="<?php echo $combustivel ?>"> </td>			
			</tr>
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
