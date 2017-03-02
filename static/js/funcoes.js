

function MostrarEsconderDiv(id) {
	
	if ($('#' + id).css('display') == 'block') {
		
		$('#' + id).css('display','none')
		
	} else {
		
		$('#' + id).css('display','block')
		
	}
	
}

function MostrarEsconderDivModal(id) {
	
	if ($('#' + id).css('display') == 'block') {
		
		$('#' + id).removeClass("modal fade");

		$('#' + id).addClass("modal fade in");
		
		
		
	} else {
		
		
		$('#' + id).removeClass("modal fade in");

		$('#' + id).addClass("modal fade");
	}
	
}



function formatar(mascara, documento){
	var i = documento.value.length;
	var saida = mascara.substring(0,1);
	var texto = mascara.substring(i)
	
	if (texto.substring(0,1) != saida){
		documento.value += texto.substring(0,1);
	}
}

function mascaraTEL(o,f){
	v_obj=o
	v_fun=f
	setTimeout("execmascara()",1)
}
function execmascara(){
	v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function id( el ){
	return document.getElementById( el );
}
window.onload = function(){
	id('telefone').onkeyup = function(){
		mascaraTEL( this, mtel );
	}
}

jQuery(function($){
	$("#cep").change(function(){
		var cep_code = $(this).val();
		if( cep_code.length <= 0 ) return;
		$.get("http://apps.widenet.com.br/busca-cep/api/cep.json", { code: cep_code },
			function(result){
				if( result.status!=1 ){
					alert(result.message || "Houve um erro desconhecido");
					return;
				}
				$("input#cep").val( result.code );
				$("input#estado").val( result.state );
				$("input#cidade").val( result.city );
				$("input#bairro").val( result.district );
				$("input#logradouro").val( result.address );
				$("input#estado").val( result.state );
			});
	});
});

function somenteNumeros(num) {
	var er = /[^0-9.]/;
	er.lastIndex = 0;
	var campo = num;
	if (er.test(campo.value)) {
		campo.value = "";
	}
}



