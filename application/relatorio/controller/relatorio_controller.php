<?php
	$tela = explode('_', $_GET['acao']);

	switch ($tela[1]) {
		case 'solicitacao':
			require_once 'application/relatorio/view/solicitacao/lista.inc.php';
		break;
		
		case 'atividade':
			require_once 'application/relatorio/view/atividade/lista.inc.php';
		break;
		
		case 'prestacao':
			require_once 'application/relatorio/view/prestacao/lista.inc.php';
		break;
	}
?>