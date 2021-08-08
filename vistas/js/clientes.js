/*=============================================
SUBIENDO LA FOTO DEL USUARIO
=============================================*/

$(".foto").change(function(){
	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".foto").val("");

  		 Swal.fire({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      icon: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".foto").val("");

  		 Swal.fire({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      icon: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizar").attr("src", rutaImagen);

  		});

  	}
});

$(document).on("click",".btnEditarClientes",function(){
    var id = $(this).attr("idCliente");
    var datos = new FormData();
	datos.append("idCliente", id);
    datos.append("obtenerCliente", "");

	$.ajax({

		url:"ajax/clientes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

		
			$("#editarNombre").val(respuesta["nombre"]);
			$("#editarUsuario").val(respuesta["usuario"]);

			$("#fotoActual").val(respuesta["foto"]);

            $("#editarCorreo").val(respuesta["correo"]);
            $("#editarTelefono").val(respuesta["telefono"]);
            $("#editarDireccion").val(respuesta["direccion"]);

			$("#passwordActualCliente").val(respuesta["password"]);

			if(respuesta["foto"] != ""){

				$("#previsualizarEditar").attr("src", respuesta["foto"]);
                

			}

            

		}

	});
});

$(document).on("click", ".btnEliminarClientes", function(){
    var idCliente = $(this).attr("idCliente");
    var fotoCliente = $(this).attr("fotoCliente");
    var cliente = $(this).attr("cliente");
  
    Swal.fire({
      title: '¿Está seguro de borrar el usuario?',
      text: "¡Si no lo está puede cancelar la accíón!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar usuario!'
    }).then(function(result){
  
      if(result.value){
  
        window.location = "index.php?ruta=clientes&idCliente="+idCliente+"&cliente="+cliente+"&fotoCliente="+fotoCliente;
  
      }
  
    });
  
});



/*=============================================
REVISAR SI EL CLIENTE YA ESTÁ REGISTRADO
=============================================*/

$(document).on("change", "#nuevoCliente", function(){
	$(".alert").remove();
	
	var cliente = $(this).val();

	var datos = new FormData();
	datos.append("validarCliente", cliente);

	 $.ajax({
	    url:"ajax/clientes.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

	    		$("#nuevoCliente").parent().after('<div class="alert alert-warning">Este cliente ya existe en la base de datos</div>');

	    		$("#nuevoCliente").val("");

	    	}

	    }

	});
});

