<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Sistema de Gestão - AMAUC</title>
        <link href="application/images/favicon.png" rel="icon">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    		
        <script src="library/inspinia/js/jquery-2.1.4.js"></script>
  		<script src="library/inspinia/js/plugins/jquery-ui/jquery-ui.min.js"></script>

  		<style type="text/css">
  			.gray-bg{
				background-image:url(application/images/bg.jpg);
				-moz-background-size: cover;
				-webkit-background-size: cover;
				background-size: cover;
				background-position: center center;
			}
  		</style>
  	</head>
  	<body class="gray-bg">
  		<div style="position:absolute;top:30%;left:36%;">
  			<img src="application/images/logo-amauc.png" style="width:100%;">
  		</div>
		<?php
			session_start();
			
			class Valida_SenhaCommand implements Command {
				public function execute() {
					if(!isset($_SESSION)){
						session_start();
					}
					
					
					$user = addslashes($_POST['usuario']);
					$pass = md5($_POST['senha']);
					$idSession = $_POST['amauc_idSession'];
					
					$login = new Login();
					$login->table = 'usuario';

					//echo $idSession;
					$result = $login->validateUser(array('usu_login' => $user,'usu_senha' => $pass),$idSession);
					
					if($result['login'] == 'Logado'){
						echo "<meta http-equiv='refresh' content='1;URL=?module=dashboard&acao=lista'>"; 
					}else{
						echo "<meta http-equiv='refresh' content='0;URL=?module=index&erro=1'>";
					}
								
				}
			}
		?>  		
  	</body>
</html>