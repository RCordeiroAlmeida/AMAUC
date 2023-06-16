
<?php	

	require_once('../../../library/MySql.php'); // Conecta ao BD
	require_once('../../../library/DataManipulation.php'); 
	//
	$data = new DataManipulation();
	//	
	if($_GET['id'] != ''){
        switch($_GET['id']){
            case '1': //VEICULO DA EMPRESA
                $sql = "SELECT vei_cod, vei_nome FROM veiculo WHERE vei_situacao = 1";
                $veiculo = $data->find('dynamic', $sql);
            
                ?>
                      

            
                    <div class="col-sm-4">
                        <label class="control-label" for="sol_data">Veículo:</label>
                        <select name="con_vei_cod" type="text" class="form-control blockenter" id="con_vei_cod" required>
                            <option value="">--Selecione--</option>
                            <?php
                            for ($i = 0; $i < count($veiculo); $i++) {
                                echo '<option value="' . $veiculo[$i]['vei_cod'] . '">' . $veiculo[$i]['vei_nome'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label class="control-label" for="con_vei_km_ini">KM inicial:</label>
                        <input name="con_vei_km_ini" type="number" class="form-control blockenter" id="con_vei_km_ini" min="0" max="999999" step="0.1"/>
                    </div>
					<div class="col-sm-4">
                        <label class="control-label" for="con_vei_km_fim">KM final:</label>
                        <input name="con_vei_km_fim" type="number" class="form-control blockenter" id="con_vei_km_fim" min="0" max="999999" step="0.1" />
                    </div>

                <?php                
                break;
            case '2': //VEICULO PROPRIO ?>
					<div class="col-sm-4">
                        <label class="control-label" for="con_vei_placa">Placa:</label>
                        <input name="con_vei_placa" type="text" class="form-control blockenter" id="con_vei_placa" style="text-transform: uppercase;" maxlength="7" required/>
                    </div>
					
                    <div class="col-sm-4">
                        <label class="control-label" for="con_vei_km_ini">KM inicial:</label>
                        <input name="con_vei_km_ini" type="number" class="form-control blockenter" id="con_vei_km_ini" min="0" max="999999" step="0.1" />
                    </div>

					<div class="col-sm-4">
                        <label class="control-label" for="con_vei_km_fim">KM final:</label>
                        <input name="con_vei_km_fim" type="number" class="form-control blockenter" id="con_vei_km_fim" min="0" max="999999" step="0.1" />
                    </div>
			<?php 
                break;
            case '3': //OUTRO ?>
					<div class="col-sm-5">
                        <label class="control-label" for="con_vei_outro">Qual:</label>
                        <input name="con_vei_outro" type="text" class="form-control blockenter" id="con_vei_outro" required/>
                    </div>
            <?php
                break; 
			}}?>

<script>
    $(document).ready(function() {
        alert("kaljsdn");
        $("#con_vei_placa").mask("aaa-9999");
    });
</script>
