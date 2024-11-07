<?php
require_once "controladores/marca.controlador.php";
require_once "modelos/marca.modelo.php";
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1> Administrar marcas </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar marcas</li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarMarca">
          Agregar marca
        </button>
      </div>

      <div class="box-body">
       <table id="tablaMarcas" class="table table-bordered table-striped dt-responsive tablas">
        <thead>
         <tr>
           <th style="width:10px">#</th>
           <th>Descripción</th>
           <th>Acciones</th>
         </tr> 
        </thead>

        <tbody>
          <?php
            $item = null;
            $valor = null;
            $marcas = ControladorMarca::ctrMostrarMarca($item, $valor);
            foreach ($marcas as $key => $value) {
                echo '<tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["descripcion"].'</td>
                    <td>
                      <div class="btn-group">
                        <button class="btn btn-warning btnEditarMarca" idMarca="'.$value["id_marca"].'" data-toggle="modal" data-target="#modalEditarMarca"><i class="fa fa-pencil"></i></button>
                        <a href="index.php?ruta=marca&idMarca='.$value["id_marca"].'" class="btn btn-danger btnEliminarMarca"><i class="fa fa-times"></i></a>
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

<!-- Modal Agregar Marca -->
<div id="modalAgregarMarca" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar marca</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <!-- Entrada para la descripción de la marca -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span> 
                <input type="text" class="form-control input-lg" name="descripcionMarca" placeholder="Ingresar descripción" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar marca</button>
        </div>
        <?php 
          $crearMarca = new ControladorMarca();
          $crearMarca->ctrCrearMarca();
        ?>
      </form>
    </div>
  </div>
</div>

<!-- Modal Editar Marca -->
<div id="modalEditarMarca" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar marca</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <!-- Entrada para la descripción de la marca -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span> 
                <input type="text" class="form-control input-lg" name="editarDescripcionMarca" id="editarDescripcionMarca" required>
                <input type="hidden" name="idMarca" id="idMarca" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
        <?php
          $editarMarca = new ControladorMarca();
          $editarMarca->ctrEditarMarca();
        ?>
      </form>
    </div>
  </div>
</div>

<!-- Ejecución de métodos del controlador -->
<?php
// Crear marca
$crearMarca = new ControladorMarca();
$crearMarca->ctrCrearMarca();

// Editar marca
$editarMarca = new ControladorMarca();
$editarMarca->ctrEditarMarca();

// Eliminar marca
$eliminarMarca = new ControladorMarca();
$eliminarMarca->ctrEliminarMarca();
?>

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
</style>
