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


$sql = "SELECT c.* FROM compensacao as c WHERE cmp_cod =" . $_POST['cmp_cod'];
$compensacao = $data->find('dynamic', $sql);

$sql = "SELECT s.set_nome FROM setor as s INNER JOIN usuario as u ON u.set_cod = s.set_cod WHERE u.usu_cod =" . $compensacao[0]['usu_cod'];
$setor = $data->find('dynamic', $sql);

$sql = "SELECT usu_nome FROM usuario WHERE usu_cod =" . $compensacao[0]['cmp_responsavel'];
$responsavel = $data->find('dynamic', $sql);

$sql = "SELECT cdt_data FROM compensacao_data WHERE cmp_cod =".$compensacao[0]['cmp_cod'];
$cmp_datas = $data->find('dynamic', $sql);


$datas = array();

for($i = 0; $i <count($cmp_datas); $i++){
	$cmp_datas[$i]['cdt_data'] = implode("/", array_reverse(explode("-", $cmp_datas[$i]['cdt_data'])));
	$datas[] = $cmp_datas[$i]['cdt_data'];
}
$datas = implode(', ', $datas);


switch ($compensacao[0]['cmp_status']) {
	case 0:

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
            <title>Pedido de compensação de horas</title>
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
			<p style="font-size: 1.2em; line-height: 1.5; padding: 5% 10%">Prezado(a) <strong>' . $responsavel[0]['usu_nome'] . '.</strong><br/>
            Eu, <strong>' . $_POST['user'] . '</strong>, inscrito sob o <strong>CPF nº ' . $compensacao[0]['cmp_cpf_fun'] . '</strong>, funcionário da <strong>' . $compensacao[0]['cmp_ins_fun'] . '</strong>, solicito autorização para desconto de banco de horas no(s) dia <strong>'.$datas.'</strong> pelo seguinte motivo:<br /><br />
            
            <i>' . $compensacao[0]['cmp_descricao'] . '</i><br/><br/>
           
           
<div class="assinatura" style="text-align: center; margin-left: auto; margin-right: auto">
    <p>___________________________________</p>
    <h5>' . $_POST['user'] . '</h5>
    <br /><br />
    <p>___________________________________</p>
    <h5>' . $responsavel[0]['usu_nome'] . '</h5>
    <br /><br />
    
    <p>_________________, ___ de _____________ de ______</p>

   
</div>';
		break;
	case 1:
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
            <title>Pedido de compensação de horas</title>
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
			<p style="font-size: 1.2em; line-height: 1.5; padding: 5% 10%">
			Declaramos para os devidos fins que:<br/><br /><strong>' . $_POST['user'] . '</strong>, inscrito sob o <strong>CPF nº' . $compensacao[0]['cmp_cpf_fun'] . '</strong>, funcionário da empresa <strong>' . $compensacao[0]['cmp_ins_fun'] . '</strong>, cumpre de segunda a sexta-feira, a jornada de trabalho e está/esteve de folga no(s) dia(s) <strong>'.$datas.'</strong>, devido à:<br/><br/>
			<i>' . $compensacao[0]['cmp_descricao'] . '</i><br/><br/>
			
			não devendo ser descontado do salário esse(s) dia(s) de repouso.
			Autorizamos ainda, o setor <strong>' . $setor[0]['set_nome'] . '</strong> a certificar as informações acima.           
           
<div class="assinatura" style="text-align: center; margin-left: auto; margin-right: auto">
    <p>___________________________________</p>
    <h5>' . $_POST['user'] . '</h5>
    <br /><br />
    <p>___________________________________</p>
    <h5>' . $responsavel[0]['usu_nome'] . '</h5>
    <br /><br />
    
    <p>_________________, ___ de _____________ de ______</p>

   
</div>';
		break;
	case 2:
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
					<title>Pedido de compensação de horas</title>
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
					<p style="font-size: 1.2em; line-height: 1.5; padding: 5% 10%; text-align: center">
					Seu pedido foi Indeferido, consulte seu responsável para mais informações!
					</p>';
		break;
}
$dompdf->loadHtml($html);

// Renderiza o documento PDF
$dompdf->render();

// Exibe o documento PDF no navegador
$dompdf->stream('listagem-de-solicitacoes.pdf', array('Attachment' => false));
