<?php
class Utils{
	/*function nomeia_mes($mes){
		if($mes == 01){
			$nome = "JANEIRO";	
		}else
		if($mes == 02){
			$nome = "FEVEREIRO";	
		}else
		if($mes == 03){
			$nome = "MARÇO";	
		}else
		if($mes == 04){
			$nome = "ABRIL";	
		}else
		if($mes == 05){
			$nome = "MAIO";	
		}else
		if($mes == 06){
			$nome = "JUNHO";	
		}else
		if($mes == 07){
			$nome = "JULHO";	
		}else
		if($mes == 08){
			$nome = "AGOSTO";	
		}else
		if($mes == 09){
			$nome = "SETEMBRO";	
		}else
		if($mes == 10){
			$nome = "OUTUBRO";	
		}else
		if($mes == 11){
			$nome = "NOVEMBRO";	
		}else
		if($mes == 12){
			$nome = "DEZEMBRO";	
		}
		return $nome;
	}*/

	public function valor_extenso($valor=0, $maiusculas=false){
	/*	
		EXEMPLO PARA CHAMAR A FUNÇÃO
		$numero = '2345.98';
		echo valor_extenso(number_format($numero,2,',',''));	
	*/
		// verifica se tem virgula decimal
		if (strpos($valor,",") > 0){
		  // retira o ponto de milhar, se tiver
		  $valor = str_replace(".","",$valor);
	 
		  // troca a virgula decimal por ponto decimal
		  $valor = str_replace(",",".",$valor);
		}

		$singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
		$plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões", "quatrilhões");
		 
		$c = array("", "cem", "duzentos", "trezentos", "quatrocentos", "quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
		$d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta", "sessenta", "setenta", "oitenta", "noventa");
		$d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze", "dezesseis", "dezesete", "dezoito", "dezenove");
		$u = array("", "um", "dois", "três", "quatro", "cinco", "seis", "sete", "oito", "nove");
	 
		$z=0;
 
		$valor = number_format($valor, 2, ".", ".");
		$inteiro = explode(".", $valor);
		$cont=count($inteiro);
		
		for($i=0;$i<$cont;$i++)
			for($ii=strlen($inteiro[$i]);$ii<3;$ii++)
				$inteiro[$i] = "0".$inteiro[$i];
 
		$fim = $cont - ($inteiro[$cont-1] > 0 ? 1 : 2);
		for ($i=0;$i<$cont;$i++) {
				$valor = $inteiro[$i];
				$rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
				$rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
				$ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";
 
				$r = $rc.(($rc && ($rd || $ru)) ? " e " : "").$rd.(($rd && $ru) ? " e " : "").$ru;
				$t = $cont-1-$i;
				$r .= $r ? " ".($valor > 1 ? $plural[$t] : $singular[$t]) : "";
				if ($valor == "000")$z++; elseif ($z > 0) $z--;
				if (($t==1) && ($z>0) && ($inteiro[0] > 0)) $r .= (($z>1) ? " de " : "").$plural[$t];
				if ($r) $rt = $rt . ((($i > 0) && ($i <= $fim) && ($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
		}
	 	
		if(!$maiusculas){
		 	return($rt ? $rt : "zero");
		}else
			if($maiusculas == "2") {
				return (mb_strtoupper($rt, 'UTF-8') ? mb_strtoupper($rt, 'UTF-8') : "Zero");
			}else{
				return (ucwords($rt) ? ucwords($rt) : "Zero");
			}	 	
	}

	// requires php5
	public function blobToImage($blob, $dir){		
		//echo 'entrou';
		define('UPLOAD_DIR', $dir);
		$img = $blob;
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		//echo 'data';
		$file = UPLOAD_DIR . uniqid() . '.png';
		echo $file;
		$success = file_put_contents($file, $data);

		return $success ? $file : 'Erro.';
	}

	public function isAjax(){
        return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
    }
	
	public function formatDate($delimiter, $value){		
		if($delimiter == '-'){
			$newDate = implode("/", array_reverse(explode("-", $value)));
		}else{
			$newDate = implode("-", array_reverse(explode("/", $value)));
		}
		
		return $newDate;		
	}
	
	// A $DATA2 DEVERÁ SER MAIOR QUE A $DATA1
	// O FORMATO DAS DATAS DEVEM SER DD/MM/AAAA
	public function mesesDeDiferenca($data1, $data2) {
		if($data1 && $data2) {
			$vetorData1 = explode("-", $data1);
			$vetorData2 = explode("-", $data2);
			
			$resultado = ($vetorData2[0] - $vetorData1[0])*12;
			
			if($vetorData1[1] > $vetorData2[1]){			
				$resultado -= ($vetorData1[1] - $vetorData2[1]);
			}else 
				if($vetorData2[1] > $vetorData1[1]){
					$resultado += ($vetorData2[1] - $vetorData1[1]);
				}
				
			if($vetorData1[2] > $vetorData2[2]){			
				$resultado -= 1;
			}
				
		}else{ 
			$resultado = 0;
		}
		return $resultado;
	}

	public function dias_semana_mes($_mes, $_ano, $diasemana){
		$tmp = mktime(0, 0, 0, $_mes, 1, $_ano);
		$ultimo_dia = date("t",$tmp);

		$dias = explode(',', $diasemana);
		$dom = $seg = $ter = $qua = $qui = $sex = $sab = 0;
		for ($i=0; $i < count($dias); $i++) { 
			switch ($dias[$i]) {
				case '0':
					$dom = 1;
					break;
				case '1':
					$seg = 1;
					break;
				case '2':
					$ter = 1;
					break;
				case '3':
					$qua = 1;
					break;
				case '4':
					$qui = 1;
					break;
				case '5':
					$sex = 1;
					break;
				case '6':
					$sab = 1;
					break;	
			}
		}

		$i = 0;
		for($a=1; $a <= $ultimo_dia; $a++) {
			//w = 0 (para domingo) até 6 (para sábado)
			if($dom == 1){
				if (date('w', mktime(0, 0, 0, $_mes, $a, $_ano)) == '0'){
					$quant[$i] = date('d', mktime(0, 0, 0, $_mes, $a, $_ano));
					$i++;
				}
			}
			if($seg == 1){
				if (date('w', mktime(0, 0, 0, $_mes, $a, $_ano)) == '1'){
					$quant[$i] = date('d', mktime(0, 0, 0, $_mes, $a, $_ano));
					$i++;
				}
			}
			if($ter == 1){
				if (date('w', mktime(0, 0, 0, $_mes, $a, $_ano)) == '2'){
					$quant[$i] = date('d', mktime(0, 0, 0, $_mes, $a, $_ano));
					$i++;
				}
			}
			if($qua == 1){
				if (date('w', mktime(0, 0, 0, $_mes, $a, $_ano)) == '3'){
					$quant[$i] = date('d', mktime(0, 0, 0, $_mes, $a, $_ano));
					$i++;
				}
			}
			if($qui == 1){
				if (date('w', mktime(0, 0, 0, $_mes, $a, $_ano)) == '4'){
					$quant[$i] = date('d', mktime(0, 0, 0, $_mes, $a, $_ano));
					$i++;
				}
			}
			if($sex == 1){
				if (date('w', mktime(0, 0, 0, $_mes, $a, $_ano)) == '5'){
					$quant[$i] = date('d', mktime(0, 0, 0, $_mes, $a, $_ano));
					$i++;
				}
			}
			if($sab == 1){
				if (date('w', mktime(0, 0, 0, $_mes, $a, $_ano)) == '6'){
					$quant[$i] = date('d', mktime(0, 0, 0, $_mes, $a, $_ano));
					$i++;
				}
			} 
		}

		return $quant;
	}
	
	public function string_pra_busca($str) {
		//Transformando tudo em minúsculas
		$str = trim(strtolower($str));
	
		//Tirando espaços extras da string... "tarcila  almeida" ou "tarcila   almeida" viram "tarcila almeida"
		while ( strpos($str,"  ") )
			$str = str_replace("  "," ",$str);
		
		//Agora, vamos trocar os caracteres perigosos "ã,á..." por coisas limpas "a"
		$caracteresPerigosos = array ("Ã","ã","Õ","õ","á","Á","é","É","í","Í","ó","Ó","ú","Ú","ç","Ç","à","À","è","È","ì","Ì","ò","Ò","ù","Ù","ä","Ä","ë","Ë","ï","Ï","ö","Ö","ü","Ü","Â","Ê","Î","Ô","Û","â","ê","î","ô","û","!","?",",","“","”","-","\"","\\","/");
		$caracteresLimpos    = array ("a","a","o","o","a","a","e","e","i","i","o","o","u","u","c","c","a","a","e","e","i","i","o","o","u","u","a","a","e","e","i","i","o","o","u","u","A","E","I","O","U","a","e","i","o","u",".",".",".",".",".",".","." ,"." ,".");
		$str = str_replace($caracteresPerigosos,$caracteresLimpos,$str);
		
		//Agora que não temos mais nenhum acento em nossa string, e estamos com ela toda em "lower",
		//vamos montar a expressão regular para o MySQL
		$caractresSimples = array("a","e","i","o","u","c");
		$caractresEnvelopados = array("[a]","[e]","[i]","[o]","[u]","[c]");
		$str = str_replace($caractresSimples,$caractresEnvelopados,$str);
		$caracteresParaRegExp = array(
			"(a|ã|á|à|ä|â|&atilde;|&aacute;|&agrave;|&auml;|&acirc;|Ã|Á|À|Ä|Â|&Atilde;|&Aacute;|&Agrave;|&Auml;|&Acirc;)",
			"(e|é|è|ë|ê|&eacute;|&egrave;|&euml;|&ecirc;|É|È|Ë|Ê|&Eacute;|&Egrave;|&Euml;|&Ecirc;)",
			"(i|í|ì|ï|î|&iacute;|&igrave;|&iuml;|&icirc;|Í|Ì|Ï|Î|&Iacute;|&Igrave;|&Iuml;|&Icirc;)",
			"(o|õ|ó|ò|ö|ô|&otilde;|&oacute;|&ograve;|&ouml;|&ocirc;|Õ|Ó|Ò|Ö|Ô|&Otilde;|&Oacute;|&Ograve;|&Ouml;|&Ocirc;)",
			"(u|ú|ù|ü|û|&uacute;|&ugrave;|&uuml;|&ucirc;|Ú|Ù|Ü|Û|&Uacute;|&Ugrave;|&Uuml;|&Ucirc;)",
			"(c|ç|Ç|&ccedil;|&Ccedil;)" );
		$str = str_replace($caractresEnvelopados,$caracteresParaRegExp,$str);
		
		//Trocando espaços por .*
		$str = str_replace(" ",".*",$str);
		
		//Retornando a String finalizada!
		return $str;
	}
}
?>