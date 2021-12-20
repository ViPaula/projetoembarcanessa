<?php
	//include '..\controles\manterusuario.php';


	$msg[0] = 0;
	$msg[1] = "";
    
	$fk_idMotorista = "";
	$logradouroEmbarque = "";
	$bairroEmbarque = "";
	$municipioEmbarque = "";
	$estadoEmbarque = "";
	$logradouroDesembarque = "";
	$bairroDesembarque = "";
	$estadoDesembarque = "";
	$municipioDesembarque = "";
	$dataEmbarque = "";
	$horaEmbarque = "";
	$vagas = "";
	$observacaoEmbarque = "";
	$dataCancelamento = "";
	$horaCancelamento = "";
	$fk_idVeiculo = "";


   if(isset($_POST['fk_idMotorista'])){
	$fk_idMotorista = $_POST['fk_idMotorista'];
   }
	if(isset($_POST['logradouroEmbarque'])){
    	$logradouroEmbarque = $_POST['logradouroEmbarque'];
   }
    if(isset($_POST['bairroEmbarque'])){
	$bairroEmbarque = $_POST['bairroEmbarque'];
   }
   if(isset($_POST['municipioEmbarque'])){
	$municipioEmbarque = $_POST['municipioEmbarque'];
   }
   if(isset($_POST['estadoEmbarque'])){
	$estadoEmbarque = $_POST['estadoEmbarque'];
   }
   	if(isset($_POST['logradouroDesembarque'])){
    $logradouroDesembarque = $_POST['logradouroDesembarque'];
   }
   if(isset($_POST['bairroDesembarque'])){
    $bairroDesembarque = $_POST['bairroDesembarque'];
   }
   if(isset($_POST['estadoDesembarque'])){
    $estadoDesembarque = $_POST['estadoDesembarque'];
   }
   if(isset($_POST['municipioDesembarque'])){
    $municipioDesembarque = $_POST['municipioDesembarque'];
   }
   if(isset($_POST['dataEmbarque'])){
    $dataEmbarque= $_POST['dataEmbarque'];
   }
   	if(isset($_POST['horaEmbarque'])){
    	$horaEmbarque = $_POST['horaEmbarque'];
   }
   if(isset($_POST['vagas'])){
	$vagas = $_POST['vagas'];
   }
   if(isset($_POST['observacaoEmbarque'])){
	$observacaoEmbarque = $_POST['observacaoEmbarque'];
   }
   if(isset($_POST['dataCancelamento'])){
	$dataCancelamento = $_POST['dataCancelamento'];
   }
   if(isset($_POST['horaCancelamento'])){
	$horaCancelamento = $_POST['horaCancelamento'];
   }
   if(isset($_POST['fk_idVeiculo'])){
	$fk_idVeiculo = $_POST['fk_idVeiculo'];
   }
   
	
   	if(isset($_POST['btofertacarona'])){
    	//$msg = oferecerCarona($idOferta_Carona, $logradouroEmbarque, $bairroEmbarque, $municipioEmbarque, $estadoEmbarque, $logradouroDesembarque, $bairroDesembarque, $estadoDesembarque, $municipioDesembarque, $dataEmbarque, $horaEmbarque, $vagas, $observacaoEmbarque, $dataCancelamento, $horaCancelamento);
        //echo "Deu certo!"

		$con = mysqli_connect("localhost","userbdembarcanessa","0208", "bdembarcanessa");

		$sql = "INSERT INTO oferta_carona (fk_idMotorista, logradouroEmbarque, bairroEmbarque, 
         municipioEmbarque, estadoEmbarque, logradouroDesembarque, bairroDesembarque, 
         estadoDesembarque, municipioDesembarque, dataEmbarque, horaEmbarque, vagas, observacaoEmbarque, 
         dataCancelamento, horaCancelamento, fk_idVeiculo) VALUES (" .
				$fk_idMotorista . ", " .
                "'" . $logradouroEmbarque . "', " .
				"'" . $bairroEmbarque . "', " .
				"'" . $municipioEmbarque . "', " .
				"'" . $estadoEmbarque. "', " .
				"'" . $logradouroDesembarque . "', " .
				"'" . $bairroDesembarque . "', " .
				"'" . $estadoDesembarque . "', " .
				"'" . $municipioDesembarque . "', " .
				"'" . $dataEmbarque . "', " .
				"'" . $horaEmbarque . "', " .
				 $vagas . ", " .
				"'" . $observacaoEmbarque . "', " .
				"'" . $dataCancelamento . "', " .
				"'" . $horaCancelamento . "', " .
				 $fk_idVeiculo . ");" ;
				

	    $result = mysqli_query($con, $sql);

		echo "Você ofereceu uma carona!";
        
	

   }

 ?>   
   
	<body>
	
		<form action="formoferecercarona.php" name="formOferecerCarona" 
		id="formOferecerCarona" method="POST">

		<table>
			<tr>
				<td colspan="2"><b><a href="areausuario.php"><<< Voltar</a></b></td>
			</tr>
			<tr>
				<td colspan="2"><h2>Oferecer Carona</h2> </td>
			</tr>
			<tr>
				<td colspan="2">  <?php echo $msg[1] ?></td>
			</tr>
			<tr>
				<td><b>Id do Motorista: </b></td>
				<td><input type="text" required name="fk_idMotorista" value="<?php echo $fk_idMotorista ?>"> </td>
			</tr>
			<tr>
				<td><b>Logradouro de embarque: </b></td>
				<td><input type="text" required placeholder="Infome o endereço completo" name="logradouroEmbarque" value="<?php echo $logradouroEmbarque ?>"> </td>
			</tr>
			<tr>
				<td><b>Bairro de embarque: </b></td>
				<td><input type="text" required placeholder="Infome o endereço completo" name="bairroEmbarque" value="<?php echo $bairroEmbarque ?>"> </td>
			</tr>
			<tr>
				<td><b>Municipio de embarque: </b></td>
				<td><input type="text" required placeholder="Infome o endereço completo" name="municipioEmbarque" value="<?php echo $municipioEmbarque ?>"> </td>
			</tr>
			<tr>
				<td><b>Estado de embarque: </b></td>
				<td><input type="text" required placeholder="Infome o endereço completo" name="estadoEmbarque" value="<?php echo $estadoEmbarque ?>"> </td>
			</tr>
			<tr>
				<td><b>Logradouro de Desembarque: </b></td>
				<td><input type="text" required placeholder="Infome o endereço completo" name="logradouroDesembarque" value="<?php echo $logradouroDesembarque ?>"> </td>
			</tr>
			<tr>
				<td><b>Bairro de Desembarque: </b></td>
				<td><input type="text" required placeholder="Infome o endereço completo" name="bairroDesembarque" value="<?php echo $bairroDesembarque ?>"> </td>
			</tr>
			<tr>
				<td><b>Municipio de Desembarque: </b></td>
				<td><input type="text" required placeholder="Infome o endereço completo" name="municipioDesembarque" value="<?php echo $municipioDesembarque ?>"> </td>
			</tr>
			<tr>
				<td><b>Estado de Desembarque: </b></td>
				<td><input type="text" required placeholder="Infome o endereço completo" name="estadoDesembarque" value="<?php echo $estadoDesembarque ?>"> </td>
			</tr>
			<tr>
				<td><b>Data de embarque: </b></td>
				<td><input type="date" required placeholder="Infome a data que ocorrerá o embarque" name="dataEmbarque" value="<?php echo $dataEmbarque ?>"> </td>
			</tr>
			<tr>
				<td><b>Hora de embarque: </b></td>
				<td><input type="time" required placeholder="Infome a hora de embarque" name="horaEmbarque" value="<?php echo $horaEmbarque ?>"> </td>
			</tr>
			<tr>
				<td><b>Vagas Disponiveis: </b></td>
				<td><input id="vagas" type="text" name="vagas" required placeholder="Infome a quantidade de vagas disponiveis" name="vaga" value="<?php echo $vagas ?>"> </td>
			</tr>
			<tr>
				<td><b>Observaçoes de Embarque: </b></td>
				<td> <input type="text"  name="observacaoEmbarque" value="<?php echo $observacaoEmbarque ?>"> </td>
			</tr>
			<tr>
				<td><b>Data de Cancelamento: </b></td>
				<td> <input type="date"  name="dataCancelamento" value="<?php echo $dataCancelamento ?>"> </td>
			</tr>
			<tr>
				<td><b>Hora de Cancelamento: </b></td>
				<td> <input type="time" name="horaCancelamento" value="<?php echo $horaCancelamento ?>"> </td>
			</tr>
			<tr>
				<td><b>Id do veículo: </b></td>
				<td><input type="text" required name="fk_idVeiculo" value="<?php echo $fk_idVeiculo ?>"> </td>
			</tr>
				<td colspan="2" align="center">
					<?php if($msg[0] != 1){ 
						echo "<input type=\"submit\" name=\"btofertacarona\" value=\"Oferecer\" >";
					}else{
						echo "<input type=\"submit\" name=\"btofertacarona\" value=\"Oferecer\" disabled>";
					}
					?>
			   </td>
		    
			</tr>
		</table>
	</form>
        
        
  
	</body>
				
</html>
