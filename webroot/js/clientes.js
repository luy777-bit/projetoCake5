$(document).ready(function(){

	$('.data').mask('99/99/9999');
	$('.cep').mask('99999-999');
	$('.cnpj').mask('99.999.999/9999-99');
	
	var caminho_js= $('#caminho_js').attr('alt');

	$(document).on('click', '.btnViewDetalhes', function(){
		
		var index = $('.btnViewDetalhes').index();
		var cnpj = $('.cnpj_cliente').eq(index).attr('id');

		$.ajax({
			url:caminho_js+'/clientes/view/'+cnpj,
		}).done(function(resposta){
			$('.modal-body').css('display', 'block');
			$('.modal-body').html(resposta);
		}).fail(function(){
			console.log('ERRO');
		}).always(function(){
			console.log('completo');
		});
	});

	$(document).on('click', '.btn_add', function(){

		var index = $('.btn_add').index(this);
		var proximo_campo = parseFloat(index)+parseFloat(1);

		if($('div').hasClass('bloco_informacaoes_'+proximo_campo)){
			//return false;
			var index = proximo_campo;
			var proximo_campo = parseFloat(proximo_campo)+parseFloat(1);
		}

		$('.bloco_informacaoes_0').clone()
							.attr('class', 'row bloco_informacaoes_'+proximo_campo)
							.insertAfter('.bloco_informacaoes_'+index);

		$('.informacao').eq(proximo_campo).val('');

		$('bloco_informacaoes_'+proximo_campo).find($('.informacao').eq(proximo_campo).prop('id', 'informacao'+proximo_campo));

		$('bloco_informacaoes_'+proximo_campo).find($('.informacao').eq(proximo_campo).prop('name', 'informacao['+proximo_campo+']'));

		$('bloco_informacaoes_'+proximo_campo).find($('.btn_add').eq(proximo_campo).prop('id', proximo_campo));
		$('bloco_informacaoes_'+proximo_campo).find($('.btn_sub').eq(proximo_campo).prop('id', proximo_campo));

	});

	$(document).on('click', '.btn_sub', function(){

		var index = $('.btn_sub').index(this);
		var id = $('.btn_sub').eq(index).attr('id');

		if(index == 0){
			$('#informacao').eq(index).val();
		}
		else{
			$('.bloco_informacaoes_'+id).remove();
		}
	});

	$(document).on('click', '.btnMensagem', function(){
		$('.message').hide();
	});

});









