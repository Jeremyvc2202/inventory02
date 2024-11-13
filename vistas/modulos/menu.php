<!-- Ícono de tres líneas para abrir el menú, ubicado en la esquina superior izquierda -->
<div class="menu-toggle" id="menu-toggle">
    <i class="fa fa-bars"></i>
</div>

<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar"></section>

<!-- Menú Lateral -->
<aside class="main-sidebar collapsed" id="sidebar">
    <section class="sidebar">
        <!-- Título del Menú -->
        <div class="menu-title">
            <h2>INICIO</h2>
        </div>
        
        <!-- Panel de Usuario (Oculto cuando está colapsado) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="vistas/img/jonh_2.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>John Perez</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU PRINCIPAL</li>
            <li class="treeview">
                <a href="#" onclick="toggleSubMenu()">
                    <i class="fa fa-archive"></i> <span>Almacén</span>
                    <span class="pull-right-container">
                        <i id="almacenArrow" class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" id="almacenSubmenu" style="display: none;">
                    <li><a href="categoria">Categorias</a></li>
                    <li><a href="productos">Productos</a></li>
                    <li><a href="marca">Marcas</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#" onclick="toggleVentasSubMenu()">
                    <i class="fa fa-list-ul"></i> 
                    <span>Ventas</span>
                    <span class="pull-right-container">
                        <i id="ventasArrow" class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" id="ventasSubmenu" style="display: none;">
                    <li><a href="ventas"><i class="fa fa-circle-o"></i> Administrar ventas</a></li>
                    <li><a href="crear-venta"><i class="fa fa-circle-o"></i> Crear venta</a></li>
                    <li><a href="reportes"><i class="fa fa-circle-o"></i> Reporte de ventas</a></li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

<!-- JavaScript para alternar la visibilidad del menú y el icono de flecha -->
<script>
    // Toggle del submenú de "Almacén"
    function toggleSubMenu() {
        const subMenu = document.getElementById('almacenSubmenu');
        const arrowIcon = document.getElementById('almacenArrow');

        if (subMenu.style.display === 'none') {
            subMenu.style.display = 'block';
            arrowIcon.classList.remove('fa-angle-left');
            arrowIcon.classList.add('fa-angle-down');
        } else {
            subMenu.style.display = 'none';
            arrowIcon.classList.remove('fa-angle-down');
            arrowIcon.classList.add('fa-angle-left');
        }
    }

    // Toggle del submenú de "Ventas"
    function toggleVentasSubMenu() {
        const ventasSubMenu = document.getElementById('ventasSubmenu');
        const ventasArrow = document.getElementById('ventasArrow');

        if (ventasSubMenu.style.display === 'none') {
            ventasSubMenu.style.display = 'block';
            ventasArrow.classList.remove('fa-angle-left');
            ventasArrow.classList.add('fa-angle-down');
        } else {
            ventasSubMenu.style.display = 'none';
            ventasArrow.classList.remove('fa-angle-down');
            ventasArrow.classList.add('fa-angle-left');
        }
    }

    // Toggle del menú lateral
    document.getElementById("menu-toggle").addEventListener("click", function(event) {
        const sidebar = document.getElementById("sidebar");
        sidebar.classList.toggle("collapsed");
        event.stopPropagation(); // Evita que el clic cierre el menú inmediatamente
    });

    // Cierra el menú al hacer clic fuera de él
    document.addEventListener("click", function(event) {
        const sidebar = document.getElementById("sidebar");
        const toggle = document.getElementById("menu-toggle");
        if (!sidebar.contains(event.target) && !toggle.contains(event.target)) {
            sidebar.classList.add("collapsed");
        }
    });
</script>

<!-- CSS para el estilo mejorado y la transición -->
<style>
    /* Ícono de tres líneas, fijo en la esquina superior izquierda */
    .menu-toggle {
        position: fixed;
        top: 10px;
        left: 10px;
        font-size: 24px;
        cursor: pointer;
        z-index: 1000;
        color: white;
    }

    /* Menú lateral superpuesto */
    .main-sidebar {
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        background-color: #111;
        color: white;
        transform: translateX(-250px); /* Colapsado por defecto */
        transition: transform 0.3s ease;
        z-index: 1000;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
    }

    /* Expande el menú cuando se elimina la clase 'collapsed' */
    .main-sidebar:not(.collapsed) {
        transform: translateX(0);
    }

    /* Estilos para el título del menú */
    .menu-title {
        font-size: 22px;
        padding: 20px;
        font-weight: bold;
        text-align: center;
        border-bottom: 1px solid #333;
    }

    /* Panel de usuario estilizado */
    .user-panel {
        padding: 15px;
        display: flex;
        align-items: center;
        gap: 10px;
        border-bottom: 1px solid #333;
    }

    .user-panel .image img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 2px solid #555;
    }

    .user-panel .info {
        display: flex;
        flex-direction: column;
        font-size: 14px;
    }

    /* Sidebar Menu */
    .sidebar-menu {
        padding-left: 0;
    }

    .sidebar-menu .treeview > a {
        padding: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 16px;
        color: #ddd;
        transition: background 0.3s;
    }

    .sidebar-menu .treeview-menu {
        padding-left: 20px;
        font-size: 14px;
    }

    /* Estilo para el texto del menú activo */
    .sidebar-menu .treeview-menu a {
        color: #aaa;
        transition: color 0.3s;
    }

    .sidebar-menu .treeview-menu a:hover {
        color: #fff;
    }
</style>

<!-- Incluye Font Awesome si no está disponible -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
