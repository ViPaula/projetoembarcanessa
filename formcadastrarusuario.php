<?php
	//include '..\controles\manterusuario.php';


	$msg[0] = 0;
	$msg[1] = "";

	$nome = "";
	$telefone = "";
	$email = "";
	$login= "";
    $senha= "";

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

   	if(isset($_POST['btcadastrar'])){ 
	   
	   
		   
		
		

	if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)){

        if(!empty($_POST['nome']) && !empty($_POST['telefone']) && !empty($_POST['email']) && !empty($_POST['login'] && !empty($_POST['senha'])) ){
            
			$nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $login = $_POST['login'];
			$senha = $_POST['senha'];

			function ExisteUsuario($nome, $telefone, $email, $login, $senha){
				$con = mysqli_connect("localhost","userbdembarcanessa","0208", "bdembarcanessa");
					
				$sql = "SELECT * FROM usuario_carona WHERE " .
				    "nome like '" . $nome . "' OR " .
				    "telefone like '" . $telefone . "' OR " .
				    "email like '" . $email . "' OR " .
				    "login like '" . $login . "' OR " .
				    "senha like '" . $senha . "' ; ";
			 
				//echo $sql;
							
				$result = mysqli_query($con, $sql);
			
				$rows = mysqli_num_rows($result);
					
					if($rows>0){
						return true;
					}else{
						return false;
						}
					}

			$existe = ExisteUsuario($nome, $telefone, $email, $login, $senha);

            if(!$existe){
				$con = mysqli_connect("localhost","userbdembarcanessa","0208", "bdembarcanessa");

				$sql = "INSERT INTO usuario_carona (nome, telefone, email, login, senha) VALUES (" .
						"'" . $nome . "', " .
						"'" . $telefone . "', " .
						"'" . $email . "', " .
						"'" . $login . "'," .
						"'" . $senha . "');" ;
		
				$result = mysqli_query($con, $sql);
		
				

                if(!$result){
                    echo "<script>alert('Já exite um usuário registrado com os mesmo dados!);</script>";
                }

                else{
                    echo "<script>alert('Usuario registrado com sucesso!');</script>";
                }
            }

                else if($existe){
                    echo "<script>alert('Já exite um usuário registrado com os mesmo dados! Faça login...');</script>";
            }
    	    
			
		}
    }

        
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

    <script language="Javascript">
               function validacaoEmail(field) {
				   usuario = field.value.substring(0, field.value.indexOf("@"));
                   dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length);
        if ((usuario.length >=1) &&
            (dominio.length >=3) &&
            (usuario.search("@")==-1) &&
            (dominio.search("@")==-1) &&
    		(usuario.search(" ")==-1) &&
    		(dominio.search(" ")==-1) &&
    		(dominio.search(".")!=-1) &&
    		(dominio.indexOf(".") >=1)&&
    		(dominio.lastIndexOf(".") < dominio.length - 1)) {
      document.getElementById("msgemail").innerHTML="E-mail válido";
      alert("email valido");
    }
		else{
      document.getElementById("msgemail").innerHTML="<font color='red'>Email inválido </font>";
      alert("E-mail invalido");
	}
	}
	</script>

    <script>
        function verifica(){
           senha = document.getElementById("senha").value;
           forca = 0;
           mostra = document.getElementById("mostra");
            if((senha.length >= 4) && (senha.length <= 7)){
                forca += 10;
            }else if(senha.length>7){
                forca += 25;
        }
            if(senha.match(/[a-z]+/)){
                forca += 10;
        }
            if(senha.match(/[A-Z]+/)){
				forca += 20;
        }
            if(senha.match(/\d+/)){
                forca += 20;
        }
            if(senha.match(/\W+/)){
                forca += 25;
        }
             return mostra_res();
        }
        
		function mostra_res(){
            if(forca < 30){
                mostra.innerHTML = '<tr><td bgcolor="red" width="'+forca+'"></td><td>Fraca </td></tr>';
            }else if((forca >= 30) && (forca < 60)){
                 mostra.innerHTML = '<tr><td bgcolor="yellow" width="'+forca+'"></td><td>Justa </td></tr>';;
            }else if((forca >= 60) && (forca < 85)){
                 mostra.innerHTML = '<tr><td bgcolor="blue" width="'+forca+'"></td><td>Forte </td></tr>';
            }else{
                 mostra.innerHTML = '<tr><td bgcolor="green" width="'+forca+'"></td><td>Excelente </td></tr>';
    }
}
</script>
	
  
	<body>
		<form action="formcadastrarusuario.php" name="formCadastrarUsuario" 
		id="formCadastrarUsuario" method="POST" onsubmit="return validaForm(this)"; onsubmit="return false">

		<table>
			<tr>
				<td colspan="2"><b><a href="\embarcanessa\index.php"><<< Voltar</a></b></td>
			</tr>
			<tr>
				<td colspan="2"><h2>Cadastrar Usuario</h2> </td>
			</tr>
			<tr>
				<td colspan="2">  <?php echo $msg[1] ?></td>
			</tr>
			<tr>
				<td><b>Nome: </b></td>
				<td><input type="text" required name="nome" value="<?php echo $nome ?>"> </td>
			</tr>
			<tr>
				<td><b>Telefone: </b></td>
				<td><input type="tel" pattern="(\([0-9]{2}\))\s([9]{1})?([0-9]{5})-([0-9]{4})" 
				title="Número de telefone celular precisa ser no formato (00) 00000-0000" 
				required name="telefone" value="<?php echo $telefone ?>"> </td>
			</tr>
			<tr>
				<td><b>Email: </b></td>
				<td> <input type="email" required name="email" onblur="validacaoEmail(formCadastrarUsuario.email)" value="<?php echo $email ?>"> </td>
			</tr>
			<td>
				<div id="msgemail"></div>
			</td>
			<tr>
				<td><b>Login: </b></td>
				<td> <input type="text" required name="login" value="<?php echo $login ?>"> </td>
			</tr>
            <tr>
				<td><b>Senha: </b></td>
				<td> <input type="password" name="senha" inputmode="numeric" 
                 pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\W+)(?=^.{8,8}$).*$" onkeyup="javascript:verifica()" required value="<?php echo $senha ?>"> </td>			
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
		<table>
		<tr>
		
		       <td> <h2>Você possui carro?</h2></td> 
			   <td> <h2> <a href="\embarcanessa\visoes\formcadastrarmotorista.php"class="button">Sim</a> </h2></td> 
			   <td> <h2> <a href="\embarcanessa\visoes\formcadastrarusuario.php"class="button">Não</a> </h2></td> 
				
	    </tr>
		</table>
	</body>
			
</html>
