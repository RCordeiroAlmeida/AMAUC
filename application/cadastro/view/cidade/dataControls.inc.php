<?php
switch ($_GET['acao']) {

	case 'grava_cidade':
		$aux['cid_nome']    = addslashes(mb_strtoupper($_POST['cid_nome'], 'UTF-8'));
		$aux['est_uf']      = addslashes(mb_strtoupper($_POST['est_uf'], 'UTF-8'));

		$data->tabela = 'cidade';
		$data->add($aux);

		echo '<script>window.location = "?module=cadastro&acao=lista_cidade&ms=1";</script>';
		break;

	case 'update_cidade':
		$aux['cid_cod']		= $_POST['cid_cod'];
		$aux['cid_nome']    = addslashes(mb_strtoupper($_POST['cid_nome'], 'UTF-8'));
		$aux['est_uf']   = addslashes(mb_strtoupper($_POST['est_uf'], 'UTF-8'));

		$data->tabela = 'cidade';
		$data->update($aux);

		echo '<script>window.location = "?module=cadastro&acao=lista_cidade&ms=2";</script>';
		break;

	case 'inativar_cidade':
		$sql = 'UPDATE cidade SET cid_situacao = 0 WHERE cid_cod = ' . $_POST['param_0'];
		$data->executaSQL($sql);

		echo '<script>window.location = "?module=cadastro&acao=lista_cidade&ms=5"</script>';
		break;

	case 'ativar_cidade':
		$sql = 'UPDATE cidade SET cid_situacao = 1 WHERE cid_cod = ' . $_POST['param_0'];
		$data->executaSQL($sql);

		echo '<script>window.location = "?module=cadastro&acao=lista_cidade&ms=5"</script>';
		break;
}
