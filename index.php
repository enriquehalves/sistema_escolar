<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="img/chapeu.svg">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<?php require "conexao.php"; ?>
	<title>Sistema Escolar</title>
</head>
<body>
	<div id="logo">
		<img src="img/escola.png">
	</div>

	<div id="caixa_login">
		<?php 

           if(isset($_POST['entrar'])){
            	$code=$_POST['code'];
            	$password = $_POST['password'];
            	if($code == ''){
           	    	echo "<h2> Por favor, digite o numero do cartão ou codigo de acesso</h2>";
           	    }else if($password == ''){
           	        echo "<h2> Por favor, digite a senha de acesso</h2>";	
            	}else{
            		$sql = "SELECT * FROM login WHERE code='$code' AND senha='$password'";
            		$result = mysqli_query($conexao,$sql);
            		
            		if(mysqli_num_rows($result)>0){
                       while ($res_1 = mysqli_fetch_assoc($result)) {
                       	$status = $res_1['status'];
                       	$code = $res_1['code'];
                       	$senha = $res_1['senha'];
                       	$nome = $res_1['nome'];
                       	$painel=$res_1['painel'];

                       	if($status=='inativo'){
                       		echo "<h2>Você está inativo, procure a administração</h2>";
                       	}else{
                       		session_start();
                       		$_SESSION['code']=$code;
                       		$_SESSION['nome']=$nome;
                       		$_SESSION['senha']=$senha;
                       		$_SESSION['painel']=$painel;

                       		if($painel=='adm'){
                       			echo "<script language='javascript'>
                                      window.location='adm';
                       			</script>";
                       		}else if($painel=='aluno'){
                                 echo "<script language='javascript'>
                                      window.location='aluno';
                       			</script>";
                       		}else if($painel=='professor'){
                       			echo "<script language='javascript'>
                                      window.location='professor';
                       			</script>";
                       		}else if($painel == 'tesouraria'){
                       			echo "<script language='javascript'>
                                      window.location='tesouraria';
                       			</script>";
                       		}
                  

                       	}
                       }
            		}else{
            			echo "<h2>nao existe registro</h2>";
            		}
            	}
           

           }
		 ?>
		<form name="form" method="post" action="" enctype="multipart/form-data">
			<table>
				 <tr>
				 	<td><h1>Nº Cartão ou Código de acesso:</h1></td>
				 </tr>
				 <tr>
				 	<td><input type="text" name="code"></td>
				 </tr>
				 <tr>
				 	<td><h1>Senha:</h1></td>
				 </tr>
				 <tr>
				 	<td><input type="password" name="password"></td>
				 </tr>
				 <tr>
				 	<td><input class="input" type="submit" name="entrar" value="entrar"></td>
				 </tr>
			</table>
		</form>
	</div>

</body>
</html>