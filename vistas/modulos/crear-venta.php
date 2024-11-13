<div class="content-wrapper">

  <section class="content-header">
    <h1>Crear venta</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Crear venta</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">

      <!--=====================================
      EL FORMULARIO
      ======================================-->
      
      <div class="col-lg-5 col-xs-12">
        
        <div class="box box-success bordered-green"> <!-- Línea verde -->
          
          <div class="box-header with-border"></div>

          <form role="form" method="post" class="formularioVenta">

            <div class="box-body">
  
              <div class="box">

                <!-- ENTRADA DEL VENDEDOR -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                    <input type="text" class="form-control" id="nuevoVendedor" value="Administrador" readonly>
                  </div>
                </div> 

                <!-- ENTRADA DEL CÓDIGO -->
                <div class="form-group"> 
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="10001" readonly>
                  </div>
                </div>

                <!-- ENTRADA DEL CLIENTE -->
                <div class="form-group"> 
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <select class="form-control select-cliente" id="seleccionarCliente" name="seleccionarCliente" required autocomplete="off">
                      <option value="">Seleccionar cliente</option>
                    </select>
                    <span class="input-group-addon">
                      <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar cliente</button>
                    </span>
                  </div>
                </div>

                <!-- ENTRADA PARA AGREGAR PRODUCTO -->
                <div class="form-group row"></div> 
                <input type="hidden" id="listaProductos" name="listaProductos">

                <!-- BOTÓN PARA AGREGAR PRODUCTO (HIDDEN EN PANTALLAS GRANDES) -->
                <button type="button" class="btn btn-default hidden-lg btnAgregarProducto">Agregar producto</button>
                <hr>

                <div class="row">
                  <!-- ENTRADA IMPUESTOS Y TOTAL -->
                  <div class="col-xs-8 pull-right ">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Impuesto</th>
                          <th>Total</th>      
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td style="width: 50%">
                            <div class="input-group">
                              <input type="number" class="form-control input-lg" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" placeholder="0" required>
                              <input type="hidden" name="nuevoPrecioImpuesto" id="nuevoPrecioImpuesto" required>
                              <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto" required>
                              <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                            </div>
                          </td>
                          <td style="width: 50%">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-money"></i></span>
                              <input type="text" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" placeholder="00000" readonly required>
                              <input type="hidden" name="totalVenta" id="totalVenta">
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <hr>

                <!-- ENTRADA MÉTODO DE PAGO -->
                <div class="form-group row ">
                  <div class="col-xs-6" style="padding-right:0px">
                    <div class="input-group">
                      <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                        <option value="">Seleccione método de pago</option>
                        <option value="Efectivo">Efectivo</option>
                        <option value="TC">Tarjeta Crédito</option>
                        <option value="TD">Tarjeta Débito</option>                  
                      </select>    
                    </div>
                  </div>
                  <div class="cajasMetodoPago"></div>
                  <input type="hidden" id="listaMetodoPago" name="listaMetodoPago">
                </div>

                <!-- BOTÓN GUARDAR VENTA DENTRO DEL FORMULARIO -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block guardar-venta">Guardar venta</button>
                </div>

              </div>
            </div>

          </form>

        </div>
            
      </div>

      <!-- TABLA DE PRODUCTOS -->
      <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
        <div class="box box-warning bordered-orange"> <!-- Línea naranja -->
          <div class="box-header with-border"></div>
          <div class="box-body">
            <table class="table table-bordered table-striped dt-responsive tablaVentas">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Código</th>
                  <th>Descripcion</th>
                  <th>Stock</th>
                  <th>Precio Venta</th>
                  <th>Precio Mayor</th>
                  <th>Acciones</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>

    </div>

  </section>

</div>

<!-- ESTILOS CSS PERSONALIZADOS -->
<style>
  /* Fondo general en gris claro */
  body, .content-wrapper {
    background-color: #e9ecef; /* Gris claro */
    color: #333;
  }

  .content-wrapper {
    min-height: 100vh;
    padding: 20px;
  }

  /* Cajas de contenido con un gris muy claro */
  .box {
    background-color: #f7f8fa;
    border-radius: 5px;
    padding: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  /* Estilo del botón "Guardar venta" */
  .guardar-venta {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 12px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
  }

  .guardar-venta:hover {
    background-color: #45a049;
  }

  /* Bordes superiores de colores */
  .bordered-green {
    border-top: 4px solid #4CAF50; /* Verde */
    padding-top: 5px;
  }

  .bordered-orange {
    border-top: 4px solid #ff9800; /* Naranja */
    padding-top: 5px;
  }
</style>
