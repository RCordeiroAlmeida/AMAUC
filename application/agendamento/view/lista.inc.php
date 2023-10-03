<?php
	switch ($_GET[ms]) {
		case 1:
			echo 'toastr.success("Agendamento cadastrado com sucesso!", "Incluido!");';
			break;

		case 2:
			echo 'toastr.success("Agendamento atualizado com sucesso", "Atualizado!");';
			break;

		case 3:
			echo 'toastr.success("Agendamento excluido com sucesso", "Excluido!");';
			break;
	}

    if ($_SESSION['amauc_userPermissao'] != 1 && $_SESSION['amauc_userPermissao'] != 2) {
        echo '<script>window.location="?module=index&acao=logout"</script>';
    }
	

	if($_GET['filtro'] != ''){
		switch ($_GET['filtro']){
			case 1: // veiculos
				$sql = "SELECT a.*, v.vei_cor FROM agenda AS a JOIN veiculo AS v ON (a.vei_cod = v.vei_cod) WHERE a.age_tipo = 1 ";
				$event = $data->find('dynamic', $sql);
				
			break;
	
			case 2: //sala de reuniões
				$sql = "SELECT * FROM agenda WHERE age_tipo = 2";
				$event = $data->find('dynamic', $sql);
			break;
	
			case 3: //outros
				$sql = "SELECT * FROM agenda WHERE age_tipo != 1 AND age_tipo != 2";
				$event = $data->find('dynamic', $sql);
			break;

			default:
				$sql = "SELECT * FROM agenda";
				$event = $data->find('dynamic', $sql);
		
				$sql = "SELECT vei_cod, vei_nome FROM veiculo WHERE vei_situacao = 1";
				$veiculo = $data->find('dynamic', $sql);
			break;
		}
	}else{
		$sql = "SELECT * FROM agenda";
		$event = $data->find('dynamic', $sql);

		$sql = "SELECT vei_cod, vei_nome FROM veiculo WHERE vei_situacao = 1";
		$veiculo = $data->find('dynamic', $sql);
	}
?>


<script>
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: "slideDown",
        timeOut: 5000
    };

    <?php
        for($i=0; $i<count($event); $i++){
			switch ($event[$i]['age_tipo']){
                case 1: //veiculo
                    $age_tipo = "Veículo";
					$age_cor  = $event[$i]['vei_cor'];
					break;
                case 2: //sala
                    $age_tipo = "Sala de Reuniões";
					$age_cor  = "#d49308";
                    break;
                default: //outro
					$age_tipo = "Outro";    
					$age_cor  = "#08c0d4";
                    break;
            }

            $dados .= '{
                id: '.$event[$i]['age_cod'].',
                title: "'.$event[$i]['age_titulo'].'",
                start: "'.$event[$i]['age_hora_ini'].'",
                end: "'.$event[$i]['age_hora_fim'].'",
                color: "'.$age_cor.'",
                usu_cod: "'.$_SESSION['amauc_userId'].'",
				dt_ini: "'.$event[$i]['age_hora_ini'].'",
				dt_fim: "'.$event[$i]['age_hora_fim'].'",
				v_dt_fim: "'.strtotime($event[$i]['age_hora_fim']).'",
				v_hoje: "'.strtotime(date('Y-m-d H:i:s')).'",
				age_tipo: "'.$age_tipo.'",
				permission: "'.$_SESSION['amauc_userPermissao'].'",
            },';
        }
    ?>
</script>

<div class="row wrapper border-bottom white-bg page-heading" onunload="reload()">
    <div class="col-lg-6 col-xs-6">
        <h2>Novo agendamento</h2>
        <ol class="breadcrumb">
            <li class="active">
				<label>Filtros: </label>
				<button onclick="filtra(1)" class="btn btn-success">Veículos</button>
				<button onclick="filtra(2)" class="btn btn-warning">Sala de reuniões</button>
				<button onclick="filtra(3)" class="btn btn-info">Outros</button>
				<button onclick="filtra(4)" class="btn btn-danger">Resetar filtros</button>
            </li>
        </ol>
    </div>
    <div class="col-lg-6 col-xs-6" style="text-align:right;">
        <br /><br />
		<a href="?module=agendamento&acao=novo" class="btn btn-primary" style="height: 34px;">
            <span class="glyphicon glyphicon-plus-sign"></span> <span class="hidden-xs hidden-sm">Novo</span>
	</a>
    </div>
