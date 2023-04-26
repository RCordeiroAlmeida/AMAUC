<?php
class Login{	
	var $table;
	
	function validateUser($params, $session){
		if(!isset($_SESSION)){
			session_start();
    	}
		$db = new MySql();
		
		$i = 0;
		foreach($params as $key => $valor){
			if($i == 0){
				$conditions = $key." = '".$valor."'";
				$i++;
			}else{
				$conditions .= " AND ".$key." = '".$valor."'";
			}  
		}
		$sql = "SELECT * FROM ".$this->table." WHERE usu_situacao = 1 AND ".$conditions;
		$result = $db->executeQuery($sql,false);

		if ($db->countLines($result) > 0){
			for ($i=0;$i<$db->countLines($result);$i++){
				$_SESSION['amauc_userId'] 			= $db->result($result, $i,'usu_cod');
				$_SESSION['amauc_userName'] 		= $db->result($result, $i,'usu_nome');	
				$_SESSION['amauc_userEmail'] 		= $db->result($result, $i,'usu_email');									
				$_SESSION['amauc_userPermissao'] 	= $db->result($result, $i,'upe_cod');
				$_SESSION['amauc_userCliente'] 		= $db->result($result, $i,'cli_cod');
				$_SESSION['amauc_userFuncionario']  = $db->result($result, $i,'fun_cod');
				$_SESSION['amauc_userSetor']  		= $db->result($result, $i,'set_cod');
				$_SESSION['amauc_userSession'] 		= $session;

				$retorno['login'] 	 = 'Logado';
				$retorno['nome'] 	 = $db->result($result, $i,'usu_nome');
				$retorno['mensagem'] = "Logado com Sucesso";

				
				// Cria um cookie com o usu�rio
				$tempo_cookie = strtotime("+2 day", time());
				setcookie('amauc_userId', $_SESSION['amauc_userId'], $tempo_cookie, "/");			
				setcookie('amauc_userName', $_SESSION['amauc_userName'], $tempo_cookie, "/");			
				setcookie('amauc_userEmail', $_SESSION['amauc_userEmail'], $tempo_cookie, "/");
				setcookie('amauc_userPermissao', $_SESSION['amauc_userPermissao'], $tempo_cookie, "/");
				setcookie('amauc_userCliente', $_SESSION['amauc_userCliente'], $tempo_cookie, "/");
				setcookie('amauc_userFuncionario', $_SESSION['amauc_userFuncionario'], $tempo_cookie, "/");
				setcookie('amauc_userSetor', $_SESSION['amauc_userSetor'], $tempo_cookie, "/");
				setcookie('amauc_userSession', $_SESSION['amauc_userSession'], $tempo_cookie, "/");				
				setcookie('amauc_idSession', $_SESSION['amauc_idSession'], $tempo_cookie, "/");	
			}
		}else{
			$retorno['login'] 	 = "falha";
			$retorno['mensagem'] = "Senha e/ou login invalido";				
		}
		return $retorno;			
	}

	function logout(){
		unset($_SESSION);
		session_destroy();

	}
	
	function getLogin(){
		if ((isset($_SESSION['amauc_idSession']))&&($_SESSION['amauc_idSession'] == $_SESSION['amauc_userSession'])){
			$retorno['logged'] = "yes";
		}else{
			$retorno['logged'] = "no";
		}
		return $retorno;			
	}	
}

?>