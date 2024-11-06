<?php

require_once "conexion.php";

class ModeloProductos {

    /*=============================================
    MOSTRAR PRODUCTOS
    =============================================*/
    static public function mdlMostrarProductos($tabla, $item, $valor, $orden = null) {
        if ($item != null) {
            $sql = "SELECT * FROM $tabla WHERE $item = :$item";
            if (!empty($orden)) {
                $sql .= " ORDER BY $orden DESC";
            }
            $stmt = Conexion::conectar()->prepare($sql);
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
        } else {
            $sql = "SELECT * FROM $tabla";
            if (!empty($orden)) {
                $sql .= " ORDER BY $orden DESC";
            }
            $stmt = Conexion::conectar()->prepare($sql);
        }

        $stmt->execute();
        if ($item != null) {
            return $stmt->fetch();
        } else {
            return $stmt->fetchAll();
        }
        $stmt->close();
        $stmt = null;
    }

    /*=============================================
    REGISTRO DE PRODUCTO
    =============================================*/
    static public function mdlIngresarProducto($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_categoria, codigo, descripcion, imagen, stock, precio_compra, precio_venta, id_marca, fecha_vencimiento) VALUES (:id_categoria, :codigo, :descripcion, :imagen, :stock, :precio_compra, :precio_venta, :id_marca, :fecha_vencimiento)");

        $stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
        $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
        $stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_INT);
        $stmt->bindParam(":precio_compra", $datos["precio_compra"], PDO::PARAM_STR);
        $stmt->bindParam(":precio_venta", $datos["precio_venta"], PDO::PARAM_STR);
        $stmt->bindParam(":id_marca", $datos["id_marca"], PDO::PARAM_INT);
        $stmt->bindParam(":fecha_vencimiento", $datos["fecha_vencimiento"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
}
