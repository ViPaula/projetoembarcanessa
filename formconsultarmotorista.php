<?php 
	//include 'C:\xampp\htdocs\embarcanessa\controles\manterusuario.php';

	$msg = "";
	$numRegistros = 0;

	$cnh = "";


   	if(isset($_POST['btconsultar'])){
		$con = mysqli_connect("localhost","userbdembarcanessa","0208", "bdembarcanessa");

		$sql = "Select * from motorista" ;

		$result = mysqli_query($con, $sql);
        
        

    	//$result = listarUsuarios();

    	$numRegistros = mysqli_num_rows($result);

		if ($numRegistros > 0) {
		    // output data of each row
		    $cont = 0;
		    while($row = mysqli_fetch_assoc($result)) {
		    	$usuarios[$cont][0] = $row["fk_idUsuario"];
		    	$usuarios[$cont][1] = $row["cnh"];
                $usuarios[$cont][2] = $row["validade"];

		    	$cont++;
		    }

		}

   }

?>

<html>
	<body>
		<form action="formconsultarmotorista.php" name="formConsultarMotorista" 
		id="formConsultarMotorista" method="POST">

		<table>
			<tr>
				<td colspan="6"><b><a href="\embarcanessa\index.php"><<< Voltar</a></b></td>
			</tr>
			<tr>
				<td colspan="2"><h2>Consultar Motorista</h2></td>
			</tr>
			<tr>
				<td colspan="6" align="center">
					CNH: <input type="text" name="cnh" value="<?php echo $cnh ?>">
					<input type="submit" name="btconsultar" value="Consultar">
				</td>
			</tr>
			<tr>
				<td colspan="6" align="center"><b>Motoristas Cadastrados</b></td>
			</tr>
			<tr>
				<td><b>Id do Usuário:</b></td>
				<td><b>CNH:</b></td>
				<td><b>Validade:</b></td>
			</tr>
			<?php
				if($numRegistros > 0 ){
					for ($i=0; $i < $numRegistros; $i++) { 
						echo "<tr> \n";
				        echo 	"<td>" . $usuarios[$i][0] . "</td> \n";
			        	echo 	"<td>" . $usuarios[$i][1] . "</td> \n";
                        echo 	"<td>" . $usuarios[$i][2] . "</td> \n";
				        echo 	"<td><a href=\"formatualizarmotorista.php?fk_idUsuario=" . $usuarios[$i][0] . "\"> atualizar </a></td> \n";
				        echo 	"<td><a href=\"formexcluirmotorista.php?fk_idUsuario=" . $usuarios[$i][0] . "\"> excluir </a></td> \n";
		    		    echo "</tr> \n";

					}

				}
			?>

		</table>

		</form>
	</body>
</html>
