function validacampo(formulario){
	(function($, window) {	
		var dev = '.dev'; //window.location.hash.indexOf('dev') > -1 ? '.dev' : '';
	
		// setup datepicker
		$("#datepicker").datepicker();
	
		// Add a new validator
		$.formUtils.addValidator({
			name : 'even_number',
			validatorFunction : function(value, $el, config, language, $form) {
				return parseInt(value, 10) % 2 === 0;
			},
			borderColorOnError : '',
			errorMessage : 'You have to give an even number',
			errorMessageKey: 'badEvenNumber'
		});
		
		window.applyValidation = function(validateOnBlur, forms, messagePosition) {
			if( !forms )
				forms = 'form';
			if( !messagePosition )
				messagePosition = 'top';
	
			$.validate({
				form : forms,
				language : {
					requiredFields: 'É necessário informar este campo'
				},
				validateOnBlur : validateOnBlur,
				errorMessagePosition : messagePosition,
				scrollToTopOnError : true,
				borderColorOnError : 'purple',
				modules : 'security'+dev+', location'+dev+', sweden'+dev+', html5'+dev+', file'+dev+', uk'+dev,
				onModulesLoaded: function() {
					$('#country-suggestions').suggestCountry();
					$('#swedish-county-suggestions').suggestSwedishCounty();
					$('#password').displayPasswordStrength();
				},
				onValidate : function($f) {
	
					console.log('Sobre a Validação do Formulário ');
	
					var $callbackInput = $('#callback');
					if( $callbackInput.val() == 1 ) {
						return {
							element : $callbackInput,
							message : 'This validation was made in a callback'
						};
					}
				},
				onError : function($form) {
					alert('Invalid '+$form.attr('id'));
				},
				onSuccess : function($form) {
					enviar();
					alert('Valid '+$form.attr('id'));
					return false;
				}
			});
		};
		// Load one module outside $.validate() even though you do not have to
	    $.formUtils.loadModules('date'+dev+'.js', false, false);
		
		window.applyValidation(true, formulario, 'top');    
})(jQuery, window);
}
//Mensagem para preencher campo vazio
function campo_vazio(mensagem, id, url, largura, altura){
	// div do alert
	var div = document.createElement("div"); 
	div.innerHTML = "<div id='preencha' title='Aviso' >"+mensagem+"</div>";
	
	if(!altura){
		altura = 160; 
	}
	
	if(!largura){
		largura = 450;
	}

	$(function() {		
		$(div.innerHTML).dialog({			
				autoOpen: true,
				resizable: false,
				autoClose: false,
				height: 160,
				width: 450,
				hide: "clip",
				modal: true,
				resize: false,
				buttons: {
					Ok: function() {
						$(this).dialog("close");
						if(url){
							window.location = url;	
						}
						if(id){
							document.getElementById(id).focus();
							document.getElementById(id).style.backgroundColor = '#ffabab';
						}
					}
				}
		});
	});	
}

function lembrete(acao, id){
	if(acao == 0)
		document.getElementById(id).style.display = "none";		
	if(acao == 1)
		document.getElementById(id).style.display = "block";
}

// Confirmar alguma ação (exclusão por exemplo)
function confirma_acao(mensagem, url, id, largura, altura){
	// div do alert
	var div = document.createElement("div"); 
	div.innerHTML = "<div id='preencha' title='Aviso' >"+mensagem+"</div>";
	
	if(!altura){
		altura = 190; 
	}
	
	if(!largura){
		largura = 550;
	}

	$(function(){		
		$(div.innerHTML).dialog({			
				autoOpen: true,
				resizable: false,
				autoClose: false,
				height: altura,
				width: largura,
				hide: "clip",
				modal: true,
				resize: false,
				buttons:{
					Ok: function(){
						//window.location = destino;
						nextPage(url, id);
						$(this).dialog("close");						
					}, 
					Cancelar: function(){
						$(this).dialog("close");						
					}					
				}
		});
	});	
}

function seleciona(id_chk, id, indice, input_name){	
		var i;
		if(document.getElementById(id_chk+indice).checked != 1){ // Não estava marcado quando clicou (marcar)
			document.getElementById(id+indice).style.backgroundColor = "#cdffcd"; 
			document.getElementById(id_chk+indice).checked = 1; 
		}else{ // Já estava marcado quando foi clicado (desmarcar)
			document.getElementById(id+indice).style.backgroundColor = "#FFF"; 
			document.getElementById(id_chk+indice).checked = 0; 
		}
		
		// Para casos onde somente UM pode ficar selecionado
		if(input_name != ""){
			for(i=0; i<document.getElementsByName(input_name).length; i++){
				if(document.getElementById(id_chk+i).checked) 
					document.getElementById(id+i).style.backgroundColor = "#cdffcd";
				else 
					document.getElementById(id+i).style.backgroundColor = "#FFF"; 				
		}
	}
}
	
