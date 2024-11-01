<div class="content-wrapper">
  <section class="content-header">
    <h1> Administrar categorías </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar categorías</li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
          Agregar categoría
        </button>
      </div>

      <div class="box-body">
       <table id="tablaCategorias" class="table table-bordered table-striped dt-responsive tablas">
        <thead>
         <tr>
           <th style="width:10px">#</th>
           <th>Nombre Categoria</th>
           <th>Estado</th>
           <th>Fecha</th>
           <th>Acciones</th>
         </tr> 
        </thead>

        <tbody>
          <?php
            $item = null;
            $valor = null;
            $categorias = ControladorCategoria::ctrMostrarCategoria($item, $valor);
            foreach ($categorias as $key => $value) {
                $estadoColor = $value["estado"] == 1 ? "green" : "red";
                $estadoTexto = $value["estado"] == 1 ? "Activo" : "Inactivo";
                
                echo '<tr>
                    <td>'.($key+1).'</td>
                    <td class="text-uppercase">'.$value["nombre"].'</td>
                    <td><span class="estado-bolita" style="background-color: '.$estadoColor.';"></span> '.$estadoTexto.'</td>
                    <td>'.$value["fecha"].'</td>
                    <td>
                      <div class="btn-group">
                        <button class="btn btn-warning btnEditarCategoria" idCategoria="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>
                        <a href="index.php?ruta=categoria&idCategoria='.$value["id"].'" class="btn btn-danger btnEliminarCategoria"><i class="fa fa-times"></i></a>
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

<!-- MODAL AGREGAR CATEGORIA -->
<div id="modalAgregarCategoria" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar categoría</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Ingresar categoría" required>
              </div>
            </div>
            <div class="form-group">
             
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                <input type="date" class="form-control input-lg" name="fechaCategoria" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar categoría</button>
        </div>
        <?php 
          $crearCategoria = new ControladorCategoria();
          $crearCategoria->ctrCrearCategoria();
        ?>
      </form>
    </div>
  </div>
</div>

<!-- MODAL EDITAR CATEGORIA -->
<div id="modalEditarCategoria" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar categoría</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" placeholder="Editar categoría" required>
                <input type="hidden" name="idCategoria" id="idCategoria" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-toggle-on"></i></span> 
                <select class="form-control input-lg" name="estadoCategoria" id="estadoCategoria" required>
                  <option value="1">Activo</option>
                  <option value="0">Inactivo</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                <input type="date" class="form-control input-lg" name="fechaCategoria" id="fechaCategoria" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
        <?php
          $editarCategoria = new ControladorCategoria();
          $editarCategoria->ctrEditarCategoria();
        ?>
      </form>
    </div>
  </div>
</div>

<?php
   $eliminarCategoria = new ControladorCategoria();
   $eliminarCategoria->ctrEliminarCategoria();
?>

<style>
  body, .content-wrapper, .modal-content {
    background-color: #f4f6f9;
    color: #333;
  }

  .content-wrapper {
    min-height: 100vh;
    padding: 80px;
  }

  .table {
    background-color: #ffffff;
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
  .estado-bolita {
    display: inline-block;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    margin-right: 5px;
  }
</style>
