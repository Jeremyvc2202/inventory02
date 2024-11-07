<?php

require_once "conexion.php";

class ModeloMarca {

    // Método para ingresar una marca nueva en la base de datos
    public static function mdlIngresarMarca($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (descripcion) VALUES (:descripcion)");
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->closeCursor();
        $stmt = null;  // Liberar la conexión
    }

    // Método para editar una marca existente
    public static function mdlEditarMarca($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET descripcion = :descripcion WHERE id_marca = :id_marca");
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":id_marca", $datos["id_marca"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->closeCursor();
        $stmt = null;  // Liberar la conexión
    }

    // Método para eliminar una marca de la base de datos
    public static function mdlEliminarMarca($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_marca = :id_marca");
        $stmt->bindParam(":id_marca", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->closeCursor();
        $stmt = null;  // Liberar la conexión
    }

    // Método para mostrar una marca específica o todas las marcas
    public static function mdlMostrarMarcas($tabla, $item, $valor) {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            
            // Fetch devuelve false si no encuentra registros, por lo que este return se adapta a ese comportamiento.
            $resultado = $stmt->fetch();
            return $resultado ? $resultado : false;  // Devuelve `false` si no encuentra coincidencias
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        $stmt->closeCursor();
        $stmt = null;  // Liberar la conexión
    }

    // Método específico para verificar si una marca ya existe (opcional)
    public static function mdlMarcaExiste($tabla, $descripcion) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE descripcion = :descripcion");
        $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
        $stmt->execute();
        
        // Este método retorna `true` si la marca existe, `false` si no existe
        $resultado = $stmt->fetch();
        $stmt->closeCursor();
        $stmt = null;  // Liberar la conexión
        return $resultado ? true : false;
    }
}
