<?php

require_once "conexion.php";

class ModeloProductos{

	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function mdlMostrarProductos($tabla, $item, $valor, $orden = null){

		if($item != null){
			// Consulta con una condición específica
			$sql = "SELECT * FROM $tabla WHERE $item = :$item";
			
			// Agregar cláusula ORDER BY si $orden tiene un valor
			if (!empty($orden)) {
				$sql .= " ORDER BY $orden DESC";
			}

			$stmt = Conexion::conectar()->prepare($sql);
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		} else {
			// Consulta sin una condición específica
			$sql = "SELECT * FROM $tabla";
			
			// Agregar cláusula ORDER BY si $orden tiene un valor
			if (!empty($orden)) {
				$sql .= " ORDER BY $orden DESC";
			}

			$stmt = Conexion::conectar()->prepare($sql);
		}

		$stmt -> execute();

		// Retornar múltiples resultados si no hay filtro ($item es null)
		if ($item != null) {
			return $stmt -> fetch();
		} else {
			return $stmt -> fetchAll();
		}

		$stmt -> close();
		$stmt = null;
	}

	/*=============================================
	REGISTRO DE PRODUCTO
	=============================================*/
	static public function mdlIngresarProducto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_categoria, codigo, descripcion, imagen, stock, precio_compra, precio_venta) VALUES (:id_categoria, :codigo, :descripcion, :imagen, :stock, :precio_compra, :precio_venta)");

		$stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
		$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_compra", $datos["precio_compra"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_venta", $datos["precio_venta"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	EDITAR PRODUCTO
	=============================================*/

	/*=============================================
	BORRAR PRODUCTO
	=============================================*/

	/*=============================================
	ACTUALIZAR PRODUCTO
	=============================================*/

	/*=============================================
	MOSTRAR SUMA VENTAS
	=============================================*/	

}
