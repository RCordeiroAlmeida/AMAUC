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

		case 'compensacao':
			switch($tela[0]){
				case 'novo':
					require_once 'application/relatorio/view/compensacao/frmCadastro.inc.php';
				break;
				case 'grava':
				case 'aceitar':
				case 'negar':
					require_once 'application/relatorio/view/compensacao/dataControls.inc.php';
				break;
				case 'lista':
					require_once 'application/relatorio/view/compensacao/lista.inc.php';
				break;
			}
		break;
	}
?>