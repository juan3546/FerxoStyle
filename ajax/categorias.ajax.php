<?php
require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxCategorias{
    public $categoria;

    public function insertCategoria(){


		$valor = $this->categoria;

		$respuesta = Controladorcategorias::ctrInsertCategorias($valor);

		echo json_encode($respuesta);

	}
    public function deleteCategoria(){


		$valor = $this->categoria;

		$respuesta = Controladorcategorias::ctrDeleteCategoria($valor);

		echo json_encode($respuesta);

	}

}

if(isset($_POST["guardarCategorias"])){
    $ajaxCategorias = new AjaxCategorias();
    $ajaxCategorias -> categoria = $_POST["categoria"];
    $ajaxCategorias -> insertCategoria();
}

if(isset($_POST["eliminarCategoria"])){
    $ajaxCategorias = new AjaxCategorias();
    $ajaxCategorias -> categoria = $_POST["idCategoria"];
    $ajaxCategorias -> deleteCategoria();
}