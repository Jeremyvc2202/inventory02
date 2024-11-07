<?php

class ControladorMarca {

    // Método para agregar una nueva marca
    static public function ctrCrearMarca() {
        if (isset($_POST["descripcionMarca"])) {
            $tabla = "marcas"; 
            $descripcion = $_POST["descripcionMarca"];

            // Comprobar si la marca ya existe
            $marcaExistente = ModeloMarca::mdlMostrarMarcas($tabla, "descripcion", $descripcion);
            if ($marcaExistente !== false) {  // Muestra el error solo si encuentra una coincidencia
                echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "La marca ya existe",
                        text: "Intente con una descripción diferente.",
                        confirmButtonText: "Ok"
                    });
                </script>';
                return;
            }

            $datos = array("descripcion" => $descripcion);
            $respuesta = ModeloMarca::mdlIngresarMarca($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "¡Marca registrada!",
                        text: "La marca se ha creado exitosamente.",
                        showConfirmButton: false,
                        timer: 2000
                    }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {
                            window.location = "index.php?ruta=marca";
                        }
                    });
                </script>';
            } else {
                echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "No se pudo registrar la marca.",
                        confirmButtonText: "Ok"
                    });
                </script>';
            }
        }
    }

    // Método para editar una marca
    static public function ctrEditarMarca() {
        if (isset($_POST["editarDescripcionMarca"])) {
            $tabla = "marcas";
            $datos = array(
                "id_marca" => $_POST["idMarca"],
                "descripcion" => $_POST["editarDescripcionMarca"]
            );

            $respuesta = ModeloMarca::mdlEditarMarca($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "¡Marca editada!",
                        text: "Los cambios han sido guardados exitosamente.",
                        showConfirmButton: false,
                        timer: 2000
                    }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {
                            window.location = "index.php?ruta=marca";
                        }
                    });
                </script>';
            } else {
                echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "No se pudo editar la marca.",
                        confirmButtonText: "Ok"
                    });
                </script>';
            }
        }
    }

    // Método para eliminar una marca
    public static function ctrEliminarMarca() {
        if (isset($_GET["idMarca"])) {
            $tabla = "marcas";
            $datos = $_GET["idMarca"];

            $respuesta = ModeloMarca::mdlEliminarMarca($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "¡Marca eliminada!",
                        text: "La marca ha sido eliminada exitosamente.",
                        showConfirmButton: false,
                        timer: 2000
                    }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {
                            window.location = "index.php?ruta=marca";
                        }
                    });
                </script>';
            } else {
                echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "No se pudo eliminar la marca.",
                        confirmButtonText: "Ok"
                    });
                </script>';
            }
        }
    }

    // Método para mostrar todas las marcas
    static public function ctrMostrarMarca($item, $valor) {
        $tabla = "marcas";
        return ModeloMarca::mdlMostrarMarcas($tabla, $item, $valor);
    }
}
