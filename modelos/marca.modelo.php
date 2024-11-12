<?php

require_once "conexion.php";

class ModeloMarca {

    // Método para ingresar una marca nueva en la base de datos
    public static function mdlIngresarMarca($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (descripcion) VALUES (:descripcion)");
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            $stmt->closeCursor();
            $stmt = null;  
            return "ok";
        } else {
            $stmt->closeCursor();
            $stmt = null;
            return "error";
        }
    }

    // Método para editar una marca existente
    public static function mdlEditarMarca($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET descripcion = :descripcion WHERE id_marca = :id_marca");
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":id_marca", $datos["id_marca"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            $stmt->closeCursor();
            $stmt = null;
            return "ok";
        } else {
            $stmt->closeCursor();
            $stmt = null;
            return "error";
        }
    }

    // Método para eliminar una marca de la base de datos
    public static function mdlEliminarMarca($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_marca = :id_marca");
        $stmt->bindParam(":id_marca", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $stmt->closeCursor();
            $stmt = null;
            return "ok";
        } else {
            $stmt->closeCursor();
            $stmt = null;
            return "error";
        }
    }

    // Método para mostrar una marca específica o todas las marcas
    public static function mdlMostrarMarcas($tabla, $item, $valor) {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            
            $resultado = $stmt->fetch();
            $stmt->closeCursor();
            $stmt = null;
            return $resultado ? $resultado : false;
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            $stmt->closeCursor();
            $stmt = null;
            return $resultado;
        }
    }

    // Método para mostrar productos con el nombre de la marca en lugar del ID de la marca
    public static function mdlMostrarProductosConMarca($tablaProductos, $tablaMarcas) {
        $stmt = Conexion::conectar()->prepare("SELECT p.*, m.descripcion AS marca 
                                               FROM $tablaProductos p
                                               JOIN $tablaMarcas m ON p.id_marca = m.id_marca");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        $stmt->closeCursor();
        $stmt = null;
        return $resultado;
    }

    // Método específico para verificar si una marca ya existe
    public static function mdlMarcaExiste($tabla, $descripcion) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE descripcion = :descripcion");
        $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
        $stmt->execute();
        
        $resultado = $stmt->fetch();
        $stmt->closeCursor();
        $stmt = null;
        return $resultado ? true : false;
    }
}
