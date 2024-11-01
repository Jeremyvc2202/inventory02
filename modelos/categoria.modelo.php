<?php
require_once "conexion.php";

class ModeloCategoria {
    // Crear o registrar categoría
    public static function mdlIngresarCategoria($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, estado, fecha) VALUES (:nombre, :estado, :fecha)");
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_BOOL);
        
        // Añadimos el parámetro fecha con el valor actual
        $fecha_actual = date("Y-m-d H:i:s");
        $stmt->bindParam(":fecha", $fecha_actual, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "OK";
        } else {
            return "Error";
        }

        $stmt->close();
        $stmt = null;
    }

    // Mostrar categorías
    public static function mdlMostrarCategoria($tabla, $item, $valor) {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();   
            return $stmt->fetchAll();  
        }

        $stmt->close();
        $stmt = null;   
    }

    // Editar categoría
    public static function mdlEditarCategoria($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, estado = :estado, fecha = :fecha WHERE id = :id");
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_BOOL);
        $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "OK";
        } else {
            return "Error";
        }

        $stmt->close();
        $stmt = null;
    }

    // Eliminar categoría
    public static function mdlEliminarCategoria($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "OK";
        } else {
            return "Error";
        }

        $stmt->close();
        $stmt = null;
    }
}
