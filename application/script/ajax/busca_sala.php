<?php

	require_once('../../../library/MySql.php'); // Conecta ao BD
	require_once('../../../library/DataManipulation.php');
	//
	$data = new DataManipulation();

	$data_ini = $_GET['data_ini'];
	$hora_ini = $_GET['hora_ini'];

	$periodo_ini = $data_ini . ' ' . $hora_ini;
	
	$data_fim = $_GET['data_fim'];
	$hora_fim = $_GET['hora_fim'];

	$periodo_fin = $data_fim . ' ' . $hora_fim;

	// Retorna somente os veículos disponíveis no período selecionado
	$sql = "SELECT age_cod, age_titulo
			FROM agendamento
			WHERE age_tipo = 2 NOT IN (
				SELECT age_cod
				FROM agenda
				WHERE (age_hora_ini <= '".$periodo_ini."' AND age_hora_fim >= '".$periodo_ini."')
					OR (age_hora_ini <= '".$periodo_fin."' AND age_hora_fim >= '".$periodo_fin."')
					OR (age_hora_ini >= '".$periodo_ini."' AND age_hora_fim <= '".$periodo_fin."')
			)
				AND vei_situacao = 1
			ORDER BY vei_nome";
	echo $sql;
	
	$result = $data->find('dynamic', $sql);
?>

<div class="col-sm-2">
	<label class="control-label" for="vei_cod">Veículo:</label>
	<select name="vei_cod" type="text" class="form-control blockenter" id="vei_cod" required>
		<option value="" selected>--SELECIONE--</option>
		<?php
			for ($i = 0; $i < count($result); $i++) {
				echo '<option value="' . $result[$i]['vei_cod'] . '">' . $result[$i]['vei_nome'] . '</option>';
			}
		?>
	</select>
</div>
