<?php
switch ($_GET['acao']) {

	case 'grava_conta':

		$data_ini = $_POST['con_data_ini'];
		$hora_ini = $_POST['con_hora_ini'];
		$aux['con_data_ini'] = date('Y/m/d H:i:s', strtotime("$data_ini $hora_ini"));

		$data_fim = $_POST['con_data_fim'];
		$hora_fim = $_POST['con_hora_fim'];
		$aux['con_data_fim'] = date('Y/m/d H:i:s', strtotime("$data_fim $hora_fim"));

		$aux['usu_cod'] 		= $_POST['usu_cod'];
		$aux['con_setor'] 		= $_POST['con_setor'];
		$aux['con_veiculo']		= $_POST['con_veiculo'];
		$aux['con_vei_cod']		= $_POST['con_vei_cod']; 	//NULL
		$aux['con_vei_placa']	= mb_strtoupper($_POST['con_vei_placa']); 	//NULL
		$aux['con_vei_km_ini']	= $_POST['con_vei_km_ini']; //NULL
		$aux['con_vei_km_fim']	= $_POST['con_vei_km_fim']; //NULL
		$aux['con_vei_outro']	= mb_strtoupper($_POST['con_vei_outro']); 	//NULL
		$aux['con_destino']		= mb_strtoupper($_POST['con_destino']); 
		$aux['con_cliente']		= $_POST['con_cliente'];//NULL
		$aux['con_solicitacao']	= $_POST['con_solicitacao'];//NULL
		$aux['con_descricao']	= $_POST['con_descricao'];//NULL
		
		$data->tabela = 'conta';
		$data->add($aux);

		$id = $data->MaxValue("con_cod", "conta");
	
		//se atendeu uma solicitação grava na tabela atividade
		if ($aux['con_solicitacao'] != ''){
			$aux2['ati_data'] 			= $_POST['con_data'];
			$aux2['ati_descricao'] 		= $_POST['con_descricao'];
			$aux2['usu_cod'] 			= $_POST['usu_cod'];
			$aux2['sol_cod'] 			= $_POST['con_solicitacao'];
			$aux2['sol_status'] 		= $_POST['con_sol_stts'];
			$aux2['cli_cod'] 			= $_POST['con_cliente'];
			$aux2['ati_solicitante']	= mb_strtoupper($_POST['ati_solicitante'], 'UTF-8');
			$aux2['ati_cargo']			= mb_strtoupper($_POST['ati_cargo'], 'UTF-8');
			$aux2['ati_tempo']			= $_POST['ati_tempo'];
			$aux2['afr_cod']			= 1;
			$aux2['afr_cod']			= 7;
			
			$data->tabela = 'atividade';
			$data->add($aux2);

			$sql = 'UPDATE solicitacao SET sol_status ='.$aux2['sol_status'].' WHERE sol_cod = '.$aux2['sol_cod'];
			$data->executaSQL($sql);
		}
		//Inserindo na tabela conta_anexo
		for($i = 0; $i < $_POST['qtd_pc']; $i++){

			$arquivo = $_FILES['can_anexo_'.$i];

			$local_arquivo = "arquivos/prestacao-de-contas/".$POST['con_estabelecimento_'.$i].'_'.date('Ymdhis').$arquivo['name'];
			$moved = move_uploaded_file($arquivo['tmp_name'], $local_arquivo);
	
			$aux3['can_anexo'] = '';
			if($moved){ 
				$aux3['can_anexo'] = $local_arquivo;
			}

			$aux3['con_cod'] 	= $id;
			$aux3['can_estab'] 	= mb_strtoupper($_POST['can_estabelecimento_'.$i], 'UTF-8');
			$aux3['can_valor'] 	= $_POST['can_valor_'.$i];

			$data->tabela = 'conta_anexo';
			$data->add($aux3);

		}

		echo '<script>window.location = "?module=contas&acao=lista&ms=1";</script>';
		break;
	
}
