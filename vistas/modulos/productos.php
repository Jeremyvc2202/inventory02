<?php 
require_once "controladores/productos.controlador.php";
require_once "modelos/productos.modelo.php";
require_once "controladores/marca.controlador.php";
require_once "modelos/marca.modelo.php";
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
           <th style="width:10px"></th>
           <th>Imagen</th>
           <th>Código</th>
           <th>Descripción</th>
           <th>Categoría</th>
           <th>Marca</th>
           <th>Stock</th>
           <th>Precio de compra</th>
           <th>Precio de venta</th>
           <th>Estado</th>
           <th>Fecha de Vencimiento</th>
           <th>Acciones</th>
         </tr> 
        </thead>
        <tbody>
          <?php
            $item = null;
            $valor = null;
            $orden = "";
            $productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

            foreach ($productos as $key => $value) {
              echo '<tr>
                      <td>'.($key+1).'</td>
                      <td><img src="'.$value["imagen"].'" width="40px"></td>
                      <td>'.$value["codigo"].'</td>
                      <td>'.$value["descripcion"].'</td>
                      <td>'.$value["id_categoria"].'</td>
                      <td>'.$value["id_marca"].'</td>
                      <td>'.$value["stock"].'</td>
                      <td>'.$value["precio_compra"].'</td>
                      <td>'.$value["precio_venta"].'</td>
                      <td>
                        <input type="checkbox" class="toggle-switch" data-id="'.$value["id"].'" '.($value["estado"] == 1 ? "checked" : "").'>
                      </td>
                      <td>'.$value["fecha_vencimiento"].'</td>
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
                  <option value="">Seleccionar Categoría</option>
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

            <!-- Selección de marca con búsqueda -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tags"></i></span>
                <select class="form-control input-lg select2" id="nuevaMarca" name="nuevaMarca">
                  <option value="">Seleccionar marca</option>
                  <?php
                    $item = null;
                    $valor = null;
                    $marcas = ControladorMarca::ctrMostrarMarca($item, $valor);
                    foreach ($marcas as $key => $value) {
                      echo '<option value="'.$value["id_marca"].'">'.$value["descripcion"].'</option>';
                    }
                  ?>
                </select>
              </div>
            </div>
            <!-- Campo de fecha de vencimiento -->
            <div class="form-group">
              <div class="input-group date">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="text" class="form-control input-lg datepicker" id="fechaVencimiento" name="fechaVencimiento" placeholder="Fecha de vencimiento" required>
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
            <!-- Checkbox y campo de porcentaje alineados -->
            <div class="form-group" style="display: flex; align-items: center; margin-top: 10px;">
              <label style="margin-left: 245px;">
                <input type="checkbox" class="minimal porcentaje" checked id="utilizarPorcentaje">
                Utilizar porcentaje
              </label>
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
              <input type="hidden" name="imagenActual" id="imagenActual">
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

<!-- CSS Estilo -->
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

  /* Toggle switch */
  .toggle-switch {
    position: relative;
    width: 40px;
    height: 20px;
    -webkit-appearance: none;
    background-color: #ddd;
    outline: none;
    border-radius: 20px;
    transition: background 0.3s;
    cursor: pointer;
  }

  .toggle-switch:checked {
    background-color: #4CAF50;
  }

  .toggle-switch::after {
    content: '';
    position: absolute;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    top: 1px;
    left: 1px;
    background-color: #fff;
    transition: 0.3s;
  }

  .toggle-switch:checked::after {
    left: 21px;
  }
</style>

<script>
  $(document).ready(function() {
    $('.select2').select2({
      placeholder: "Seleccionar marca",
      allowClear: true
    });

    $('.datepicker').datepicker({
      format: 'yyyy-mm-dd',  
      startDate: new Date(), 
      autoclose: true,       
      todayHighlight: true   
    });

    // Toggle switch update state
    document.querySelectorAll('.toggle-switch').forEach(switchElement => {
      switchElement.addEventListener('change', function() {
        const idProducto = this.getAttribute('data-id');
        const estado = this.checked ? 1 : 0;

        const datos = new FormData();
        datos.append('idProducto', idProducto);
        datos.append('estado', estado);

        fetch('ajax/productos.ajax.php', {
          method: 'POST',
          body: datos
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            console.log('Estado actualizado correctamente');
          } else {
            console.log('Error al actualizar el estado');
          }
        })
        .catch(error => console.error('Error:', error));
      });
    });
  });
</script>
