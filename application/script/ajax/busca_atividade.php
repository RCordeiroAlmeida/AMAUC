<?php	

	require_once('../../../library/MySql.php'); // Conecta ao BD
	require_once('../../../library/DataManipulation.php'); 
	//
	$data = new DataManipulation();
	//	
	if($_GET['ati_cod'] != ''){
		$desabilita = "";
		if($_GET['permission'] == 3){//CLIENTE
			$desabilita = "disabled";
		}
		
		$sql = "SELECT *
				FROM atividade
				WHERE ati_cod = ".$_GET['ati_cod'];

		$result = $data->find('dynamic', $sql);  

		if($result[0]['sol_status'] != 1){ //CONCLUIDO OU CANCELADO
			$desabilita = "disabled";
		}

		$sql = "SELECT * FROM solicitacao WHERE sol_cod =" . $result[0]['sol_cod'];
		$solicitacao = $data->find('dynamic', $sql);

		$sql = "SELECT atp_cod, atp_descricao FROM atividade_tipo WHERE atp_situacao = 1";
		$tipo_atividade = $data->find('dynamic', $sql);

		$sql = "SELECT afr_cod, afr_descricao FROM atividade_forma WHERE afr_situacao = 1";
		$forma_atendimento = $data->find('dynamic', $sql);

		$atividade = $data->find('dynamic', $sql);
		

		if(count($result) > 0){
?>
			<form role="form" action="?module=solicitacao&acao=update_atividade" id="MyForm" method="post" enctype="multipart/form-data">

				<input type="hidden" name="ati_cod" value="<?php echo $result[0]['ati_cod'] ?>" />	
				<input type="hidden" name="sol_cod" value="<?php echo $result[0]['sol_cod'] ?>" />
				<input type="hidden" name="cli_cod" value="<?php echo $result[0]['cli_cod'] ?>" />


				<div class="modal-content animated bounceInRight">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
						<h4 class="modal-title">Detalhes do Atendimento</h4>
					</div>
					<div class="modal-body">
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" for="ati_data">Data:</label>
								<input name="ati_data" type="date" class="form-control blockenter" id="ati_data" style="text-transform:uppercase; text-align: center;" value="<?php echo $result[0]['ati_data']?>" disabled/>
							</div>

							<div class="col-sm-3">
								<label class="control-label">Tipo atividade:</label>
								<select name="atp_cod" type="text" class="form-control blockenter" id="atp_cod" required <?php echo $desabilita ?>>
									<option value="">--Selecione--</option>
									<?php
									for ($i = 0; $i < count($tipo_atividade); $i++) {
										if($tipo_atividade[$i]['atp_cod'] == $result[0]['atp_cod']){
											echo '<option value="' . $tipo_atividade[$i]['atp_cod'] . '" selected>' . $tipo_atividade[$i]['atp_descricao'] . '</option>';
										}else{
											echo '<option value="' . $tipo_atividade[$i]['atp_cod'] . '" >' . $tipo_atividade[$i]['atp_descricao'] . '</option>';
										}
									}
									?>
								</select>
							</div>

							<div class="col-sm-3">
								<label class="control-label">Forma atendimento:</label>
								<select name="afr_cod" type="text" class="form-control blockenter" id="afr_cod" <?php echo $desabilita ?> required>
									<option value="">--Selecione--</option>
									<?php
									for ($i = 0; $i < count($forma_atendimento); $i++) {
										if($forma_atendimento[$i]['afr_cod'] == $result[0]['afr_cod']){
											echo '<option value="' . $forma_atendimento[$i]['afr_cod'] . '" selected>' . $forma_atendimento[$i]['afr_descricao'] . '</option>';
										}else{	
											echo '<option value="' . $forma_atendimento[$i]['afr_cod'] . '">' . $forma_atendimento[$i]['afr_descricao'] . '</option>';
										}
									}
									?>
								</select>
							</div>

							

							<div class="col-sm-2">
								<label class="control-label">Status:</label>
								<select name="sol_status" type="text" class="form-control blockenter" id="sol_status" <?php echo $desabilita ?>>

									<?php 
										switch($result[0]['sol_status']){
											case '1':
												echo '<option value="1" selected>Em Andamento</option>
												<option value="2">Concluído</option>
												<option value="3">Cancelado</option>';
												break;
											case '2':
												echo '<option value="1">Concluido</option>
												<option value="2" selected>Concluído</option>
												<option value="3">Cancelado</option>';
												break;
											case '3':
												echo '<option value="1">Cancelado</option>
												<option value="2">Concluído</option>
												<option value="3" selected>Cancelado</option>';
											break;
										}
									?>
									
								</select>
							</div>
							<div class="col-sm-2">
                                <label class="control-label">Tempo de Execução:</label>
                                <input class="form-control" name="ati_tempo" id="ati_tempo" rows="5" value="<?php echo $result[0]['ati_tempo']?>" <?php echo $desabilita ?> required/>
                            </div>
						</div>

						<div class="row form-group">
							<div class="col-sm-12">
								<label class="control-label">Descrição da atividade:</label>
								<textarea class="form-control" name="ati_descricao" id="ati_descricao" placeholder="Descreva aqui o que foi feito neste atendimento" rows="5" <?php echo $desabilita ?> required><?php echo $result[0]['ati_descricao']?></textarea>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-sm-8 hidden-xs"></div>
							<?php if($_GET['user'] == $result[0]['usu_cod']){
									if($result[0]['sol_status'] == 1){
								?>
								<div class="col-sm-2 col-xs-6">
									<button type="submit" id="salvar2" class="btn btn-primary btn-block"><i class="fa fa-check"></i> Salvar</button>
								</div>
							<?php }} ?>
							<div class="col-sm-2 col-xs-6">
								<button type="button" class="btn btn-default btn-block" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
							</div>
						</div>
					</div>
				</div>
			</form>
<?php
		}
	}	
?>
<script>
	$(document).ready(function() {
		$("#ati_tempo").mask("99:99");
	});
</script>