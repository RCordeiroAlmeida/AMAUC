<?php
	session_start();

	function meu_autoloader($nomeClasse) {
		
		// Caso não esteja atualizado um cookie, todos são atualizados com o valor atual da variável de sessão
		if(($_SESSION['amauc_userSession'] != $_COOKIE['amauc_userSession']) 	  ||
		($_SESSION['amauc_userId'] != $_COOKIE['amauc_userId'])	  ||
		($_SESSION['amauc_userName'] != $_COOKIE['amauc_userName']) ||
		($_SESSION['amauc_idSession'] != $_COOKIE['amauc_idSession']) || 
		($_SESSION['amauc_userPermissao'] != $_COOKIE['amauc_userPermissao']) || 
		($_SESSION['amauc_userEmail'] != $_COOKIE['amauc_userEmail'])){
			setcookie('amauc_userSession', $_SESSION['amauc_userSession'], $tempo_cookie);	
			setcookie('amauc_userId', $_SESSION['amauc_userId'], $tempo_cookie);	
			setcookie('amauc_userName', $_SESSION['amauc_userName'], $tempo_cookie);	
			setcookie('amauc_session', $_SESSION['amauc_session'], $tempo_cookie);	
			setcookie('amauc_idSession', $_SESSION['amauc_idSession'], $tempo_cookie);	
			setcookie('amauc_userPermissao', $_SESSION['amauc_userPermissao'], $tempo_cookie);	
			setcookie('amauc_userEmail', $_SESSION['amauc_userEmail'], $tempo_cookie);
			setcookie('amauc_userCliente', $_SESSION['amauc_userCliente'], $tempo_cookie);	
			setcookie('amauc_userFuncionario', $_SESSION['amauc_userFuncionario'], $tempo_cookie);
			setcookie('amauc_userSetor', $_SESSION['amauc_userSetor'], $tempo_cookie);	
		}

		if(!$_SESSION['amauc_userSession']){
		    // Para não perder sessão
		    $_SESSION['amauc_userId']         	= $_COOKIE['amauc_userId'];
			$_SESSION['amauc_userName']       	= $_COOKIE['amauc_userName'];
			$_SESSION['amauc_userSession']   	= $_COOKIE['amauc_userSession'];
			$_SESSION['amauc_userPermissao']  	= $_COOKIE['amauc_userPermissao'];
			$_SESSION['amauc_userEmail']  	   	= $_COOKIE['amauc_userEmail'];
			$_SESSION['amauc_idSession']      	= $_COOKIE['amauc_idSession'];
			$_SESSION['amauc_userCliente'] 		= $_COOKIE['amauc_userCliente'];
			$_SESSION['amauc_userFuncionario'] 	= $_COOKIE['amauc_userFuncionario'];
			$_SESSION['amauc_userSetor'] 		= $_COOKIE['amauc_userSetor'];
		}
		require_once 'library/'.implode('/',explode('_',$nomeClasse)).'.php';
	}

	spl_autoload_register('meu_autoloader');

	try {
	    $factory = new Command_Factory();
	    $factory->createCommand()->execute();
	} catch (Exception_Pagenotfound $ep) {
	    echo '<h1>ERRO 404 - Página não encontrada</h1>';
	} catch (Exception $e) {
	    echo '<h1>ERRO 500 - Erro na execução</h1>';
	}
?>