</div>
<a data-toggle='modal' data-target='#visualiza_agenda' id="abre-popup"></a>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div id="calendar"></div>
        </div>
    </div>
    <br />

	<div class="modal inmodal" id="visualiza_agenda" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
			<div class="modal-content animated bounceInRight">
				<div id="retorno_agenda"></div>
			</div>
		</div>
	</div>

	<script src="library/inspinia/js/plugins/fullcalendar/lang/pt-br.js"></script>
	
    <script>
		function filtra(filtro){
			window.location.href= "?module=agendamento&acao=lista&filtro="+filtro;
		}

		function reloadOpener() {
			// recarrega a página original quando o popup for fechado
			window.opener.location.reload();
		}
		
        function envia() {
			document.forms['MyForm'].submit();
		}
		
		function editar(id){
			window.location.href= "?module=agendamento&acao=edita_agendamento&id="+id;
		}

		function presta_conta(id){
			window.location.href="?module=contas&acao=novo&id="+id 
		}
		
		function deleta(id, nome) {
			var url = "?module=agendamento&acao=excluir_agendamento";
			bootbox.confirm("Deseja realmente excluir este agendamento?", function(result){
				if(result==true){
					nextPage(url, id);	
				}
			});
		}
		
	$(document).ready(function() {		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			locale: 'pt-br',
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			events: [
				<?php echo $dados;	?>
			],
			eventRender: function(event, element) {
				if(event.v_dt_fim > event.v_hoje){
					element.data('editable', true);
				}else{
					element.data('editable', false);
				}
			},
			eventClick: function(calEvent, jsEvent, view) {
				var age_data_ini, age_data_fim, selectVeiculo;
				
				//DATA HORA Inicio
				var aux_data = calEvent.dt_ini.split(' ');
				age_data_ini = aux_data[0];
				age_hora_ini = aux_data[1];

				//DATA HORA CHEGADA
				var aux_data = calEvent.dt_fim.split(' ');
				age_data_fim = aux_data[0];
				age_hora_fim = aux_data[1];

				
				url = 'application/script/ajax/visualiza_agenda.php?age_cod='+calEvent.id+'&user='+calEvent.usu_cod+'&permission='+calEvent.permission;
				div = 'retorno_agenda';
				ajax(url, div);

				document.getElementById("abre-popup").click();
			},
			
			eventDrop: function(event, dayDelta, minuteDelta, allDay, revertFunc) {
				var url = "?module=agendamento&acao=altera_data";

				bootbox.dialog({
					closeButton: false,
					title: "Alteração de data: " + event.title,
					message: '<form class="form-horizontal"> ' +
						'<input type="hidden" id="age_cod" name="age_cod" class="form-control" value="' + event.id + '" /> ' +

							'<div class="row form-group"> ' +
								'<div class="col-md-12" >' +
									'<span>Deseja mesmo alterar a data deste agendamento?</span>' +
								'</div>' +
							'</div>' +

							'<div class="row form-group"> ' +
								'<div class="col-md-6" >' +
									'<label class="control-label" for="age_data_ini">Data Inicial:</label>' +
									'<input type="text" readonly class="form-control" name="age_data_ini" id="age_data_ini" value="' + event.start.format('DD/MM/YYYY HH:mm:ss') + '" /> ' +
								'</div>' +
							
								'<div class="col-md-6" >' +
									'<label class="control-label" for="age_data_fim">Data Final:</label>' +
									'<input type="text" readonly class="form-control" name="age_data_fim" id="age_data_fim" value="' + event.end.format('DD/MM/YYYY HH:mm:ss') + '" /> ' +
								'</div>' +
							'</div>' +
						'</form>',
					buttons: {
						danger: {
							label: "Cancelar",
							className: "btn-default",
							callback: function() {
								nextPage('?module=agendamento&acao=lista', '');
							}
						},
						success: {
							label: "Confirmar",
							className: "btn-success",
							callback: function() {
								var age_cod = $('#age_cod').val();
								var age_data_ini = $('#age_data_ini').val();
								var age_data_fim = $('#age_data_fim').val();
								
								parametro = age_cod + ', ' + age_data_ini+ ', ' +age_data_fim;
								nextPage(url, parametro);
							}
						}
						
					}
				});
			}
		});
	});
    
    </script>