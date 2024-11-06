<?php
require_once "controladores/productos.controlador.php";
require_once "modelos/productos.modelo.php";
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Administrar productos</h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar productos</li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
          Agregar producto
        </button>
      </div>

      <div class="box-body">
       <table id="tablaCategorias" class="table table-bordered table-striped dt-responsive tablas" width="100%">
        <thead>
         <tr>
           <th style="width:10px">#</th>
           <th>Imagen</th>
           <th>Código</th>
           <th>Descripción</th>
           <th>Categoría</th>
           <th>Stock</th>
           <th>Precio de compra</th>
           <th>Precio de venta</th>
           <th>Estado</th>
           <th>Agregado</th>
           <th>Acciones</th>
         </tr> 
        </thead>
        <tbody>
          <?php
            $item = null;
            $valor = null;
            $orden = ""; // Agrega un valor predeterminado si no necesitas ordenar.
            $productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

            foreach ($productos as $key => $value) {
              echo '<tr>
                      <td>'.($key+1).'</td>
                      <td><img src="'.$value["imagen"].'" width="40px"></td>
                      <td>'.$value["codigo"].'</td>
                      <td>'.$value["descripcion"].'</td>
                      <td>'.$value["categoria"].'</td>
                      <td>'.$value["stock"].'</td>
                      <td>'.$value["precio_compra"].'</td>
                      <td>'.$value["precio_venta"].'</td>
                      <td>'.$value["estado"].'</td>
                      <td>'.$value["fecha_agregado"].'</td>
                      <td>
                        <div class="btn-group">
                          <button class="btn btn-warning btnEditarProducto" idProducto="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarProducto"><i class="fa fa-pencil"></i></button>
                          <button class="btn btn-danger btnEliminarProducto" idProducto="'.$value["id"].'" imagen="'.$value["imagen"].'"><i class="fa fa-times"></i></button>
                        </div>
                      </td>
                    </tr>';
            }
          ?>
        </tbody>
       </table>
      </div>
    </div>
  </section>
</div>

<!-- MODAL AGREGAR PRODUCTO -->
<div id="modalAgregarProducto" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar producto</h4>
        </div>
        
        <div class="modal-body">
            <!-- Selección de categoría -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                <select class="form-control input-lg Seleccionar-categorias" id="nuevaCategoria" name="nuevaCategoria" required>
                  <option value="">Seleccionar categoría</option>
                  <?php
                    $item = null;
                    $valor = null;
                    $categorias = ControladorCategoria::ctrMostrarCategoria($item, $valor);
                    foreach ($categorias as $key => $value) {
                      echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                    }
                  ?>
                </select>
              </div>
            </div>
            
            
      
            <!-- Código -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 
                <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar código" readonly required>
              </div>
            </div>
            <!-- Descripción -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar descripción" required autocomplete="off">
              </div>
            </div>
            <!-- Stock -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-check"></i></span> 
                <input type="number" class="form-control input-lg" name="nuevoStock" min="0" placeholder="Stock" required>
              </div>
            </div>
            <!-- Precio de compra y venta -->
            <div class="form-group row">
              <div class="col-xs-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 
                  <input type="number" class="form-control input-lg" id="nuevoPrecioCompra" name="nuevoPrecioCompra" step="any" min="0" placeholder="Precio de compra" required>
                </div>
              </div>
              <div class="col-xs-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 
                  <input type="number" class="form-control input-lg" id="nuevoPrecioVenta" name="nuevoPrecioVenta" step="any" min="0" placeholder="Precio de venta" required>
                </div>
                <br>
              </div>
            </div>
              <!-- Checkbox y campo de porcentaje alineados según la referencia -->
            <div class="form-group" style="display: flex; align-items: center; margin-top: 10px;">
              
              <!-- Checkbox y texto alineado a la izquierda -->
              <label style="margin-left: 245px;">
                <input type="checkbox" class="minimal porcentaje" checked>
                Utilizar porcentaje
              </label>

              <!-- Campo de porcentaje alineado a la derecha, con tamaño ajustado -->
              <div class="input-group" style="width: 150px; margin-left: auto;">
                <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required style="text-align: center;">
                <span class="input-group-addon"><i class="fa fa-percent"></i></span>
              </div>
            </div>

            <!-- Subir imagen -->
            <div class="form-group">
              <div class="panel">SUBIR IMAGEN</div>
              <input type="file" class="nuevaImagen" name="nuevaImagen">
              <p class="help-block">Peso máximo de la imagen 2MB</p>
              <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
            </div>
          </div>
        
        <!-- Footer del modal con botones alineados -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar producto</button>
        </div>

        <?php
          $crearProducto = new ControladorProductos();
          $crearProducto -> ctrCrearProducto();
        ?>  
      </form>
    </div>
  </div>
</div>

<!-- CSS Estilos Personalizados -->
<style>
  body, .content-wrapper {
    background-color: #f4f6f9;
    color: #333;
  }

  .content-wrapper {
    min-height: 100vh;
    padding: 20px;
  }

  .box {
    background-color: #ffffff;
    box-shadow: 0 1px 3px rgba(0,0,0,0.2);
  }

  .table {
    background-color: #ffffff;
    width: 100%;
  }

  .btn-primary, .btn-warning, .btn-danger {
    color: #fff;
  }

  .btn-primary {
    background-color: #007bff;
    border-color: #007bff;
  }

  .btn-warning {
    background-color: #ffc107;
    border-color: #ffc107;
  }

  .btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
  }
</style>
