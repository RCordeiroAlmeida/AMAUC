<?php

require_once('../../../library/MySql.php'); // Conecta ao BD
require_once('../../../library/DataManipulation.php');
//
$data = new DataManipulation();
//	
if ($_GET['age_cod'] != '') {
	$sql = "SELECT * FROM agenda WHERE age_cod = " . $_GET['age_cod'];
	$result = $data->find('dynamic', $sql);

	$aux_ini = explode(" ", $result[0]['age_hora_ini']);

	$data_ini = $aux_ini[0];
	$hora_ini = $aux_ini[1];

	$aux_fim = explode(" ", $result[0]['age_hora_fim']);

	$data_fim = $aux_fim[0];
	$hora_fim = $aux_fim[1];

	$sql = "SELECT agt_descricao, agt_cod FROM agenda_tipo WHERE agt_situacao = 1";
	$tipo = $data->find('dynamic', $sql);

	$sql = "SELECT vei_nome, vei_cod FROM veiculo WHERE vei_situacao = 1";
	$veiculo = $data->find('dynamic', $sql);

?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
		<h4 class="modal-title"><?php echo $result[0]['age_titulo'] ?></h4>
	</div>
	<div class="modal-body">
		<form role="form" action="?module=agendamento&acao=grava" id="MyForm" method="post" enctype="multipart/form-data" name="MyForm">

			<div class="row form-group">

				<div class="col-sm-2">
					<label class="control-label" for="data_ini">Data Início:</label>
					<input name="data_ini" type="date" class="form-control blockenter" value="<?php echo $data_ini ?>" id="data_ini" style="text-transform:uppercase;" disabled />
				</div>

				<div class="col-sm-2">
					<label class="control-label" for="age_hora_ini">Hora Início:</label>
					<input name="age_hora_ini" type="time" class="form-control blockenter" value="<?php echo $hora_ini ?>" id="age_hora_ini" style="text-transform:uppercase;" disabled />
				</div>

				<div class="col-sm-2">
					<label class="control-label" for="data_fim">Data Final:</label>
					<input name="data_ini" type="date" class="form-control blockenter" value="<?php echo $data_fim ?>" id="data_fim" style="text-transform:uppercase;" disabled />
				</div>

				<div class="col-sm-2">
					<label class="control-label" for="age_hora_fim">Hora Fim:</label>
					<input name="age_hora_fim" type="time" class="form-control blockenter" value="<?php echo $hora_fim ?>" id="age_hora_fim" style="text-transform:uppercase;" disabled />
				</div>

				<div class="col-sm-2">
					<label class="control-label" for="data_fim">Tipo Agendamento:</label>
					<select name="age_tipo" type="text" class="form-control blockenter" id="agt_cod" onchange="habilita(this.value)" disabled>
						<option value="" selected>--SELECIONE--</option>
						<?php
						for ($i = 0; $i < count($tipo); $i++) {
							if ($result[0]['age_tipo'] == $tipo[$i]['agt_cod']) {
								echo '<option value="' . $tipo[$i]['agt_cod'] . '" selected>' . $tipo[$i]['agt_descricao'] . '</option>';
							} else {
								echo '<option value="' . $tipo[$i]['agt_cod'] . '">' . $tipo[$i]['agt_descricao'] . '</option>';
							}
						}
						?>
					</select>
				</div>

				<div class="col-sm-2">
					<label class="control-label" for="data_fim">Veículo:</label>
					<select name="vei_cod" type="text" class="form-control blockenter" id="vei_cod" disabled>
						<option value="" selected>--SELECIONE--</option>
						<?php
						for ($i = 0; $i < count($veiculo); $i++) {
							if ($result[0]['vei_cod'] == $veiculo[$i]['vei_cod']) {
								echo '<option value="' . $veiculo[$i]['vei_cod'] . '" selected>' . $veiculo[$i]['vei_nome'] . '</option>';
							} else {
								echo '<option value="' . $veiculo[$i]['vei_cod'] . '" >' . $veiculo[$i]['vei_nome'] . '</option>';
							}
						}
						?>
					</select>
				</div>

			</div>
			<div class="row form-group">
				<div class="col-sm-12">
					<label for="age_titulo" class="control-label">Título:</label>
					<input name="age_titulo" type="text" class="form-control blockenter" value="<?php echo $result[0]['age_titulo'] ?>" id="age_titulo" style="text-transform: uppercase" disabled>
				</div>
			</div>


			<div class="row form-group">

				<div class="col-sm-12">
					<label for="age_descricao" class="control-label">Descrição:</label>
					<textarea name="age_descricao" type="text" class="form-control blockcenter" id="age_descricao" style="text-transform:uppercase; height: 200px;" disabled><?php echo $result[0]['age_descricao'] ?></textarea>
				</div>
			</div>
		</form>
	</div>
	<div class="modal-footer">

		<?php 
			$hoje = strtotime(date('Y-m-d H:i:s'));
			$data_age = strtotime($data_fim);

			if($hoje < $data_age){
				
				if($result[0]['usu_cod'] == $_GET['user'])
					echo '<button class="btn-success btn" onclick="editar('.$_GET['age_cod'].')"><i class="fa fa-pencil"></i> Editar</button>';
				}

			}else{

				if($_GET['permission'] == 1){
					echo '<button class="btn-success btn" onclick="editar('.$_GET['age_cod'].')"><i class="fa fa-pencil"></i> Editar</button>';
				}
				
			}

			if($hoje < $data_age){
				echo '<button class="btn-danger btn" onclick="deleta('.$_GET['age_cod'] . ', \'' . $result[0]['age_titulo'] . '\''.');"><i class="fa fa-trash"></i> Excluir</button>'; 
			}
		?>
	</div>
