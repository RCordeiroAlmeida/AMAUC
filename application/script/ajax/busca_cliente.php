<?php

	require_once('../../../library/MySql.php'); // Conecta ao BD
	require_once('../../../library/DataManipulation.php');
	//
	$data = new DataManipulation();
	//	
	$result = '';

	if ($_GET['cli_cod'] != '') {

		$sql = "SELECT
					sol_cod,
					sol_solicitante
				FROM
					solicitacao
				WHERE
					sol_status = 1 AND
					cli_cod = " . $_GET['cli_cod'];

		$result = $data->find('dynamic', $sql);

		if (count($result) > 0) {

			
?>
		<div class="col-sm-3">
			<label class="control-label">Código da Solicitação:</label>
			<select name="con_solicitacao" type="text" class="form-control blockenter" id="con_solicitacao">
				<option value="">--Selecione--</option>
				<?php
					for ($i = 0; $i < count($result); $i++) {
						echo '<option value="' . $result[$i]['sol_cod'] . '">' . str_pad( $result[$i]['sol_cod'], 4, '0', STR_PAD_LEFT).'</option>';
					}
				?>
			</select>
		</div>

		<div class="col-sm-2">
			<label class="control-label">Status:</label>
			<select name="con_sol_stts" type="text" class="form-control blockenter" id="con_sol_stts">
				<option value="">--Selecione--</option>
				<option value="1">Em Andamento</option>
				<option value="2">Concluído</option>
				
			</select>
		</div>

		<div class="col-sm-3">
			<label class="control-label" for="ati_solicitante">Solicitante:</label>
			<input type="text" class="form-control blockenter" id="ati_solicitante" name="ati_solicitante" style="text-transform:uppercase"></input>
		</div>

		<div class="col-sm-2">
			<label class="control-label" for="ati_cargo">Cargo:</label>
			<input type="text" class="form-control blockenter" id="ati_solicitante" name="ati_cargo" style="text-transform:uppercase"></input>
		</div>

		<div class="col-sm-2">
			<label class="control-label" for="ati_tempo">Tempo de Execução:</label>
			<input type="text" class="form-control blockenter" id="ati_tempo" name="ati_tempo"></input>
		</div>
<?php
		}
	}
?>
<script>
	$(document).ready(function() {
		$("#ati_tempo").mask("99:99");
	});
</script>