<header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
        
        <!-- Título centrado en el medio sin afectar los elementos a la derecha -->
        <h2 style="position: absolute; left: 50%; transform: translateX(-50%); margin: 0;">
            La Tiendita de John
        </h2>
        
        <!-- Espaciador para alinear los elementos a la derecha -->
        <div class="mdl-layout-spacer"></div>

        <div class="avatar-dropdown" id="icon">
            <span>John</span>
            <img src="vistas/img/jonh_2.png">
        </div>

        <!-- Account dropdown-->
        <ul class="mdl-menu mdl-list mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-shadow--2dp account-dropdown"
            for="icon">
            <li class="mdl-list__item mdl-list__item--two-line">
                <span class="mdl-list__item-primary-content">
                    <span class="material-icons mdl-list__item-avatar"></span>
                    <span>John Perez</span>
                    <span class="mdl-list__item-sub-title">Admin@gmail.com</span>
                </span>
            </li>
            <li class="list__item--border-top"></li>
            <li class="mdl-menu__item mdl-list__item">
                <span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-icon">account_circle</i>
                    Mi cuenta
                </span>
            </li>
            <li class="mdl-menu__item mdl-list__item">
                <span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-icon">perm_contact_calendar</i>
                    Mis eventos
                </span>
            </li>
            <li class="list__item--border-top"></li>
            <li class="mdl-menu__item mdl-list__item">
                <span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-icon">settings</i>
                    Configuraciones
                </span>
            </li>
            <a href="login.html">
                <li class="mdl-menu__item mdl-list__item">
                    <span class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-icon text-color--secondary">exit_to_app</i>
                        Cerrar Sesión
                    </span>
                </li>
            </a>
        </ul>

    </div>
</header>
