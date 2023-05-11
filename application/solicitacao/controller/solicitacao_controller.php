<?php
	
	$tela = explode('_', $_GET['acao']);

	switch ($tela[0]) {
		case 'lista':
			require_once 'application/solicitacao/view/'.$tela[1].'/lista.inc.php';
		break;

		case 'novo':
			require_once 'application/solicitacao/view/frmCadastro.inc.php';
		break;

		case 'edita':
			require_once 'application/solicitacao/view/frmEdicao.inc.php';
		break;		
		
		case 'visualiza':
			require_once 'application/solicitacao/view/frmVisualiza.inc.php';
		break;

		case 'deleta':
		case 'grava':
		case 'update':
		case 'ativar':
		case 'inativar':
		case 'aceita':
		case 'conclui':
		case 'redireciona':
			require_once 'application/solicitacao/view/dataControls.inc.php';
		break;
	}
?>