<?php

require_once "../controladores/marca.controlador.php";
require_once "../modelos/marca.modelo.php";

class AjaxMarca {

    /*=============================================
    MOSTRAR MARCAS
    =============================================*/
    public function ajaxMostrarMarcas() {
        $respuesta = ControladorMarca::ctrMostrarMarca(null, null);
        echo json_encode($respuesta);
    }
}

if (isset($_POST["mostrarMarcas"])) {
    $marca = new AjaxMarca();
    $marca->ajaxMostrarMarcas();
}
