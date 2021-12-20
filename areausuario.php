<?php 
	$msg = "";
	$numRegistros = 0;

	$nome = "";


   	if(isset($_POST['btconsultar'])){
		$con = mysqli_connect("localhost","userbdembarcanessa","0208", "bdembarcanessa");

		$sql = "Select * from oferta_carona" ;

		$result = mysqli_query($con, $sql);
        
        

    	//$result = listarUsuarios();

    	$numRegistros = mysqli_num_rows($result);

		if ($numRegistros > 0) {
		    // output data of each row
		    $cont = 0;
		    while($row = mysqli_fetch_assoc($result)) {
                $usuarios[$cont][0] = $row["idOferta_Carona"];
                $usuarios[$cont][1] = $row["fk_idMotorista"];
		    	$usuarios[$cont][2] = $row["logradouroEmbarque"];
				$usuarios[$cont][3] = $row["bairroEmbarque"];
				$usuarios[$cont][4] = $row["municipioEmbarque"];
				$usuarios[$cont][5] = $row["estadoEmbarque"];
		    	$usuarios[$cont][6] = $row["logradouroDesembarque"];
				$usuarios[$cont][7] = $row["bairroDesembarque"];
				$usuarios[$cont][8] = $row["estadoDesembarque"];
				$usuarios[$cont][9] = $row["municipioDesembarque"];
				$usuarios[$cont][10] = $row["dataEmbarque"];
		    	$usuarios[$cont][11] = $row["horaEmbarque"];
				$usuarios[$cont][12] = $row["vagas"];
				$usuarios[$cont][13] = $row["observacaoEmbarque"];
				$usuarios[$cont][14] = $row["dataCancelamento"];
		    	$usuarios[$cont][15] = $row["horaCancelamento"];
                $usuarios[$cont][16] = $row["fk_idVeiculo"];
	            
		    	$cont++;
		    }

		}else{
      echo "<p> Não há nenhuma carona disponível até o momento! Volte mais tarde! </p>";
  } 

   }

?>

<!DOCTYPE HTML>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css"  href="estilo.css" />
</head>
<body>
<nav>
<ul class="menu"> 
        
        <ul>
           <li class="dropdown">
           <a href="javascript:void(0)" class="dropbtn">Menu</a>
           <div class="dropdown-content">
           <a href="formatualizarusuario.php">Alterar dados</a>
           <a href="formcadastrarcarro.php">Cadastrar carro</a>
           <a href="formoferecercarona.php">Oferecer carona</a>
           <a href="#">Solicitar carona</a>
           <a href="#">Calcular economia de combustível</a>
           <a href="formconsultarusuarios.php">Consultar Usuário</a>
           <a href="formexcluirusuario.php">Remover Usuário</a>
           <a href="#">Notificações</a>
           </div>
           </li>
        </ul>

</ul>
</nav>

<form action="areausuario.php" name="areaUsuario" 
		id="areaUsuario" method="POST">

		<table>
			<tr>
				<td colspan="6"><b><a href="login.php"><<< Voltar</a></b></td>
			</tr>
			<tr>
				<td colspan="2"><h2>Lista de Caronas Disponíveis</h2></td>
			</tr>
			<tr>
				<td colspan="6" align="center">
					<input type="text" name="nome" value="<?php echo $nome?>">
					<input type="submit" name="btconsultar" value="Procurar">
				</td>
			</tr>
			<tr>
                <td><b>id do Usuario</b></td>  
				<td><b>id do Motorista</b></td>
                <td><b>Logradouro de Embarque</b></td>
				<td><b>Bairro de Embarque</b></td>
				<td><b>Municipio de Embarque</b></td>
				<td><b>Estado de Embarque</b></td>
				<td><b>Logradouro de Desembarque</b></td>
				<td><b>Bairro de Desembarque</b></td>
				<td><b>Municipio de Desembarque</b></td>
				<td><b>Estado de Desembarque</b></td>
				<td><b>Data de Embarque</b></td>
				<td><b>Hora de Embarque</b></td>
				<td><b>Vagas</b></td>
				<td><b>Observação do Embarque</b></td>
				<td><b>Data do Cancelamento</b></td>
				<td><b>Horário do Cancelamento</b></td>
				<td><b>id do Veículo</b></td>
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
						echo 	"<td>" . $usuarios[$i][6] . "</td> \n";
						echo 	"<td>" . $usuarios[$i][7] . "</td> \n";
						echo 	"<td>" . $usuarios[$i][8] . "</td> \n";
						echo 	"<td>" . $usuarios[$i][9] . "</td> \n";
						echo 	"<td>" . $usuarios[$i][10] . "</td> \n";
						echo 	"<td>" . $usuarios[$i][11] . "</td> \n";
						echo 	"<td>" . $usuarios[$i][12] . "</td> \n";
						echo 	"<td>" . $usuarios[$i][13] . "</td> \n";
						echo 	"<td>" . $usuarios[$i][14] . "</td> \n";
						echo 	"<td>" . $usuarios[$i][15] . "</td> \n";
						echo 	"<td>" . $usuarios[$i][16] . "</td> \n";
				        echo 	"<td><a href=\"formatualizarusuario.php?idOferta_Carona=" . $usuarios[$i][0] . "\"> Participar </a></td> \n";
				        echo "</tr> \n";

					}

				}
			?>

		</table>

		</form>
</body>
</html>