<?php
switch ($_GET['acao']) {

	case 'grava_setor':
		$aux['set_nome'] 		= addslashes(mb_strtoupper($_POST['set_nome'], 'UTF-8'));
		$aux['set_descricao']   = addslashes(mb_strtoupper($_POST['set_descricao'], 'UTF-8'));
		$aux['set_responsavel']   = addslashes(mb_strtoupper($_POST['set_responsavel'], 'UTF-8'));
		$aux['mostrar']   = $_POST['mostrar'];

		$data->tabela = 'setor';
		$data->add($aux);

		echo '<script>window.location = "?module=cadastro&acao=lista_setor&ms=1";</script>';
		break;

	case 'update_setor':
		$aux['set_cod']			= $_POST['set_cod'];
		$aux['set_nome'] 		= addslashes(mb_strtoupper($_POST['set_nome'], 'UTF-8'));
		$aux['set_descricao']   = addslashes(mb_strtoupper($_POST['set_descricao'], 'UTF-8'));
		$aux['set_responsavel']   = addslashes(mb_strtoupper($_POST['set_responsavel'], 'UTF-8'));
		$aux['mostrar']   = $_POST['mostrar'];
		$data->tabela = 'setor';
		$data->update($aux);

		echo '<script>window.location = "?module=cadastro&acao=lista_setor&ms=2";</script>';
		break;

	case 'inativar_setor':
		$sql = 'UPDATE setor SET set_situacao = 0 WHERE set_cod = ' . $_POST['param_0'];
		$data->executaSQL($sql);

		echo '<script>window.location = "?module=cadastro&acao=lista_setor&ms=5"</script>';
		break;

	case 'ativar_setor':
		$sql = 'UPDATE setor SET set_situacao = 1 WHERE set_cod = ' . $_POST['param_0'];
		$data->executaSQL($sql);

		echo '<script>window.location = "?module=cadastro&acao=lista_setor&ms=5"</script>';
		break;
}
