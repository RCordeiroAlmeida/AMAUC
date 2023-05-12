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

$dompdf->setPaper('A4', 'portrait');

$usuario = $_POST['usuario'];

if ($_POST['cli_cod'] != '') {
	$where = " WHERE c.cli_cod = " . $_POST['cli_cod'];
}

if ($_POST['set_cod'] != '') {
	if ($where != '') {
		$where .= " AND a.set_cod = " . $_POST['set_cod'];
	} else {
		$where = "WHERE a.set_cod = " . $_POST['set_cod'];
	}
}

if ($_POST['sol_status'] != '') {
	if ($where != '') {
		$where .= " AND a.sol_status = " . $_POST['sol_status'];
	} else {
		$where = "WHERE a.sol_status = " . $_POST['sol_status'];
	}
}

if ($_POST['data_ini'] != '') {
	if ($where != '') {
		$where .= " AND a.ati_data >= " . $_POST['data_ini'];
	} else {
		$where = "WHERE a.ati_data >= " . $_POST['data_ini'];
	}
}

if ($_POST['atp_cod'] != '') {
	if ($where != '') {
		$where .= " AND a.atp_cod = " . $_POST['atp_cod'];
	} else {
		$where = " WHERE a.atp_cod = " . $_POST['atp_cod'];
	}
}

if ($_POST['afr_cod'] != '') {
	if ($where != '') {
		$where .= " AND atp_cod = " . $_POST['afr_cod'];
	} else {
		$where = " WHERE a.afr_cod = " . $_POST['afr_cod'];
	}
}


$sql = "SELECT
        	a.ati_cod,
			a.ati_data,
			a.sol_status,
            a.atp_cod,
            t.atp_descricao,
			a.afr_cod,
			f.afr_descricao,
            a.cli_cod,
			c.cli_nome,
            a.ati_solicitante,
			a.ati_cargo,
			a.ati_descricao,
            a.ati_tempo,
            a.usu_cod,
			u.usu_nome
        FROM
            atividade AS a
			INNER JOIN atividade_tipo AS t ON t.atp_cod = a.atp_cod
			INNER JOIN atividade_forma AS f ON f.afr_cod = a.afr_cod
            INNER JOIN cliente AS c ON a.cli_cod = c.cli_cod
			INNER JOIN usuario AS u ON a.usu_cod = u.usu_cod
        $where";
$solicitacao = $data->find('dynamic', $sql);
$html = '
    <html>
        <head>
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
            <title>Relatatório de Solicitações</title>
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
							Relatório de Atividades
						</th>
					</tr>
				</thead>
			</table>
			<h4>Emitido em: ' . date('d/m/Y') . ' | Por: ' . $usuario . '</h4>
				<table style="border-collapse: collapse; width: 100%; margin-top: 20px; margin-bottom: 20px;">
					<thead>
						<tr style="border: 1px solid black; padding: 8px; text-align: left;">
							<th style="width: 10%;">Código</th>
							<th style="width: 10%;">Data</th>
							<th style="width: 30%;">Tipo</th>
							<th style="width: 15%;">Atendimento</th>
							<th style="width: 20%;">Cliente</th>
							<th style="width: 20%;">Solicitante (Cargo)</th>
							<th style="width: 15%;">Descricao</th>
							<th style="width: 15%;">Tempo de Execução</th>
						</tr>
					</thead>
				<tbody>';
					for ($i = 0; $i < count($solicitacao); $i++) {
						$solicitacao[$i]['ati_data'] = implode("/", array_reverse(explode("-", $solicitacao[$i]['ati_data'])));

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
						<td style="border: 1px solid black; padding: 8px;">' . str_pad($solicitacao[$i]['ati_cod'], 4, '0', STR_PAD_LEFT) . '</td>
						<td style="border: 1px solid black; padding: 8px;">' . $solicitacao[$i]['ati_data'] . '</td>
						<td style="border: 1px solid black; padding: 8px;">' . $solicitacao[$i]['atp_descricao'] . '</td>
						<td style="border: 1px solid black; padding: 8px;">' . $solicitacao[$i]['afr_descricao'] . '</td>
						<td style="border: 1px solid black; padding: 8px;">' . $solicitacao[$i]['cli_nome'] . '</td>
						<td style="border: 1px solid black; padding: 8px;">' . $solicitacao[$i]['ati_solicitante'] . '('. $solicitacao[$i]['ati_cargo'] .')</td>
						<td style="border: 1px solid black; padding: 8px;">' . $solicitacao[$i]['ati_descricao'] .'</td>
						<td style="border: 1px solid black; padding: 8px;">' . $solicitacao[$i]['ati_tempo'] .'</td>
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
