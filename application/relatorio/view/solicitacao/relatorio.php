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

$usuario = $_POST['usuario'];

if ($_POST['cli_cod'] != '') {
	$where = " WHERE c.cli_cod = " . $_POST['cli_cod'];
}

if ($_POST['set_cod'] != '') {
	if ($where != '') {
		$where .= " AND s.set_cod = " . $_POST['set_cod'];
	} else {
		$where = "WHERE s.set_cod = " . $_POST['set_cod'];
	}
}

if ($_POST['sol_status'] != '') {
	if ($where != '') {
		$where .= " AND s.sol_status = " . $_POST['sol_status'];
	} else {
		$where = "WHERE s.sol_status = " . $_POST['sol_status'];
	}
}

if ($_POST['data_ini'] != '') {
	if ($where != '') {
		$where .= " AND s.sol_data >= '" . $_POST['data_ini']."'";
	} else {
		$where = "WHERE s.sol_data >= '" . $_POST['data_ini']."'";
	}
}

$sql = "SELECT
            s.sol_status,
            s.sol_data,
            s.sol_cod,
            s.sol_descricao,
            s.cli_cod,
            s.set_cod,
            se.set_nome,
            c.cli_nome
        FROM
            solicitacao AS s
            INNER JOIN cliente AS c ON s.cli_cod = c.cli_cod
            INNER JOIN setor as se ON s.set_cod = se.set_cod
        $where";

$solicitacao = $data->find('dynamic', $sql);

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
			<h4>Emitido em: ' . date('d/m/Y') . ' | Por: ' . $usuario . '</h4>
				<table style="border-collapse: collapse; width: 100%; margin-top: 20px; margin-bottom: 20px;">
					<thead>
						<tr style="border: 1px solid black; padding: 8px; text-align: left;">
							<th style="width: 10%;">Data</th>
							<th style="width: 10%;">Código</th>
							<th style="width: 30%;">Descrição</th>
							<th style="width: 15%;">Status</th>
							<th style="width: 15%;">Setor</th>
							<th style="width: 20%;">Cliente</th>
						</tr>
					</thead>
				<tbody>';
					for ($i = 0; $i < count($solicitacao); $i++) {
						$solicitacao[$i]['sol_data'] = implode("/", array_reverse(explode("-", $solicitacao[$i]['sol_data'])));

						switch ($solicitacao[$i]['sol_status']) {
							case 0:
								$solicitacao[$i]['sol_status'] = "Pendente";
								break;

							case 1:
								$solicitacao[$i]['sol_status'] = "Andamento";
								break;

							case 2:
								$solicitacao[$i]['sol_status'] = "Concluído";
								break;

							case 3:
								$solicitacao[$i]['sol_status'] = "Cancelado";
								break;
						}

				$html .= '
					<tr>
						<td style="border: 1px solid black; padding: 8px;">' . $solicitacao[$i]['sol_data'] . '</td>
						<td style="border: 1px solid black; padding: 8px;">' . str_pad($solicitacao[$i]['sol_cod'], 4, '0', STR_PAD_LEFT) . '</td>
						<td style="border: 1px solid black; padding: 8px;">' . $solicitacao[$i]['sol_descricao'] . '</td>
						<td style="border: 1px solid black; padding: 8px;">' . $solicitacao[$i]['sol_status'] . '</td>
						<td style="border: 1px solid black; padding: 8px;">' . $solicitacao[$i]['set_nome'] . '</td>
						<td style="border: 1px solid black; padding: 8px;">' . $solicitacao[$i]['cli_nome'] . '</td>
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
