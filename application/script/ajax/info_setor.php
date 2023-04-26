<?php

require_once('../../../library/MySql.php'); // Conecta ao BD
require_once('../../../library/DataManipulation.php');
//
$data = new DataManipulation();

$sql = "SELECT set_cod, set_nome, set_descricao FROM setor WHERE set_situacao = 1";
$setor = $data->find('dynamic', $sql);

//	
?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
	</div>
	<div class="modal-body">
	<h4 class="modal-title" style="text-align: center; padding-bottom: 3%">Sobre os Setores</h4>
		<?php
			for($i = 0; $i<count($setor); $i++){
		?>
				<div class="row form-group">
					<h4><?php  echo $setor[$i]['set_nome'] ?></h4>
					<p><?php echo $setor[$i]['set_descricao'] ?></p>
				</div>
		<?php
			}
		?>
	</div>
	

