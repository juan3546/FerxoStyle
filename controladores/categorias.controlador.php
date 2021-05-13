<?php

class Controladorcategorias{

    // REGISTRO DE CATEEGORIAS
    static public function ctrInsertCategorias($valor){
        if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $valor)){
            $tabla = "categorias";
            $item = "nombre";
            $respuesta = ModeloCategorias::MdlMostrarCategorias($tabla, $item, $valor);

            if($respuesta == null){
                $datos = array(
                    "nombre" => $valor
                );
                $respuestaInsert = ModeloCategorias::MdlInsertCategorias($tabla, $datos);

                if($respuestaInsert == "ok"){
                    
                    return "ok";
                }
            }else{
                return "encontrada";
            }

        }else{
            return "datosIncorrectos";
        }

    }

    static public function ctrMostrarCategorias($item, $valor){

		$tabla = "categorias";

		$respuesta = ModeloCategorias::MdlMostrarCategorias($tabla, $item, $valor);
	
		return $respuesta;
	}

    static public function ctrDeleteCategoria($datos){

		$tabla = "categorias";

		$respuesta = ModeloCategorias::MdlDeleteCategoria($tabla, $datos);
	
		return $respuesta;
	}
}