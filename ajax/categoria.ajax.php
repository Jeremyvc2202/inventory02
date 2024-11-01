<?php
require_once "../controladores/categoria.control.php";
require_once "../modelos/categoria.modelo.php";

class AjaxCategoria {
    public $idCategoria;

    public function ajaxEditarCategoria() {
        $item = "id";
        $valor = $this->idCategoria;

        // Llama al controlador para obtener la categoría con el id especificado
        $respuesta = ControladorCategoria::ctrMostrarCategoria($item, $valor);

        // Devuelve la respuesta en formato JSON
        echo json_encode($respuesta);
    }
}

// Procesa la petición AJAX si se envía un idCategoria
if (isset($_POST["idCategoria"])) {
    $editar = new AjaxCategoria();
    $editar->idCategoria = $_POST["idCategoria"];
    $editar->ajaxEditarCategoria();
}
