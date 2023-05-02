<?php	
	require_once('../../../../library/MySql.php'); // Conecta ao BD
	require_once('../../../../library/DataManipulation.php'); 
	include("../../../../library/mpdf/mpdf.php"); 
	
	$mpdf = new mPDF('c','A4',10,'arial','2','2','5','5');
	$data = new DataManipulation();
	$util = new Utils();
	
	$cab = $util->cabecalho($_POST['sol_cod'], 4, "retrato"); // cod_ins, qtd pastas p voltar (img)		
	
	setlocale(LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese');
	$data_extenso = strftime('%d de %B de %Y', strtotime(date('Y-m-d')));
	
	$aux = explode(" - ", $_POST['mes']);
	$mes_num = $aux[0];
	$mes_nome = $aux[1];

	if($mes_num == "Todos"){
		$mes = " ";	
	}else{
		$mes = "and Month(a.alu_dt_nasc) = '".$mes_num."' ";	
	}
	
	// Dados para o relatório
	$sql = "SELECT 
				a.alu_codigo,
				a.alu_nome, 	
				a.alu_dt_nasc,			
				DAY(a.alu_dt_nasc) AS dia,
				MONTH(a.alu_dt_nasc) AS mes,
				YEAR(a.alu_dt_nasc) AS ano, 
				case MONTH(a.alu_dt_nasc)
					when '1'  then 'JANEIRO'
					when '2'  then 'FEVEREIRO'
					when '3'  then 'MARÇO'					
					when '4'  then 'ABRIL'					
					when '5'  then 'MAIO'					
					when '6'  then 'JUNHO'					
					when '7'  then 'JULHO'					
					when '8'  then 'AGOSTO'					
					when '9'  then 'SETEMBRO'					
					when '10' then 'OUTUBRO'					
					when '11' then 'NOVEMBRO'					
					when '12' then 'DEZEMBRO'																																																		
				end as nome_mes,
				a.alu_sexo,
				t.tur_descricao,
				m.mat_codigo 
			FROM 
				matricula AS m
				JOIN turma AS t ON (m.tur_codigo = t.tur_codigo)
				JOIN aluno AS a ON (m.alu_codigo = a.alu_codigo)																																
			WHERE 
				m.tur_codigo = ".$_POST['tur_codigo']." ".$mes."
				AND m.mat_situacao = 'MATRICULADO'
			GROUP BY a.alu_codigo
			ORDER BY 
				mes, dia ASC";
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
	$mpdf->ignore_invalid_utf8 = true;
	$mpdf->WriteHTML($html);	
/*
			// Rodapé	
			$mpdf->SetFooter(array(
									'L' => array(
											'content' => 'Página {PAGENO}', 
									),
									
									'C' => array(
											'content' => 'ESCOLAWEB - Sistema de Gestão Escolar WEB',
									),
									'R' => array(
											'content' => date("d/m/Y"),
									),
									'Line' => 1
								
							), 'O');

*/

	$mpdf->Output();
	exit;
?>