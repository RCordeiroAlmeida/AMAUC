<?php	
	ob_start();
?>
	<h1>Oii, funcionou perfeitamente</h1>
<?php
	
	// require_once('../../../library/MySql.php'); // Conecta ao BD
	// require_once('../../../library/DataManipulation.php'); 
	include("../../../library/mpdf/mpdf.php");
	
	// $data = new DataManipulation();

	$arquivo = "relatorio.php";
	
	$html = ob_get_clean(); //limpa buffer de saída;
	
	$mpdf = new mPDF('C', 'A4');
	$mpdf ->WriteHTML($html);

	$mpdf->Output();
	$mpdf->Output($arquivo, 'I'); 
	
	/*
		? F - SALVA O ARQUIVO E NÂO ABRE
		? I - ABRE NO NAVEGADOR
		? D - CHAMA O PROMPT E SALVA O ARQUIVO
	*/

	exit();


?>