<html>
	<head>
		<title>Testando</title>
	</head>
	
	<body>
			
		<?php 
			include('../../../cursophp/../pdf/mpdf.php');
			// Salva arquivo no servidor como 'filename.pdf' 
			$mpdf = new mPDF (); 
			$mpdf-> WriteHTML ('<p> Hallo Mundo </ p>'); 
			$mpdf-> Output ();
		?>

	</body>
</html>