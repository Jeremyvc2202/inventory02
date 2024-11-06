<?php

class ControladorMarca {

    /*=============================================
    MOSTRAR MARCAS
    =============================================*/

    static public function ctrMostrarMarca($item, $valor) {

        $tabla = "marcas";
        
        $respuesta = ModeloMarca::mdlMostrarMarca($tabla, $item, $valor);

        return $respuesta;
    }
}
