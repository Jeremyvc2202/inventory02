

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <!-- icono -->
    <link rel="shortcut icon" href="vistas/img/plantilla/logo.png" type="image/x-icon">
    <!-- plugins css -->
    <!-- bootstrap 3.3.7 -->
    <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
    <!-- theme style -->
    <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
    <!-- AdminLTE Skins -->
    <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">
    <!-- switch -->
    <link rel="stylesheet" href="vistas/dist/css/switch.css">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- DataTable -->
    <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
    <!-- checkbox -->
    <link rel="stylesheet" href="vistas/plugins/iCheck/all.css">
    <!-- Datarange picker -->
    <link rel="stylesheet" href="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- morris chart -->
    <link rel="stylesheet" href="vistas/bower_components/morris.js/morris.css">
    <!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- PLUGINS DE JAVASCRIPT -->
    <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- bootstrap 3.3.7 -->
    <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- fastClick -->
    <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="vistas/dist/js/adminlte.min.js"></script>
    <!-- DataTable -->
    <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
    <!-- SweetAlert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- sweetAlert registrar marcas -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- InputMask -->
    <script src="vistas/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="vistas/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="vistas/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- iCheck -->
    <script src="vistas/plugins/iCheck/icheck.min.js"></script>
    <!-- jQuery Number -->
    <script src="vistas/plugins/jqueryNumber/jquerynumber.min.js"></script>
    <!-- datarangepicker -->
    <script src="vistas/bower_components/moment/min/moment.min.js"></script>
    <script src="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- morris.js -->
    <script src="vistas/bower_components/raphael/raphael.min.js"></script>
    <script src="vistas/bower_components/morris.js/morris.min.js"></script>
    <!-- chart js -->
    <script src="vistas/bower_components/Chart.js/Chart.js"></script>
    <link rel="icon" type="image/png" href="images/DB_16х16.png">
    <!-- Incluir CSS de Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <!-- Incluir JS de Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <!-- CSS de Bootstrap Datepicker -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <!-- JS de Bootstrap Datepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>



    <!-- Estilos CSS necesarios -->
    <link rel="stylesheet" href="vistas/dist/css/lib/getmdl-select.min.css">
    <link rel="stylesheet" href="vistas/dist/css/lib/nv.d3.min.css">
    <link rel="stylesheet" href="vistas/dist/css/application.min.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,100,700,900' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
    <!-- url amigables -->
    <?php
    // Llamando al cabezote
    include "modulos/cabezote.php";
    // Llamando al menú
    include "modulos/menu.php";
    if (isset($_GET["ruta"])) {
        if ($_GET["ruta"] == "inicio" ||
            $_GET["ruta"] == "categoria" ||
            $_GET["ruta"] == "usuarios" ||
            $_GET["ruta"] == "productos" ||
            $_GET["ruta"] == "marca" ||  // Faltaba esta coma
            $_GET["ruta"] == "salir") {

            include "modulos/" . $_GET["ruta"] . ".php";

        } else {
            include "modulos/404.php";
        }
    } else {
        include "modulos/inicio.php";
    }
    // Llamando a footer
    include "modulos/footer.php";
?>

        
    </div>
    <!-- dataTable spanish -->
    <script src="vistas/js/plantilla.js"></script>
    <!-- categoria -->
    <script src="vistas/js/categoria.js"></script>
    <!-- Productos -->
    <script src="vistas/js/productos.js"></script>
    <!-- Marcas -->
    <script src="vistas/js/marca.js"></script>
</body>

</html>
