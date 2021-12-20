<?php 
	//include 'C:\xampp\htdocs\embarcanessa\controles\manterusuario.php';

	$msg = "";
	$numRegistros = 0;

	$nome = "";


   	if(isset($_POST['btconsultar'])){
		$con = mysqli_connect("localhost","userbdembarcanessa","0208", "bdembarcanessa");

		$sql = "Select * from usuario_carona" ;

		$result = mysqli_query($con, $sql);
        
        

    	//$result = listarUsuarios();

    	$numRegistros = mysqli_num_rows($result);

		if ($numRegistros > 0) {
		    // output data of each row
		    $cont = 0;
		    while($row = mysqli_fetch_assoc($result)) {
		    	$usuarios[$cont][0] = $row["idUsuario"];
		    	$usuarios[$cont][1] = $row["nome"];
		    	$usuarios[$cont][2] = $row["telefone"];
		    	$usuarios[$cont][3] = $row["email"];
		    	$usuarios[$cont][4] = $row["login"];
                $usuarios[$cont][5] = $row["senha"];

		    	$cont++;
		    }

		}

    }
?>

<html>
	<body>
		<form action="formconsultarusuarios.php" name="formConsultarUsuarios" 
		id="formConsultarUsuarios" method="POST">

		<table>
			<tr>
				<td colspan="6"><b><a href="areausuario.php"><<< Voltar</a></b></td>
			</tr>
			<tr>
				<td colspan="2"><h2>Consultar Usuario</h2></td>
			</tr>
			<tr>
				<td colspan="6" align="center">
					Nome: <input type="text" name="nome" value="<?php echo $nome ?>">
					<input type="submit" name="btconsultar" value="Consultar">
				</td>
			</tr>
			<tr>
				<td colspan="6" align="center"><b>Usuarios</b></td>
			</tr>
			<tr>
				<td><b>Id Usuario</b></td>
				<td><b>Nome</b></td>
				<td><b>Telefone</b></td>
				<td><b>Email</b></td>
                <td><b>Login</b></td>
				<td><b>Senha</b> <a href=""></a></td>
				<td> * </td>
				<td> * </td>
			</tr>
			<?php
				if($numRegistros > 0 ){
					for ($i=0; $i < $numRegistros; $i++) { 
						echo "<tr> \n";
				        echo 	"<td>" . $usuarios[$i][0] . "</td> \n";
			        	echo 	"<td>" . $usuarios[$i][1] . "</td> \n";
			    	    echo 	"<td>" . $usuarios[$i][2] . "</td> \n";
				        echo 	"<td>" . $usuarios[$i][3] . "</td> \n";
				        echo 	"<td>" . $usuarios[$i][4] . "</td> \n";
                        echo 	"<td>" . $usuarios[$i][5] . "</td> \n";
				        echo 	"<td><a href=\"formatualizarusuario.php?idUsuario=" . $usuarios[$i][0] . "\"> atualizar </a></td> \n";
				        echo 	"<td><a href=\"formexcluirusuario.php?idUsuario=" . $usuarios[$i][0] . "\"> excluir </a></td> \n";
		    		    echo "</tr> \n";

					}

				}
			?>

		</table>

		</form>
	</body>
</html>
