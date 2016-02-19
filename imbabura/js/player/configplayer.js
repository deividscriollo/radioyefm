$(function(){
	contador()
	setInterval('contador()',5000);
	Amplitude.init({
		"songs": [
			{
				"name": "Oye Fm",
				"artist": "Oye, lo que te gusta",
				"album": "Oye",
				"url": "http://206.217.207.207:8025/stream.aac",
				"live": true,
				"cover_art_url": "img/player/roomsforadelaide.jpg"
			}
		],
		// "default_album_art": "img/player/no-cover-large.png",
		// "autoplay": true
	});

	var expanded = false;
	/*
		jQuery Visual Helpers
	*/
	$('#small-player').hover(function(){
		$('#small-player-middle-controls').show();
		$('#small-player-middle-meta').hide();
	}, function(){
		$('#small-player-middle-controls').hide();
		$('#small-player-middle-meta').show();

	});

	$('#top-large-album').hover(function(){
		$('#top-header').show();
		$('#small-player').show();

		$('#large-album-art').css('border-radius', '5px');
	}, function(){
		if( !$('#top-header').is(':hover') && !$('#small-player').is(':hover') ){
			$('#top-header').fadeOut(1000);
			$('#small-player').fadeOut(1000);

			$('#large-album-art').css('border-radius', '0px');
		}
	});

	$('#top-header').hover(function(){
		$('#top-header').show();
		$('#small-player').show();
	}, function(){

	});

	/*
		Toggles Album Art
	*/
	$('#small-player-toggle').click(function(){
		$('.hidden-on-collapse').show();
		$('.hidden-on-expanded').hide();
		/*
			Is expanded
		*/
		expanded = true;

		$('#small-player').css('border-top-left-radius', '0px');
		$('#small-player').css('border-top-right-radius', '0px');
	});

	$('#top-header-toggle').click(function(){
		$('.hidden-on-collapse').hide();
		$('.hidden-on-expanded').show();
		/*
			Is collapsed
		*/
		expanded = false;

		$('#small-player').css('border-top-left-radius', '5px');
		$('#small-player').css('border-top-right-radius', '5px');
	});
});
function contador(){
		var horario = new Date();
		var hora = horario.getHours();
		var minutos = horario.getMinutes();
		if (minutos<10) {
			minutos = '0'+minutos
		}
		var acumulador;
		$.ajax({
		    url : 'method/app.php/app.php',
		    data:{time:hora+':'+minutos},
		    type:'POST',
		    dataType:'json',
		    success:function(data){
		    	if (data[0]==0) {
		    		$('.now-playing-title').text('OyeFm, DJ')
		    	}else{
		    		$('.now-playing-title').text(data[1])
		    	}
		    }
		});

		$.ajax({
		    url: 'http://206.217.207.207:8025/',
		    success:function(data){
		    	var x = data.replace (/img/g, "div");
		    	var data = $(x).find('.streamdata');
		    	var sum = $(data[8]).text().split(':');
		    	if (sum[0]=='Sorry, service not available. Try again later.') {	    		
		    		$('[amplitude-song-info="album"]').text('Oye, lo que te gusta');
		    		// $('[amplitude-song-info="artist"]').text('Oye,');
		    	}else{
		    		// $('[amplitude-song-info="album"]').text(sum[0].substr(0, 15));
		    		$('[amplitude-song-info="artist"]').text(sum[1].substr(0, 15));
		    	}
		    }
		});
	}