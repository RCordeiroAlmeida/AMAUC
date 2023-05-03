<?php	
	ob_start();
	require_once('../../../library/MySql.php'); // Conecta ao BD
	require_once('../../../library/DataManipulation.php'); 
	include("../../../library/mpdf/mpdf.php");
	
	
	$mpdf = new mPDF('c','A4',10,'arial','2','2','5','5');
	$data = new DataManipulation();
	
	$html = 'teste';
	/*setlocale(LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese');
	$data_extenso = strftime('%d de %B de %Y', strtotime(date('Y-m-d')));
	
	
	// Dados para o relatório
	$sql = "SELECT * FROM solicitacao";
	$result = $data->find('dynamic', $sql);	

	$html = 
	'
	'.$cab.'
	
	<h2 align="center" style="margin-bottom:-10px;">Listagem de Aniversariantes</h2>
	<table align="center" style="width:100%;">
		';
		$mes_atual = "";
		for ($i = 0; $i < count ($result); $i++){
			$result[$i]['alu_dt_nasc'] = date("d/m/Y", strtotime($result[$i]['alu_dt_nasc']));
			if($i%2 == 0)
				$cor = "#FFFFFF;";
			else
				$cor = "#E4E4E4";

			if($result[$i]['alu_sexo'] == "M")
				$sexo = "Masculino";
			else
				$sexo = "Feminino";

			// Mes
			if($result[$i]['mes'] != $mes_atual){			
				$html .= '						
				<tr><td>&nbsp;</td></tr>
				<tr >
					<td >
						 Mês:
					</td>
					 <td >';
						$html .= '<b>'.$result[$i]['nome_mes'].'</b> ';
						$mes_atual = $result[$i]['mes'];	
					$html .= '
					</td>
				</tr>			
				
				<!-- Cabecalho -->			
				<tr >
					<td style="border-bottom:1px solid #000; border-left:1px solid #000; border-top:1px solid #000; font-weight:bold; width:60px;">
						Código
					</td>
					 <td style="border-bottom:1px solid #000; border-left:1px solid #000; border-top:1px solid #000; font-weight:bold;">
						Nome
					</td>
					 <td style="border-bottom:1px solid #000; border-left:1px solid #000; border-top:1px solid #000; font-weight:bold;">
						Turma
					</td>					
					 <td style="border-bottom:1px solid #000; border-left:1px solid #000; border-top:1px solid #000; font-weight:bold; width:70px;">
						Sexo
					</td>	
					<td style="border-bottom:1px solid #000; border-left:1px solid #000; border-top:1px solid #000; font-weight:bold; border-right:1px solid #000; width:80px;">
						Data Nasc
					</td>			
				</tr>
				';
				}
			$html .= '
			
			<tr style="background-color:'.$cor.'" >
				<td style="border-bottom:1px solid #000; border-left:1px solid #000;"	>
					 '.$result[$i]['alu_codigo'].'
				</td>
				<td style="border-bottom:1px solid #000; border-left:1px solid #000;">
					 '.$result[$i]['alu_nome'].'				 
				</td>
				<td style="border-bottom:1px solid #000; border-left:1px solid #000; ">
					 '.$result[$i]['tur_descricao'].'				 
				</td>
				<td style="border-left:1px solid #000; border-bottom:1px solid #000; ">
					 '.$sexo.'				 
				</td>
				<td style="border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000;">
					 '.$result[$i]['alu_dt_nasc'].'				 
				</td>
			</tr>';	
						
		}
	$html .= '
	</table>
	';	

	*/
	$mpdf->ignore_invalid_utf8 = true;
	ob_clean();//Limpa o buffer de saída
	
	$mpdf->WriteHTML($html);	
			// Rodapé	
			$mpdf->SetFooter(array(
									'L' => array(
											'content' => 'Página {PAGENO}', 
									),
									
									'C' => array(
											'content' => 'AMAUC - Sistema de Gestão',
									),
									'R' => array(
											'content' => date("d/m/Y"),
									),
									'Line' => 1
								
							), 'O');


	$mpdf->Output();
	exit;
?>