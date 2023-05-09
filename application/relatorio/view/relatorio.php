<?php
	include("../../../library/TCPDF/tcpdf.php");
	include('../../../library/MySql.php'); // Conecta ao BD
	include('../../../library/DataManipulation.php');	
	
	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', true);
	$data = new DataManipulation();
	
	$sql = "SELECT * FROM solicitacao";
	$solicitacao = $data->find('dynamic', $sql);

	$pdf->SetTitle("Solicitações filtradas");
	$pdf->SetAuthor($_SESSION['amauc_userName']);
	$pdf->AddPage();

	ob_clean();	//limpa o buffer de saída

	$html = '
			Listagem de solicitações

			Filtros aplicados:'.var_dump($solicitacao).
			'';

  	$pdf->Write(0, $html);
	$pdf->Output('exemplo.pdf', 'I');
?>



