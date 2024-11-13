<?php 

require_once "../controladores/productos.controlador.php";
require_once "../controladores/categoria.controlador.php";

require_once "../modelos/productos.modelo.php";
require_once "../modelos/categorias.modelo.php";

class AjaxProductos{

    // generar codigo a partir de id categoria
    public $idCategoria;
    public function ajaxCrearCodigoProducto(){
        $item = "id_categoria";
        $valor = $this->idCategoria;
        $orden = "id";
        $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
        echo json_encode($respuesta);
    }

}

// generar codigo a partir de id categoria
if(isset($_POST["id_categoria"])){
    $codigoProducto = new AjaxProductos();
    $codigoProducto->idCategoria = $_POST["idCategoria"];
    $codigoProducto->ajaxCrearCodigoProducto();
}