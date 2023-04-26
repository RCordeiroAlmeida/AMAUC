// Para enviar a ID via POST, 'vlr' pode ser um vetor
// Ex.:
//$arrayVlr = "'".$param_0.",".$param_1."'";
//$arrayVlr = $param_0;				
function nextPage(url, vlr, target){
	var num_indice = 0;
	vlr = ''+vlr+'';		
	var array_vlr = new Array();

	if(vlr.indexOf(',') != -1){ // Mais que 1 parametro
		array_vlr = vlr.split(',');
		num_indice = total_indice(array_vlr);
	}else{						// Apenas 1 parametro
		array_vlr[0] = vlr;
		num_indice = 1;
	}

	var div_fnp = document.createElement("div");
	div_fnp.setAttribute("id", "form_next_page");	
	document.body.appendChild(div_fnp);
		
	var div_princ = document.getElementById('form_next_page');

	var formulario = document.createElement("form");
	formulario.setAttribute("id", "EnviaParam");
	formulario.setAttribute("method", "POST");
	formulario.setAttribute("action", url);	
	if(target == '_blank'){
		formulario.setAttribute("target", target);
	}
	div_princ.appendChild(formulario);	
	
	for(var i=0; i< num_indice; i++){
		var form_enviaPar = document.getElementById("EnviaParam");
		var parametro = document.createElement("input");
		parametro.setAttribute("type", "hidden");
		parametro.setAttribute("name", "param_"+i);
		parametro.setAttribute("id",   "param_"+i);	
		parametro.setAttribute("value", array_vlr[i]);	
		form_enviaPar.appendChild(parametro);		
	}
	
	// Envia o formulário
	document.getElementById("EnviaParam").action = url;
	document.forms["EnviaParam"].submit();
}

function total_indice(vlr){
	var count = 0;
	while(1){
		if(vlr[count])
			count++;	
		else			
			return count;			
	}
}

// // Função AJAX
// function ajax(url, div){ 
// 	//alert('div no ajax: '+div);
// 	req = null; 
// 	if(window.XMLHttpRequest){ 
// 		req = new XMLHttpRequest(); 
// 		req.onreadystatechange = processReqChange; 
// 		req.open("GET",url,true); 
// 		req.send(null); 
// 	}else 
// 		if(window.ActiveXObject){ 
// 			req = new ActiveXObject("Microsoft.XMLHTTP"); 
// 			if(req){ 
// 				req.onreadystatechange = processReqChange; 
// 				req.open("GET",url,true); 
// 				req.send(null); 
// 			} 
// 		} 
// } 

// // Função AJAX
// function processReqChange(){ 
// 	if(req.readyState == 4){ 
// 		if(req.status == 200){
// 			document.getElementById(div).innerHTML = req.responseText; 
// 		}else{ 
// 			alert("Houve um problema ao obter os dados:n" + req.statusText); 
// 		} 
// 	} 
// }


/*$(document).ready(function(){
  
  $('.abremenu').click(function(){
    $('ul').removeClass('selected');
	var position = $('.abremenu').index(this);
	
	$('ul:gt('+position+'):lt(1)').addClass('selected');
  });
  
});*/

// Função que recebe um número(mês) e retorna o mês por extenso
function nomeia_mes(mes){
	var nome_extenso;
	switch(mes) {
		case '01':
			nome_extenso = "JANEIRO";
			break;
		case '02':
			nome_extenso = "FEVEREIRO";
			break;
		case '03':
			nome_extenso = "MARÇO";
			break;
		case '04':
			nome_extenso = "ABRIL";
			break;
		case '05':
			nome_extenso = "MAIO";
			break;
		case '06':
			nome_extenso = "JUNHO";
			break;
		case '07':
			nome_extenso = "JULHO";
			break;
		case '08':
			nome_extenso = "AGOSTO";
			break;
		case '09':
			nome_extenso = "SETEMBRO";
			break;
		case '10':
			nome_extenso = "OUTUBRO";
			break;
		case '11':
			nome_extenso = "NOVEMBRO";
			break;
		case '12':
			nome_extenso = "DEZEMBRO";
			break;
	}						
	return nome_extenso;		
}

function dialogoUrl(module,action,id, sysurl) {
		var url = '?module='+module+'&acao='+action+'&id='+id+sysurl;
		$("#dialog-confirm").dialog('open');
		
		$("#dialog-confirm").dialog({
			resizable: false,
			height:140,
			modal: true,
			buttons: {
				'Sim': function() {
					$(this).dialog('close');
					window.location = url;
				},
				'Não': function() {
					$(this).dialog('close');
				}
			}
		});
	}
	
function dialogo(module,action,id) {
		var url = '?module='+module+'&acao='+action+'&id='+id;
		$("#dialog-confirm").dialog('open');
		
		$("#dialog-confirm").dialog({
			resizable: false,
			height:140,
			modal: true,
			buttons: {
				'Sim': function() {
					$(this).dialog('close');
					window.location = url;
				},
				'Não': function() {
					$(this).dialog('close');
				}
			}
		});
	}
	
function validaSenha(){
	if($('#senha').val() != $('#newSenha').val()){
		alert('A nova senha e a repetição não conferem!');
		$('#senha , #newSenha').css({'border':'#FF0000 solid 1px'});
		return false;
	}
	
	return true;	
}
