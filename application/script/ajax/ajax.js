// Para atualizar o selectpicker
var div_refresh1;
var div_refresh2;
var div_refresh3;

// Função AJAX
function ajax(url, div){ 
	div_refresh1 = div; // Para atualizar o selectpicker	

	req = null; 
	if(window.XMLHttpRequest){ 
		req = new XMLHttpRequest(); 
		req.onreadystatechange = processReqChange; 
		req.open("GET",url,true); 
		req.send(null); 
	}else 
		if(window.ActiveXObject){ 
			req = new ActiveXObject("Microsoft.XMLHTTP"); 
			if(req){ 
				req.onreadystatechange = processReqChange; 
				req.open("GET",url,true); 
				req.send(null); 
			} 
		} 
} 

// Função AJAX
function ajax2(url2, div2){ 	
	div_refresh2 = div2; // Para atualizar o selectpicker

	//alert('div no ajax: '+div);
	req2 = null; 
	if(window.XMLHttpRequest){ 
		req2 = new XMLHttpRequest(); 
		req2.onreadystatechange = processReqChange2; 
		req2.open("GET",url2,true); 
		req2.send(null); 
	}else 
		if(window.ActiveXObject){ 
			req2 = new ActiveXObject("Microsoft.XMLHTTP"); 
			if(req2){ 
				req2.onreadystatechange = processReqChange2; 
				req2.open("GET",url2,true); 
				req2.send(null); 
			} 
		} 
} 

// Função AJAX
function ajax3(url3, div3){ 	
	div_refresh3 = div3; // Para atualizar o selectpicker
	//alert('div no ajax: '+div);
	req3 = null; 
	if(window.XMLHttpRequest){ 
		req3 = new XMLHttpRequest(); 
		req3.onreadystatechange = processReqChange3; 
		req3.open("GET",url3,true); 
		req3.send(null); 
	}else 
		if(window.ActiveXObject){ 
			req3 = new ActiveXObject("Microsoft.XMLHTTP"); 
			if(req3){ 
				req3.onreadystatechange = processReqChange3; 
				req3.open("GET",url3,true); 
				req3.send(null); 
			} 
		} 
}

// Função AJAX
function ajax4(url4, div4){ 	
	div_refresh4 = div4; // Para atualizar o selectpicker
	//alert('div no ajax: '+div);
	req4 = null; 
	if(window.XMLHttpRequest){ 
		req4 = new XMLHttpRequest(); 
		req4.onreadystatechange = processReqChange4; 
		req4.open("GET",url4,true); 
		req4.send(null); 
	}else 
		if(window.ActiveXObject){ 
			req4 = new ActiveXObject("Microsoft.XMLHTTP"); 
			if(req4){ 
				req4.onreadystatechange = processReqChange4; 
				req4.open("GET",url4,true); 
				req4.send(null); 
			} 
		} 
} 

// Função AJAX
function ajax5(url5, div5){ 	
	div_refresh5 = div5; // Para atualizar o selectpicker
	//alert('div no ajax: '+div);
	req5 = null; 
	if(window.XMLHttpRequest){ 
		req5 = new XMLHttpRequest(); 
		req5.onreadystatechange = processReqChange5; 
		req5.open("GET",url5,true); 
		req5.send(null); 
	}else 
		if(window.ActiveXObject){ 
			req5 = new ActiveXObject("Microsoft.XMLHTTP"); 
			if(req5){ 
				req5.onreadystatechange = processReqChange5; 
				req5.open("GET",url5,true); 
				req5.send(null); 
			} 
		} 
} 

// Função AJAX
function processReqChange(){ 
	if(req.readyState == 4){ 
		if(req.status == 200){
			document.getElementById(div).innerHTML = req.responseText; 
		}else{ 
			alert("Houve um problema ao obter os dados:n" + req.statusText); 
		} 
	} 
	// Para atualizar o selectpicker
	$('#'+div_refresh1).selectpicker('refresh');
}

// Função AJAX
function processReqChange2(){ 
	if(req2.readyState == 4){ 
		if(req2.status == 200){
			document.getElementById(div2).innerHTML = req2.responseText; 
		}else{ 
			alert("Houve um problema ao obter os dados:n" + req2.statusText); 
		} 
	} 
	// Para atualizar o selectpicker
	$('#'+div_refresh2).selectpicker('refresh');	
}

// Função AJAX
function processReqChange3(){ 
	if(req3.readyState == 4){ 
		if(req3.status == 200){
			document.getElementById(div3).innerHTML = req3.responseText; 
		}else{ 
			alert("Houve um problema ao obter os dados:n" + req3.statusText); 
		} 
	} 
	// Para atualizar o selectpicker
	$('#'+div_refresh3).selectpicker('refresh');	
}

// Função AJAX
function processReqChange4(){ 
	if(req4.readyState == 4){ 
		if(req4.status == 200){
			document.getElementById(div4).innerHTML = req4.responseText; 
		}else{ 
			alert("Houve um problema ao obter os dados:n" + req4.statusText); 
		} 
	} 
	// Para atualizar o selectpicker
	$('#'+div_refresh4).selectpicker('refresh');	
}

// Função AJAX
function processReqChange5(){ 
	if(req5.readyState == 4){ 
		if(req5.status == 200){
			document.getElementById(div5).innerHTML = req5.responseText; 
		}else{ 
			alert("Houve um problema ao obter os dados:n" + req5.statusText); 
		} 
	} 
	// Para atualizar o selectpicker
	$('#'+div_refresh5).selectpicker('refresh');	
}