function troca_cor(id_chk, id, indice, input_name){
	var i;
	if(document.getElementById(id_chk+indice).checked) 
		document.getElementById(id+indice).style.backgroundColor = "#cdffcd";
	else 
		document.getElementById(id+indice).style.backgroundColor = "#FFF"; 
		
	// Para casos onde somente UM pode ficar selecionado
	if(input_name != ""){
		for(i=0; i<document.getElementsByName(input_name).length; i++){
			if(document.getElementById(id_chk+i).checked) 
				document.getElementById(id+i).style.backgroundColor = "#cdffcd";
			else 
				document.getElementById(id+i).style.backgroundColor = "#FFF"; 
			
		}
	}
}

function selecionar_tudo(form, id){ 
	var i;
   for (i=0;i<document.form.elements.length;i++){ 
	  if(document.form.elements[i].type == "checkbox"){	
		 document.form.elements[i].checked = 1; 
		 document.getElementById(id+""+i).style.backgroundColor = "#cdffcd"; 
	  }
   }
} 

function deselecionar_tudo(form, id){ 
	var i;
   for (i=0;i<document.form.elements.length;i++){ 
	  if(document.form.elements[i].type == "checkbox"){	
		 document.form.elements[i].checked = 0 
		 document.getElementById(id+""+i).style.backgroundColor = "#f0f5ff"; 
	  }
   }
} 	

function verificaSetou(var_name, var_id){	
	var qtd = 0;
	for(i=0; i<document.getElementsByName(var_name).length; i++){
		if(document.getElementById(var_id+i).checked)
			qtd = 1;
	}	
	return qtd;		
}

function recebeCodigo(var_name, var_id){
	var codigo;
	for(i=0; i<document.getElementsByName(var_name).length; i++){
		if(document.getElementById(var_id+i).checked)
			codigo = document.getElementById(var_id+i).value;			
	}	
	return codigo;		
}	

// Mascara
function MascaraMoeda(objTextBox, SeparadorMilesimo, SeparadorDecimal, e, max_len){
	var sep = 0;
	var key = '';
	var i = j = 0;
	var len = len2 = 0;
	var strCheck = '0123456789';
	var aux = aux2 = '';
	var whichCode = (window.Event) ? e.which : e.keyCode;
	if (whichCode == 13 || whichCode == 8) return true;
	key = String.fromCharCode(whichCode); // Valor para o código da Chave
	if (strCheck.indexOf(key) == -1) return false; // Chave inválida
	len = objTextBox.value.length;
	for(i = 0; i < len; i++)
		if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal)) break;
	aux = '';
	for(; i < len; i++)
		if (strCheck.indexOf(objTextBox.value.charAt(i))!=-1) aux += objTextBox.value.charAt(i);
	aux += key;
	len = aux.length;

	if (len == 0) objTextBox.value = '';
	if (len == 1) objTextBox.value = '0'+ SeparadorDecimal + '0' + aux;
	if (len == 2) objTextBox.value = '0'+ SeparadorDecimal + aux;
	if ((len > 2) && (len < max_len)) {
		aux2 = '';
		for (j = 0, i = len - 3; i >= 0; i--) {
			if (j == 3) {
				aux2 += SeparadorMilesimo;
				j = 0;
			}
			aux2 += aux.charAt(i);
			j++;
		}
		objTextBox.value = '';
		len2 = aux2.length;
		for (i = len2 - 1; i >= 0; i--)
		objTextBox.value += aux2.charAt(i);
		objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);
	}
	return false;
}

//adiciona mascara de cnpj
function MascaraCNPJ(cnpj){
	if(mascaraInteiro(cnpj)==false){
		event.returnValue = false;
	}	
	return formataCampo(cnpj, '00.000.000/0000-00', event);
}

//adiciona mascara de cep
function MascaraCep(cep){
		if(mascaraInteiro(cep)==false){
		event.returnValue = false;
	}	
	return formataCampo(cep, '00.000-000', event);
}

//adiciona mascara de hora
function MascaraHora(hora){	
	if(mascaraInteiro(hora)==false){
		event.returnValue = false;
	}	
	return formataCampo(hora, '00:00', event);
}

//adiciona mascara de data
function MascaraData(data){
	if(mascaraInteiro(data)==false){
		event.returnValue = false;
	}	
	return formataCampo(data, '00/00/0000', event);
}

//adiciona mascara ao telefone
function MascaraTelefone(tel){	
	if(mascaraInteiro(tel)==false){
		event.returnValue = false;
	}	
	return formataCampo(tel, '(00) 0000-0000', event);
}

//adiciona mascara ao CPF
function MascaraCPF(cpf){
	if(mascaraInteiro(cpf)==false){
		event.returnValue = false;
	}	
	return formataCampo(cpf, '000.000.000-00', event);
}

//valida telefone
function ValidaTelefone(tel){
	exp = /\(\d{2}\)\ \d{4}\-\d{4}/
	if(!exp.test(tel.value))
		alert('Numero de Telefone Invalido!');
}

//valida CEP
function ValidaCep(cep){
	exp = /\d{2}\.\d{3}\-\d{3}/
	if(!exp.test(cep.value))
		alert('Numero de Cep Invalido!');		
}

