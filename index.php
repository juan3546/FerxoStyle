<?php
// se requiere utilizar los controladores
require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/categorias.controlador.php";



// se requiere utilizar los modelos
require_once "modelos/usuarios.modelo.php";
require_once "modelos/categorias.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();