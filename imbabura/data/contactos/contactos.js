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

$("input").on("keyup click",function (e){//campos requeridos		
	comprobarCamposRequired(e.currentTarget.form.id)
});

function enviar_correos() {
var resp = comprobarCamposRequired('contactos');

if (resp == true) {
	$("#contactos").on("submit",function (e) {				
		var valores = $("#contactos").serialize();

		$.ajax({				
			type: "POST",
			data: valores,
			url: "contactos.php",			
		    success: function(data) {	
		    	if( data == 0 ){
		    		alert('Datos Agregados Correctamente');			
		    		//limpiar_form(p);	
		    		//$('#table').trigger('reloadGrid');							
		    	}else{
		    		
		    	}
			}
		});

		
		e.preventDefault();
		$(this).unbind("submit")
	});
}


	
}


function inicio () {
	// cargar mapa 
	

	// body...

	$("#enviar").click(function(e) {
    	enviar_correos();  
    });

	//$("#enviar").on("click", enviar_correos);
}