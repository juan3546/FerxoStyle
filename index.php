<?php
// se requiere utilizar los controladores
require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/inventario.controlador.php";
require_once "controladores/cotizaciones.controlador.php";
require_once "controladores/configuracion.controlador.php";



// se requiere utilizar los modelos
require_once "modelos/usuarios.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/inventario.modelo.php";
require_once "modelos/cotizaciones.modelo.php";
require_once "modelos/configuracion.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();