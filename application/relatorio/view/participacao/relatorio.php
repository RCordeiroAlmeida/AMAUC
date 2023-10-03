<?php
require_once('../../../../library/vendor/autoload.php');
require_once('../../../../library/MySql.php');
require_once('../../../../library/DataManipulation.php');

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$data = new DataManipulation();

$logoPath = file_get_contents('../../../images/logo-amauc.png');
$logoData = base64_encode($logoPath);
$logoTag = '<img src="data:image/png;base64,' . $logoData . '" width="200"/>';

$dompdf->setPaper('A4', 'landscape');


$sql = "SELECT * FROM participacao WHERE par_data_ini >='".$_POST['par_data_ini']."' AND par_data_fim <= '". $_POST['par_data_fim']."'";
$participacao = $data->find('dynamic', $sql);


$html = '
    <html>
        <head>
            <title>Relatatório de Solicitações</title>

			<style>
				.assinatura {
					position: fixed;
					bottom: 0;
					left: 0;
					right: 0;
					text-align: center;
					margin-left: auto;
					margin-right: auto;
				}
			</style>
        </head>
        <body style="font-family: Arial; font-size: 0.8em">
			<table style="margin-left: auto; margin-right: auto">
				<thead>
					<tr style="text-align: center">
						<th colspan="2" style="text-align: center;">
							' . $logoTag . '<br/><br/>
							Estado de Santa Catarina<br/>
							AMAUC - Associação dos Municípios do Alto Uruguai Catarinense
						</th>
					</tr>
					<tr style="text-align: center">
						<th colspan="2" style="text-align: center; font-size: 1.2em; padding-top: 10px">
							Relatório de Solicitações
						</th>
					</tr>
				</thead>
			</table>
			<h4>Emitido em: ' . date('d/m/Y') . ' | Por: ' . $participacao['usu_nome'] . '</h4>
				<table style="border-collapse: collapse; width: 100%; margin-top: 20px; margin-bottom: 20px;">
					<thead>
						<tr style="border: 1px solid black; padding: 8px; text-align: left;">
							<th style="width: 10%;">Data</th>
							<th style="width: 30%;">Horário</th>
							<th style="width: 15%;">Forma de participação</th>
							<th style="width: 15%;">Tipo de reunião</th>
							<th style="width: 20%;">Entidade</th>
							<th style="width: 20%;">Local</th>
							<th style="width: 20%;">Descrição</th>
						</tr>
					</thead>
				<tbody>';
					for ($i = 0; $i < count($participacao); $i++) {
						$participacao[$i]['par_data_ini'] = implode("/", array_reverse(explode("-", $participacao[$i]['par_data_ini'])));
						$participacao[$i]['par_data_fim'] = implode("/", array_reverse(explode("-", $participacao[$i]['par_data_fim'])));

						switch ($participacao[$i]['par_forma']) {
							case 0:
								$participacao[$i]['par_forma'] = "Organizador(a)";
								break;

							case 1:
								$participacao[$i]['par_forma'] = "Representante";
								break;

							case 2:
								$participacao[$i]['par_forma'] = "Participante";
								break;

							case 3:
								$participacao[$i]['par_forma'] = "Curso/Capacitação";
								break;
						}

						
						switch ($participacao[$i]['par_tipo']) {
							case 0:
								$participacao[$i]['par_tipo'] = "Presencial";
								break;

							case 1:
								$participacao[$i]['par_tipo'] = "Virtual";
								break;

							case 2:
								$participacao[$i]['par_tipo'] = "Híbrida";
								break;
						}
				$html .= '
					<tr>
						<td style="border: 1px solid black; padding: 8px;">' . str_pad($participacao[$i]['par_cod'], 4, '0', STR_PAD_LEFT) . '</td>
						<td style="border: 1px solid black; padding: 8px;">' . $participacao[$i]['par_data_ini'] . ' ~ '.$participacao[$i]['par_data_fim'].'</td>
						<td style="border: 1px solid black; padding: 8px;">' . $participacao[$i]['par_descricao'] . '</td>
						<td style="border: 1px solid black; padding: 8px;">' . $participacao[$i]['par_status'] . '</td>
						<td style="border: 1px solid black; padding: 8px;">' . $participacao[$i]['par_nome'] . '</td>
						<td style="border: 1px solid black; padding: 8px;">' . $participacao[$i]['par_nome'] . '</td>
					</tr>';
}

$html .= '
</tbody>

</table>
<div class="assinatura" style="text-align: center; margin-left: auto; margin-right: auto">
    <p>___________________________________</p>
    <h5>Assinatura</h5>
</div>';
$dompdf->loadHtml($html);

// Renderiza o documento PDF
$dompdf->render();

// Exibe o documento PDF no navegador
$dompdf->stream('listagem-de-solicitacoes.pdf', array('Attachment' => false));
