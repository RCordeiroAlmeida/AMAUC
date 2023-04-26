<?php
	$tela = explode('_', $_GET['acao']);

	switch ($tela[0]) {
		case 'lista':
			require_once 'application/atividade/view/lista.inc.php';
		break;

		case 'novo':
			require_once 'application/atividade/view/frmCadastro.inc.php';
		break;

		case 'edita':
			require_once 'application/atividade/view/frmEdicao.inc.php';
		break;		
		
		case 'visualiza':
			require_once 'application/atividade/view/frmVisualiza.inc.php';
		break;

		case 'deleta':
		case 'grava':
		case 'update':
		case 'ativar':
		case 'inativar':
		case 'aceita':
		case 'conclui':
		case 'redireciona':
			require_once 'application/atividade/view/dataControls.inc.php';
		break;
	}
?>