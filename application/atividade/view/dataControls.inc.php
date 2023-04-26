<?php
switch ($_GET['acao']) {

	case 'grava_atividade':

		$aux['sol_cod']      	= 0;
		$aux['ati_data']      	= date('Y-m-d');
		$aux['cli_cod'] 		= $_POST['cli_cod'];
		$aux['atp_cod'] 		= $_POST['atp_cod'];
		$aux['afr_cod'] 		= $_POST['afr_cod'];
		$aux['sol_status'] 		= $_POST['sol_status'];
		$aux['ati_descricao'] 	= $_POST['ati_descricao'];
		$aux['ati_tempo'] 		= $_POST['ati_tempo'];
		$aux['ati_solicitante']	= mb_strtoupper($_POST['ati_solicitante']);
		$aux['ati_cargo']		= mb_strtoupper($_POST['ati_cargo']);
		$aux['usu_cod'] 		= $_SESSION['amauc_userId'];

		$data->tabela = 'atividade';
		$data->add($aux);
		
		echo '<script>nextPage("?module=atividade&acao=lista");</script>';
		break;
	
	case 'update_atividade':

		$aux['ati_cod'] 			= $_POST['ati_cod'];
		$aux['atp_cod']				= $_POST['atp_cod'];
		$aux['afr_cod']				= $_POST['afr_cod'];
		$aux['sol_status']          = $_POST['sol_status'];
		$aux['ati_tempo']          	= $_POST['ati_tempo'];
		$aux['ati_descricao']       = $_POST['ati_descricao'];

		$data->tabela = 'atividade';
		$data->update($aux);

		$sql= 'UPDATE solicitacao SET sol_status ='.$aux['sol_status']." WHERE sol_status = 1 AND sol_cod =". $_POST['sol_cod'];

		$data->executaSQL($sql);

		echo '<script>nextPage("?module=atividade&acao=lista&ms=1", '.$_POST['sol_cod'].');</script>';
		break;
	
}
