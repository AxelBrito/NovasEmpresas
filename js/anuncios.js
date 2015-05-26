function randomAd(min, max) {
	var arr = [];
	while(arr.length < 6){
		var randNum = Math.floor(Math.random() * (max - min + 1)) + min,
			found=false;
		for(var i=0;i < arr.length; i++){
			if(arr[i] == randNum){found=true;break}
		}
		if(!found)arr[arr.length] = randNum;
	}
	return arr;
}



if (isAdBlockActive) { 
	console.log('isAdBlockActive');

	$.getJSON( 'novasEmpresasAnuncios.json', {
		format: "json"
	})
		.done(function( data ) {
		setTimeout(function() {
			console.log('ads total--> ' + data.length);
			var ads = randomAd(0, data.length-1);
			var i=0;
			for(var i=0; i<ads.length;i++){

				// ******* anuncios top *********
				if(data[ads[i]].format == '728'){
					$( ".nossos_anuncios.lb_ads" ).each(function( index ) {
						var myIdString = $( this ).attr('id');
						var myId = myIdString.charAt(4);
						if(  myId == index &&  $('#top_'+index).hasClass('ocupado') != true){
							$('#top_'+index).html('<a href="'+data[ads[i]].url+'" title="'+data[ads[i]].name+'"><img src="'+data[ads[i]].img+'"></a>');

							$('#top_'+index).addClass('ocupado');	
							return false;
						} 
					});
				} // ./anuncios top  




				// ******* anuncios laterais *********
				if(data[ads[i]].format == '300'){
					$( ".nossos_anuncios.mrec_ads" ).each(function( index ) {
						var myIdString = $( this ).attr('id');
						var myId = myIdString.charAt(8);
						if(  myId == index &&  $('#lateral_'+index).hasClass('ocupado') != true){
							$('#lateral_'+index).html('<a href="'+data[ads[i]].url+'" title="'+data[ads[i]].name+'"><img src="'+data[ads[i]].img+'"></a>');

							$('#lateral_'+index).addClass('ocupado');	
							return false;
						} 
					});
				} // ./anuncios laterais   



				// ******* anuncios inline_links *********
				if(data[ads[i]].format == '468'){
					$( ".nossos_anuncios.inline_links" ).each(function( index ) {
						var myIdString = $( this ).attr('id');
						var myId = myIdString.charAt(7);
						if(  myId == index &&  $('#listAd_'+index).hasClass('ocupado') != true){
							$('#listAd_'+index).html('<a href="'+data[ads[i]].url+'" title="'+data[ads[i]].name+'"><img src="'+data[ads[i]].img+'"></a>');

							$('#listAd_'+index).addClass('ocupado');	
							return false;
						} 
					});
				} // ./anuncios inline_links  


			}
		}, 800);

		$('.g_ads').hide();
		$('.hr_g_ads').hide();
		$('.nossos_anuncios').show();
	});

} else{
	$('.g_ads').show();
	$('.hr_g_ads').show();
	$('.nossos_anuncios').hide();
}

// anuncios permanentes laterais



$.getJSON( 'anunciosLateraisPermanentes.json', {
	format: "json"
})
	.done(function( data ) {

	console.log('ads total--> ' + data.length);
	var ads = randomAd(0, data.length-1);
	var i=0;
	for(var i=0; i<ads.length;i++){


		// ******* anuncios laterais *********
		if(data[ads[i]].format == '300'){
			$( ".nossos_anuncios_permanentes.mrec_ads" ).each(function( index ) {
				var myIdString = $( this ).attr('id');
				var myId = myIdString.charAt(13);
				if(  myId == index &&  $('#lateral_perm_'+index).hasClass('ocupado') != true){
					$('#lateral_perm_'+index).html('<a href="'+data[ads[i]].url+'" title="'+data[ads[i]].name+'"><img src="'+data[ads[i]].img+'"></a>');

					$('#lateral_perm_'+index).addClass('ocupado');	
					return false;
				} 
			});
		} // ./anuncios laterais   

	}



});
