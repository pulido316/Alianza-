$(document).ready(function(){
	$.ajax({ 
	   		type: 'GET', 
	   		url: '/verInmueble', 
	   		dataType: 'json',
	   		success: function (data) {
	   			$.each(data, function (index, value) {
				  	
				})
			},
	   		error:function(msg) {
	   			// body...
	   			console.log(msg+"Error en los inmuebles");
	   		}
	   	});
});