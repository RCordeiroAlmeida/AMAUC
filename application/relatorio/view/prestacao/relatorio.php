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

if($_POST['user'] != ''){
	$usuario = $_POST['user'];
}else{
	$usuario = $_POST['usuario'];
}


if ($_POST['con_cod'] != ''){
	$where = " WHERE con_cod = ".$_POST['con_cod'];

	$sql = "SELECT can_estab, can_valor, can_data FROM conta_anexo WHERE con_cod = ".$_POST['con_cod'];
	$detalhes = $data->find('dynamic', $sql);
}

if ($_POST['con_veiculo'] != '') {
	if($where != ''){
		$where .= " AND con_veiculo = " . $_POST['con_veiculo'];
	}else{
		$where = " WHERE con_veiculo = " . $_POST['con_veiculo'];
	}
}

if ($_POST['set_cod'] != '') {
	if ($where != '') {
		$where .= " AND con_setor = " . $_POST['set_cod'];
	} else {
		$where = " WHERE con_setor = " . $_POST['set_cod'];
	}
}

if ($_POST['data_ini'] != '') {
	if ($where != '') {
		$where .= " AND con_data_ini >= '" . $_POST['data_ini']. "' AND con_data_fim <='" . $_POST['data_fim'] . "'";
	} else {
		$where = " WHERE con_data_ini >= '" . $_POST['data_ini']."' AND con_data_fim <='" . $_POST['data_fim'] . "'";
	}
}

if ($_POST['usu_per'] == '2'){
	if($where != ''){
		$where .= " AND usu_cod = " . $_POST['usu_cod'];
	} else{
		$where = " WHERE usu_cod = " . $_POST['usu_cod'];
	}
}

$sql = "SELECT
			c.con_cod,		
			c.con_veiculo,
			c.con_setor,
			c.con_data_ini,
			c.con_data_fim,
			c.con_destino,
			c.con_solicitacao,
			c.con_descricao,
			(SELECT SUM(a.can_valor) FROM conta_anexo as a WHERE c.con_cod = a.con_cod) as total_valor
		FROM
			conta as c".
		$where;

$prestacao = $data->find('dynamic', $sql);


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
							Relatório de Prestação de Contas
						</th>
					</tr>
				</thead>
			</table>
			<h4>Emitido em: ' . date('d/m/Y') . ' | Por: ' . $usuario . '</h4>
				<table style="border-collapse: collapse; width: 100%; margin-top: 20px; margin-bottom: 20px;">
					<thead>
						<tr style="border: 1px solid black; padding: 8px; text-align: left;">
							<th style="width: 25%;">Data inicial | Data final</th>
							<th style="width: 10%;">Código</th>
							<th style="width: 30%;">Descrição</th>
							<th style="width: 10%;">Tipo de veículo</th>
							<th style="width: 20%;">Valor Total</th>
						</tr>
					</thead>
					<tbody>';
for ($i = 0; $i < count($prestacao); $i++) {
	$data_ini = explode(" ", $prestacao[$i]['con_data_ini']);
	
	$data_fim = explode(" ", $prestacao[$i]['con_data_fim']);
	

	switch ($prestacao[$i]['con_veiculo']) {
		case 1:
			$tipo = "Empresa";
			break;
		case 2:
			$tipo = "Próprio";
			break;
		case 3:
			$tipo = "Outro";
	}
	
	if($_POST['con_cod'] != ''){
		$html .= '
		<tr>
			<td style="border: 1px solid black; padding: 8px;">' . $data_ini[0] . ' | ' . $data_fim[0]. '</td>
			<td style="border: 1px solid black; padding: 8px;">' . str_pad($prestacao[$i]['con_cod'], 4, '0', STR_PAD_LEFT) . '</td>
			<td style="border: 1px solid black; padding: 8px;">' . $prestacao[$i]['con_descricao'] . '</td>
			<td style="border: 1px solid black; padding: 8px;">' . $tipo . '</td>
			<td style="border: 1px solid black; padding: 8px;">R$ ' . number_format($prestacao[$i]['total_valor'], 2, ',', '.'). '</td>
		</tr>
		</tbody>
		</table>
		
		<table style="border-collapse: collapse; width: 100%; margin-top: 20px; margin-bottom: 20px;">
	<thead>
		<tr style="border: 1px solid black; padding: 8px; text-align: left;">
			<th style="width: 10%;">Data</th>
			<th style="width: 30%;">Estabelecimento</th>
			<th style="width: 5%;">Valor</th>
		</tr>
	</thead>
	<tbody>';
		for ($j = 0; $j < count($detalhes); $j++) {
			$html .='
			<tr style="border: 1px solid black; padding: 8px;">
				<td style="border: 1px solid black; padding: 8px;">'.$detalhes[$j]['can_data'].'</td>
				<td style="border: 1px solid black; padding: 8px;">'.$detalhes[$j]['can_estab'].'</td>
				<td style="border: 1px solid black; padding: 8px;">R$ '.number_format($detalhes[$j]['can_valor'], 2, ',', '.'). '</td>
			</tr>';
		}
		$html .='
	</tbody>
</table>';

	}else{
		$html .= '
		<tr>
			<td style="border: 1px solid black; padding: 8px;">' . $data_ini[0] . ' | ' . $data_fim[0]. '</td>
			<td style="border: 1px solid black; padding: 8px;">' . str_pad($prestacao[$i]['con_cod'], 4, '0', STR_PAD_LEFT) . '</td>
			<td style="border: 1px solid black; padding: 8px;">' . $prestacao[$i]['con_descricao'] . '</td>
			<td style="border: 1px solid black; padding: 8px;">' . $tipo . '</td>
			<td style="border: 1px solid black; padding: 8px;">R$ ' . number_format($prestacao[$i]['total_valor'], 2, ',', '.'). '</td>
		</tr>';
	}
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
