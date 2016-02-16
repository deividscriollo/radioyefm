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
	$("#contactos").submit(function(e) {		
		var valores = $("#contactos").serialize();
		var texto=($("#enviar").text()).trim();

		if (texto == "Enviar Mensaje") {
			datos_correo(valores,e)

		}
		//jQuery('#contactos').preventDoubleSubmit();
		e.preventDefault();	
		$(this).unbind("submit")
		//$("#contactos").submit();
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
				return false;
	    		//limpiar_form(p);	
	    		//$('#table').trigger('reloadGrid');							
	    	}else{
	
	    	}
		}
	});


}


function inicio () {
	// cargar mapa 


	$("#enviar").on("click", enviar_correos);
}