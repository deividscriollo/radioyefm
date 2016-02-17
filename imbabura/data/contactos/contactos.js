$(document).on("ready",inicio);

function comprobarCamposRequired(form){
    
    var correcto=true;    
    var campos_text=$('#'+form+' input:required');    
    $(campos_text).each(function() {
        var pattern = new RegExp("^" + $(this)[0].pattern + "$");        
        if($(this).val() != '' && pattern.test($(this).val())){            
            $(this).parent().parent().removeClass('has-error');                        
        }else{
            correcto=false;
            $(this).parent().parent().addClass('has-error');
        }   
    });        
    return correcto; 
}

$("input").on("click",function (e){//campos requeridos		
	comprobarCamposRequired(e.currentTarget.form.id)
});

function enviar_correos() {
var resp = comprobarCamposRequired('contactos');

alert(resp)

if (resp == true) {
	$("#contactos").submit(function(e) {		
		var valores = $("#contactos").serialize();

		$.ajax({				
			url: "contactos.php",
	        type: "POST",
		    success: function(data) {	
		    	if( data == 0 ){
		    		alert('Datos Agregados Correctamente');
					
		    		//limpiar_form(p);	
		    		//$('#table').trigger('reloadGrid');							
		    	}else{
					
		    	}
			}
		});
		//$('#contactos').preventDoubleSubmit();
		
		e.preventDefault();	
		$(this).unbind("submit")

	});
}
}

function datos_correo(valores,p) {

	$.ajax({				
		url: "contactos.php",
        type: "POST",
	    success: function(data) {	
	    	if( data == 0 ){
	    		alert('Datos Agregados Correctamente');
				
	    		//limpiar_form(p);	
	    		//$('#table').trigger('reloadGrid');							
	    	}else{
				return false;
	    	}
		}
	});

}
function inicio () {
	// cargar mapa 
	$("#enviar").on("click",function(){
		console.log('test');
	});
}