//valida data
function ValidaData(data){
	exp = /\d{2}\/\d{2}\/\d{4}/
	if(!exp.test(data.value))
		alert('Data Invalida!');			
}

//valida data
function ValidaHoraMinuto(hora){
	var hora_1, minuto_1;
	
	hora_1   = hora.value.substring(0,2);
	minuto_1 = hora.value.substring(3,5); 

	if(hora_1 > 23){
		alert('Hora Invalida!');
		hora.focus();
	}else
		if(minuto_1 > 59){
			alert('Minutos Invalidos!');
			hora.focus();
		}
}


//div para o alert aviso do cpf
var div = document.createElement("div"); 
div.innerHTML = "<div id='aviso_cpf' title='Aviso' > CPF inv&aacute;lido! </div>";

//valida o CPF digitado
function ValidarCPF(Objcpf){
	var cpf = Objcpf.value;
	cpf = cpf.replace('.','');
    cpf = cpf.replace('.','');
    cpf = cpf.replace('-','');
	
	if(vercpf(cpf)){
		document.frmcpf.submit();
	}else{
		errors="1";

		if(errors){ 
			$(function() {
				$(div.innerHTML).dialog({
						autoOpen: true,
						resizable: false,
						autoClose: false,
						height: 170,
						width: 350,
						hide: "clip",
						modal: true,
						resize: false,
						buttons: {
							Ok: function() {
								$(this).dialog("close");
								 document.getElementById("alu_cpf").focus();
							}
						}
				});
			});	
		}
		document.retorno = (errors == '');
	}
}

function vercpf(cpf){
	if (cpf.length > 0){
		if (cpf.length != 11 || 
			cpf == "00000000000" || 
			cpf == "11111111111" || 
			cpf == "22222222222" || 
			cpf == "33333333333" || 
			cpf == "44444444444" || 
			cpf == "55555555555" || 
			cpf == "66666666666" || 
			cpf == "77777777777" || 
			cpf == "88888888888" || 
			cpf == "99999999999")
		
		return false;
		add = 0;
		
		for (i=0; i < 9; i ++)
			add += parseInt(cpf.charAt(i)) * (10 - i);
			rev = 11 - (add % 11);
			
			if (rev == 10 || rev == 11)
				rev = 0;
				
				if (rev != parseInt(cpf.charAt(9)))
					return false;
					add = 0;
					
					for (i = 0; i < 10; i ++)
						add += parseInt(cpf.charAt(i)) * (11 - i);
						rev = 11 - (add % 11);
						
						if (rev == 10 || rev == 11)
							rev = 0;
							
							if (rev != parseInt(cpf.charAt(10)))
								return false;
								//alert('O CPF informado é válido!');
								return true;
	}else{
		return true;
	}
	
}

//valida numero inteiro com mascara
function mascaraInteiro(){
	if (event.keyCode < 48 || event.keyCode > 57){
		event.returnValue = false;
		return false;
	}
	return true;
}

//valida o CNPJ digitado
function ValidarCNPJ(ObjCnpj){
	var cnpj = ObjCnpj.value;
	var valida = new Array(6,5,4,3,2,9,8,7,6,5,4,3,2);
	var dig1= new Number;
	var dig2= new Number;

	if (cnpj.length > 0){	
		exp = /\.|\-|\//g
		cnpj = cnpj.toString().replace( exp, "" ); 
		var digito = new Number(eval(cnpj.charAt(12)+cnpj.charAt(13)));
			
		for(i = 0; i<valida.length; i++){
			dig1 += (i>0? (cnpj.charAt(i-1)*valida[i]):0);	
			dig2 += cnpj.charAt(i)*valida[i];	
		}
		dig1 = (((dig1%11)<2)? 0:(11-(dig1%11)));
		dig2 = (((dig2%11)<2)? 0:(11-(dig2%11)));
		
		if(((dig1*10)+dig2) != digito)	
			alert('CNPJ Invalido!');
	}else{
		return true;
	}
}

//formata de forma generica os campos
function formataCampo(campo, Mascara, evento) { 
	var boleanoMascara; 
	
	var Digitato = evento.keyCode;
	exp = /\-|\:|\.|\/|\(|\)| /g
	campoSoNumeros = campo.value.toString().replace( exp, "" ); 
   
	var posicaoCampo = 0;	 
	var NovoValorCampo="";
	var TamanhoMascara = campoSoNumeros.length;; 
	
	if (Digitato != 8) { // backspace 
		for(i=0; i<= TamanhoMascara; i++) { 
			boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
								|| (Mascara.charAt(i) == "/")) 
			boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(") 
								|| (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " ")|| (Mascara.charAt(i) == ":")) 
			if (boleanoMascara) { 
				NovoValorCampo += Mascara.charAt(i); 
				  TamanhoMascara++;
			}else { 
				NovoValorCampo += campoSoNumeros.charAt(posicaoCampo); 
				posicaoCampo++; 
			  }	   	 
		  }	 
		campo.value = NovoValorCampo;
		  return true; 
	}else { 
		return true; 
	}
}