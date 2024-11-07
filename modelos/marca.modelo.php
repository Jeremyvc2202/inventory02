<?php

require_once "conexion.php";

class ModeloMarca {

    // Método para ingresar una marca nueva en la base de datos
    static public function mdlIngresarMarca($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (descripcion) VALUES (:descripcion)");
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    // Método para editar una marca existente
    static public function mdlEditarMarca($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET descripcion = :descripcion WHERE id_marca = :id_marca");
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":id_marca", $datos["id_marca"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    // Método para eliminar una marca de la base de datos
    static public function mdlEliminarMarca($tabla, $datos) {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_marca = :id_marca");
        $stmt->bindParam(":id_marca", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    // Método para mostrar las marcas
    static public function mdlMostrarMarcas($tabla, $item, $valor) {
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
}
