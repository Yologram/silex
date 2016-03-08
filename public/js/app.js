'use strict';
	var url = '/simplon/silex/public/api/';

	function main(){

		function process(res) {
			var template = $('#template').html();
			Mustache.parse(template); 
			var rendered = "";
			$.each(res.data, function(key, value){
				rendered += Mustache.render(template, value);
			});

			$('#target').html(rendered);
		}


		ecoute();
		$.getJSON(url, process);

	}

	function ecoute(){
		$('body').on('click', '.bouton_moins', function(){
			console.log("vous avec cliqu sur le bouton rouge");
		})

		$('body').on('click', '.bouton_plus', function(){
			console.log("vous avec cliqu sur le bouton vert");
		})
	}

	function update(){
		
	}

	function req(meth, url, callback){
		$.ajax({})

	}
	
$(document).ready(function(){

	main();

})