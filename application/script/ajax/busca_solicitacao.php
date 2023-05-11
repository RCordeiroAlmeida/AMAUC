<?php

    require_once('../../../library/MySql.php'); // Conecta ao BD
	require_once('../../../library/DataManipulation.php');    

    $data = new DataManipulation();

    var_dump($_GET);

?>
        <div class="modal-content animated bounceInRight" >
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
				<h4 class="modal-title">Prestação de Contas</h4>
			</div>
			<div class="modal-body">
				<div class="row form-group">
					
					<div class="col-sm-4">
                        <label class="control-label" for="con_funcionario">Funcionário:</label>
                        <input type="text" class="form-control blockenter" id="fun_cod" name="fun_cod" value="<?php echo $conta[0]['usu_nome'] ?>" disabled>
                    </div>

					<div class="col-sm-4">
                        <label class="control-label" for="con_setor">Setor:</label>
                        <input type="text" class="form-control blockenter" id="fun_cod" name="con_setor" value="<?php echo $conta[0]['set_nome'] ?>" disabled>
                    </div>

					<div class="col-sm-2">
                        <label class="control-label" for="con_data_ini">Data Inicial:</label>
                        <input type="text" class="form-control blockenter" id="con_data_ini" name="con_data_ini" value="<?php echo $conta[0]['con_data_ini'] ?>" disabled>
                    </div>

					<div class="col-sm-2">
                        <label class="control-label" for="con_data_fim">Data Final:</label>
                        <input type="text" class="form-control blockenter" id="con_data_fim" name="con_data_fim" value="<?php echo $conta[0]['con_data_fim'] ?>" disabled>
                    </div>
					
				</div>

				<?php
					switch($conta[0]['con_veiculo']){
						case 1:
				?>
							<div class="row form-group">
						
								<div class="col-sm-4">
									<label class="control-label" for="con_veiculo">Tipo de Veículo:</label>
									<input class="form-control blockenter" id="con_veiculo" name="con_veiculo" value="Empresa" disabled>
								</div>
							
								<div class="col-sm-4">
									<label class="control-label" for="con_data">Veículo:</label>
									<input type="text" class="form-control blockenter" id="con_data" name="con_data" value="<?php echo $veiculo[0]["vei_nome"] ?>" disabled>
								</div>

								<div class="col-sm-2">
									<label class="control-label" for="con_data">KM Inicial:</label>
									<input type="text" class="form-control blockenter" id="con_vei_km_ini" name="con_vei_km_ini" value="<?php echo $veiculo[0]["con_vei_km_ini"] ?>" disabled>
								</div>

								<div class="col-sm-2">
									<label class="control-label" for="con_data">KM Final:</label>
									<input type="text" class="form-control blockenter" id="con_vei_km_fim" name="con_vei_km_fim" value="<?php echo $veiculo[0]["con_vei_km_fim"] ?>" disabled>
								</div>
							</div>
					<?php
							break;
						case 2:
					?>
							<div class="row form-group">
								<div class="col-sm-4">
									<label class="control-label" for="con_veiculo">Tipo de Veículo:</label>
									<input class="form-control blockenter" id="con_veiculo" name="con_veiculo" value="Próprio" disabled>
								</div>

								<div class="col-sm-4">
									<label class="control-label" for="con_vei_placa">Placa:</label>
									<input type="text" class="form-control blockenter" id="con_vei_placa" name="con_vei_placa" value="<?php echo $veiculo[0]["con_vei_placa"] ?>" disabled>
								</div>

								<div class="col-sm-2">
									<label class="control-label" for="con_data">KM Inicial:</label>
									<input type="text" class="form-control blockenter" id="con_vei_km_ini" name="con_vei_km_ini" value="<?php echo $veiculo[0]["con_vei_km_ini"] ?>" disabled>
								</div>

								<div class="col-sm-2">
									<label class="control-label" for="con_data">KM Final:</label>
									<input type="text" class="form-control blockenter" id="con_vei_km_fim" name="con_vei_km_fim" value="<?php echo $veiculo[0]["con_vei_km_fim"] ?>" disabled>
								</div>
							</div>
					<?php
							break;
						case 3:
					?>
							<div class="row form-group">
								<div class="col-sm-4">
									<label class="control-label" for="con_veiculo">Tipo de Veículo:</label>
									<input class="form-control blockenter" id="con_veiculo" name="con_veiculo" value="Outro" disabled>
								</div>
								
								<div class="col-sm-4">
									<label class="control-label" for="con_veiculo">Qual:</label>
									<input class="form-control blockenter" id="con_veiculo" name="con_veiculo" value="<?php echo $veiculo[0]["con_vei_outro"] ?>" disabled>
								</div>
							</div>
					<?php
					}
					?>


				<div class="row form-group">
					<div class="col-sm-6">
                        <label class="control-label" for="con_destino">Destino:</label>
                        <input type="text" class="form-control blockenter" id="con_destino" name="con_destino" value="<?php echo $conta[0]['con_destino'] ?>" disabled>
                    </div>

					<div class="col-sm-6">
                        <label class="control-label" for="cli_nome">Cliente:</label>
                        <input type="text" class="form-control blockenter" id="cli_nome" name="cli_nome" value="<?php echo $conta[0]['cli_nome'] ?>" disabled>
                    </div>
				</div>
				<div class="row form-group">
					<div class="col-sm-12">
                        <label class="control-label" for="con_descricao">Descrição:</label>
                        <textarea type="text" class="form-control blockenter" id="con_descricao" name="con_descricao" style="white-space: pre-wrap; height: 200px;" disabled><?php echo $conta[0]['con_descricao'] ?></textarea>
                    </div>
				</div>


				<?php
					for($i=0; $i < count($anexo); $i++) {?>
						<div class="row form-group">
							<div class="col-sm-7">
								<?php 
									if($i == 0){
										echo '<label class="control-label" for="can_estab">Estabelecimento:</label>';
									} 
								?>
								<input type="text" class="form-control blockenter" id="can_estab" name="can_estab" value="<?php echo $anexo[$i]['can_estab'] ?>" disabled>
							</div>

							<div class="col-sm-3">
								<?php 
									if($i == 0){
										echo '<label class="control-label" for="can_valor">Valor:</label>';
									} 
								?>
								<input type="number" class="form-control blockenter" id="can_valor" name="can_valor" value="<?php echo $anexo[$i]['can_valor'] ?>" disabled>
							</div>
							

							<div class="col-sm-2">
								<?php 
									if($i == 0){
										echo '<label class="control-label" >&nbsp;</label>';
									} 
								?>
								<a style="text-align: center;" class="btn btn-success btn-block" target="_blank" role="button" href="<?php echo $anexo[$i]['can_anexo'] ?>">Ver Anexo</a>
							</div>
							
						</div>
					
					<?php } ?>
			</div>
		</div>