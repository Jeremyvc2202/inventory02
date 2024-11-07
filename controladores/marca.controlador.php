<?php

class ControladorMarca {

    // Método para agregar una nueva marca
    static public function ctrCrearMarca() {
        if (isset($_POST["descripcionMarca"])) {
            $tabla = "marcas"; // Nombre de la tabla en la base de datos
            $datos = array("descripcion" => $_POST["descripcionMarca"]);

            $respuesta = ModeloMarca::mdlIngresarMarca($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    window.location = "index.php?ruta=marca";
                </script>';
            }
        }
    }

    // Método para editar una marca
    static public function ctrEditarMarca() {
        if (isset($_POST["editarDescripcionMarca"])) {
            $tabla = "marcas";
            $datos = array(
                "id_marca" => $_POST["id_marca"],
                "descripcion" => $_POST["editarDescripcionMarca"]
            );

            $respuesta = ModeloMarca::mdlEditarMarca($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    window.location = "index.php?ruta=marca";
                </script>';
            }
        }
    }

    // Método para eliminar una marca
    public static function ctrEliminarMarca() {
        if (isset($_GET["idMarca"])) {
            $tabla = "marcas";
            $datos = $_GET["idMarca"];

            // Depuración
            echo "<script>console.log('ID para eliminar: " . $datos . "');</script>";

            $respuesta = ModeloMarca::mdlEliminarMarca($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    console.log("Eliminación exitosa");
                    window.location = "index.php?ruta=marca";
                </script>';
            } else {
                echo '<script>console.log("Error en la eliminación");</script>';
            }
        }
    }

    // Método para mostrar todas las marcas
    static public function ctrMostrarMarca($item, $valor) {
        $tabla = "marcas";
        $respuesta = ModeloMarca::mdlMostrarMarcas($tabla, $item, $valor);
        return $respuesta;
    }
}
