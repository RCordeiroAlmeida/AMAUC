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

switch($_POST['age_tipo']){ 
	case 1:
		$where = " WHERE a.age_tipo = 1"; // Veículo 
		$join = " INNER JOIN veiculo as v ON (v.vei_cod = a.vei_cod)";
		$atributo = "v.vei_nome, ";
	break;

	case 2:
		$where = " WHERE a.age_tipo = 2"; // sala
		
	break;

	default:
		$where = " WHERE a.age_tipo != 1 AND age_tipo != 2";
	break;
}

$data_ini = explode(' ', $_POST['data_ini']);
$data_ini = $data_ini[0];


$data_fim = explode(' ', $_POST['data_fim']);
$data_fim = $data_fim[0];

$where .= '  AND a.age_hora_ini BETWEEN "'.$data_ini.'" AND "'.$data_fim.'"';


$sql = "SELECT
			a.age_cod,
			a.age_hora_ini,
			a.age_hora_fim,
			a.age_titulo,
			a.age_descricao,
			a.vei_cod,".
			$atributo."
			a.usu_cod,
			u.usu_nome
		FROM
			agenda as a
			INNER JOIN usuario as u ON (u.usu_cod = a.usu_cod)
			".
			$join . $where;


$result = $data->find('dynamic', $sql);

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
				<table style="border-collapse: collapse; width: 100%; margin-top: 20px; margin-bottom: 20px;">
					<thead>
						<tr style="border: 1px solid black; padding: 8px; text-align: left;">
							<th style="width: 5%;">Cód.</th>
							<th style="width: 20%;">Início | Fim</th>
							<th style="width: 10%;">Título</th>
							<th style="width: 30%;">Descricao</th>
							<th style="width: 15%;">Usuário</th>
						</tr>
					</thead>
				<tbody>';

				for($i = 0; $i < count($result); $i++){
					$aux_ini = explode(' ', $result[$i]['age_hora_ini']);
					$data_ini = implode("/", array_reverse(explode('-', $aux_ini[0]))) . ' ' . $aux_ini[1];

					$aux_fim = explode(' ', $result[$i]['age_hora_fim']);
					$data_fim = implode("/", array_reverse(explode('-', $aux_fim[0]))) . ' ' . $aux_fim[1];
					
					$html .= '
					<tr>
						<td style="border: 1px solid black; padding: 8px;">' . str_pad($result[$i]['age_cod'], 4, '0', STR_PAD_LEFT) . '</td>
						<td style="border: 1px solid black; padding: 8px;">' . $data_ini . ' | '. $data_fim .'</td>
						<td style="border: 1px solid black; padding: 8px;">' . $result[$i]['age_titulo'] . '</td>
						<td style="border: 1px solid black; padding: 8px;">' . $result[$i]['age_descricao']. '</td>
						<td style="border: 1px solid black; padding: 8px;">' . $result[$i]['usu_nome'] . '</td>
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
