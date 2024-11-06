<?php

class ControladorProductos {

    /*=============================================
    MOSTRAR PRODUCTOS
    =============================================*/
    static public function ctrMostrarProductos($item, $valor, $orden) {
        $tabla = "productos";
        $respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor, $orden);
        return $respuesta;
    }

    /*=============================================
    CREAR PRODUCTO
    =============================================*/
    static public function ctrCrearProducto() {
        if (isset($_POST["nuevaDescripcion"])) {
            if ($_POST["nuevaDescripcion"] &&
                preg_match('/^[0-9]+$/', $_POST["nuevoStock"]) && 
                preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioCompra"]) &&
                preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioVenta"])) {

                /*=============================================
                VALIDAR IMAGEN
                =============================================*/
                $ruta = "vistas/img/productos/default/anonymous.png";

                if (isset($_FILES["nuevaImagen"]["tmp_name"]) && !empty($_FILES["nuevaImagen"]["tmp_name"])) {
                    list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;
                    $directorio = "vistas/img/productos/" . $_POST["nuevoCodigo"];
                    if (!file_exists($directorio)) {
                        mkdir($directorio, 0755);
                    }

                    if ($_FILES["nuevaImagen"]["type"] == "image/jpeg") {
                        $aleatorio = mt_rand(100, 999);
                        $ruta = $directorio . "/" . $aleatorio . ".jpg";
                        $origen = imagecreatefromjpeg($_FILES["nuevaImagen"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta);
                    }

                    if ($_FILES["nuevaImagen"]["type"] == "image/png") {
                        $aleatorio = mt_rand(100, 999);
                        $ruta = $directorio . "/" . $aleatorio . ".png";
                        $origen = imagecreatefrompng($_FILES["nuevaImagen"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta);
                    }
                }

                $tabla = "productos";

                $datos = array(
                    "id_categoria" => $_POST["nuevaCategoria"],
                    "codigo" => $_POST["nuevoCodigo"],
                    "descripcion" => $_POST["nuevaDescripcion"],
                    "stock" => $_POST["nuevoStock"],
                    "precio_compra" => $_POST["nuevoPrecioCompra"],
                    "precio_venta" => $_POST["nuevoPrecioVenta"],
                    "imagen" => $ruta,
                    "id_marca" => $_POST["nuevaMarca"],
                    "fecha_vencimiento" => $_POST["fechaVencimiento"]
                );

                $respuesta = ModeloProductos::mdlIngresarProducto($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                        swal({
                            type: "success",
                            title: "El producto ha sido guardado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result) {
                            if (result.value) {
                                window.location = "productos";
                            }
                        });
                    </script>';
                }
            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "¡El producto no puede ir con los campos vacíos o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "productos";
                        }
                    });
                </script>';
            }
        }
    }
}
