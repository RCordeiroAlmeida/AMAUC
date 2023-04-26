<?php
	$tela = explode('_', $_GET['acao']);

	switch ($tela[0]) {
		case 'lista':
			require_once 'application/dashboard/view/'.$tela[1].'/lista.inc.php';
		break;

		case 'novo':
			require_once 'application/dashboard/view/'.$tela[1].'/frmCadastro.inc.php';
		break;

		case 'edita':
			require_once 'application/dashboard/view/'.$tela[1].'/frmEdicao.inc.php';
		break;		
		
		case 'visualiza':
			require_once 'application/dashboard/view/'.$tela[1].'/frmVisualiza.inc.php';
		break;

		case 'deleta':
		case 'grava':
		case 'update':
		case 'ativar':
		case 'inativar':
		case 'grava_task':
		case 'limpa_task':
			require_once 'application/dashboard/view/dataControls.inc.php';
		break;
	}
?>