<?php

	require_once('../../../library/MySql.php'); // Conecta ao BD
	require_once('../../../library/DataManipulation.php');
	//
	$data = new DataManipulation();

	$sql = "SELECT vei_nome, vei_cod FROM veiculo WHERE vei_situacao = 1";
	$veiculo = $data->find('dynamic', $sql);

	$data_ini = $_GET['data_ini'];
	$hora_ini = $_GET['hora_ini'];

	$periodo_ini = $data_ini . ' ' . $hora_ini;	
	
	$data_fim = $_GET['data_fim'];
	$hora_fim = $_GET['hora_fim'];

	$periodo_fin = $data_fim . ' ' . $hora_fim;


	switch($_GET['opt']){
		case '1':
			// Retorna somente os veículos disponíveis no período selecionado
			$sql = "SELECT vei_cod, vei_nome
					FROM veiculo
					WHERE vei_cod NOT IN (
						SELECT vei_cod
						FROM agenda
						WHERE (age_hora_ini <= '".$periodo_ini."' AND age_hora_fim >= '".$periodo_ini."')
							OR (age_hora_ini <= '".$periodo_fin."' AND age_hora_fim >= '".$periodo_fin."')
							OR (age_hora_ini >= '".$periodo_ini."' AND age_hora_fim <= '".$periodo_fin."')
					)
						AND vei_situacao = 1
					ORDER BY vei_nome";
			$result = $data->find('dynamic', $sql);

			echo '	
				<div class="col-sm-2">
					<label class="control-label" for="vei_cod">Veículo:</label>
					<select name="vei_cod" type="text" class="form-control blockenter" id="vei_cod" required>
						<option value="" selected>--SELECIONE--</option>';
							for ($i = 0; $i < count($result); $i++) {
								echo '<option value="' . $result[$i]['vei_cod'] . '">' . $result[$i]['vei_nome'] . '</option>';
							}
				echo'
					</select>
				</div>
				';
		break;

		case '2':
			$sql = "SELECT
						age_cod
					FROM
						agenda
						WHERE 
							age_tipo = 2 AND ((age_hora_ini <= '".$periodo_ini."' AND age_hora_fim >= '".$periodo_ini."')
							OR (age_hora_ini <= '".$periodo_fin."' AND age_hora_fim >= '".$periodo_fin."')
							OR (age_hora_ini >= '".$periodo_ini."' AND age_hora_fim <= '".$periodo_fin."'))
					";
			$result = $data->find('dynamic', $sql);

			// 0 = disponível 1 = ocupado
			if(count($result) > 0){
				echo '<p style="color: red; font-weight: bold; padding-top: 2%">Sala ocupada</p>';
				echo '<input type="hidden" name="ocupado" id="ocupado" value="1">';	
			}else{
				echo '<p style="color: green; font-weight: bold; padding-top: 2%">Sala Disponível</p>';
				echo '<input type="hidden" name="ocupado" id="ocupado" value="0">';	
			}
		break;


	}
?>


