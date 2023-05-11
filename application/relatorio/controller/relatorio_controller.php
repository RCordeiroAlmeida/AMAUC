<?php
	$tela = explode('_', $_GET['acao']);

	switch ($tela[0]) {
		case 'lista':
			require_once 'application/relatorio/view/lista.inc.php';
		break;

		case 'novo':
			require_once 'application/contas/view/frmCadastro.inc.php';
		break;

		case 'edita':
			require_once 'application/contas/view/frmEdicao.inc.php';
		break;		
		
		case 'visualiza':
			require_once 'application/contas/view/frmVisualiza.inc.php';
		break;

		case 'deleta':
		case 'grava':
		case 'update':
		case 'ativar':
		case 'inativar':
			require_once 'application/contas/view/dataControls.inc.php';
		break;
	}
?>