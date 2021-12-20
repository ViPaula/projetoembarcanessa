<DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Página de login</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
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

    </head>
    <body>

    <div id="cabecalho">
      <h1>Entre com a sua conta ou cadastre-se</h1>
    </div>

    <div class="container">
        <section class="titulo">
        </section>

      <div class="conta">
       <section class="login">
         <form action="autenticarusuario.php" name="formAutenticarUsuario"
       id="formAutenticarUsuario" method="POST">
           <p>
             <input type="email" name="email" id ="email" onblur="validacaoEmail(formAutenticarUsuario.email)" placeholder="Email">
           </p>
          <p>
				     <div id="msgemail"></div>
          </p>
           <p>
             <input type="password" name="senha" id="senha" placeholder="Senha">
           </p>
           <p>
             <button id="btentrar">Entrar</button>
           </p>
           <p>
             <a href="" id="esqueci">Esqueceu a senha?</a>
           </p>
           <p>
             <a href="formcadastrarusuario.php"<button id ="btcriarconta">Cadastre-se</button></a>
           </p>
            </form>
       </section>
      </div>

    </div>

    <div id="rodape">
      <p></p>
    </div>

  </body>
</html>
