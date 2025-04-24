$(document).ready(function(){
	
	$(document).on('click', '.caret', function(){

		var index = $('.caret').index(this);
		$('.nested').eq(index).toggle('.active');
	});

	$(document).on('click', '.submenuInput', function(){

		var index = $('.submenuInput').index(this);
		$('.menuInput').eq(index).attr('checked', true);

		if($(this).is(':checked')){

			var id_perfil = $('#id_perfil').val();
			var menu = $('.menuInput').eq(index).val();
			var submenu = $('.submenuInput').eq(index).val();

			Acessos.addAcessos(id_perfil, menu, submenu);
		}
		else{

			var id_acesso = $('.perfilInput').eq(index).val();
			Acessos.deleteAcessos(id_acesso);
		}

	});
});

var Acessos = {

	addAcessos: function(id_perfil, menu, submenu){
			
			var caminho_js= $('#caminho_js').attr('alt');

			$.ajax({
				url:caminho_js+'acessos/add/',
				type: "POST",
				data: {id_perfil: id_perfil,
					   menu: menu,
					   submenu: submenu
				},
			}).done(function(resposta){
				
			}).fail(function(){
				console.log('ERRO');
			}).always(function(){
				console.log('completo');
			});

	},
	deleteAcessos: function(id_acesso){
			
			var caminho_js= $('#caminho_js').attr('alt');

			$.ajax({
				url:caminho_js+'acessos/delete/',
				type: "POST",
				data: {id: id_acesso
				},
			}).done(function(resposta){
				
			}).fail(function(){
				console.log('ERRO');
			}).always(function(){
				console.log('completo');
			});

	}	
}