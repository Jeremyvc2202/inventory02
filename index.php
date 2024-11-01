<?php
//invocar al archivo
require_once "controladores/plantilla.controlador.php";
require_once "controladores/categoria.control.php";

// models
require_once "modelos/categoria.modelo.php";

//instancia al controlador
$plantilla = new PlantillaControlador();
$plantilla->plantilla();



