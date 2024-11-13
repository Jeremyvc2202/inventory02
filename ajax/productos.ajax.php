<?php 

require_once "../controladores/productos.controlador.php";
require_once "../controladores/categoria.control.php";

require_once "../modelos/productos.modelo.php";
require_once "../modelos/categoria.modelo.php";

class AjaxProductos{

    /*=============================================
    GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
    =============================================*/
    public $idCategoria;
  
    public function ajaxCrearCodigoProducto(){
  
        $item = "id_categoria";
        $valor = $this->idCategoria;
      $orden = "id";
  
        $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
  
        echo json_encode($respuesta);
  
    }
}
  
/*=============================================
GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
=============================================*/	

if(isset($_POST["idCategoria"])){

	$codigoProducto = new AjaxProductos();
	$codigoProducto -> idCategoria = $_POST["idCategoria"];
	$codigoProducto -> ajaxCrearCodigoProducto();

}
