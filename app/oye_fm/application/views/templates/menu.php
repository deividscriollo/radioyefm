<body class="no-skin" ng-app="MainApp" ng-controller="MenuCtrl">
    <div id="navbar" class="navbar navbar-default">
        <script type="text/javascript">
            try {
            ace.settings.check('navbar', 'fixed')
            } catch (e) {
            }
        </script>

        <div class="navbar-container" id="navbar-container">
            <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                <span class="sr-only">Toggle sidebar</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>
            </button>
            <div class="navbar-header pull-left">
                <a href="index.html" class="navbar-brand">
                    <small>
                        <i class="fa fa-database"></i>
                        OYE FM
                    </small>
                </a>
            </div>

            <div class="navbar-buttons navbar-header pull-right" role="navigation">
                <ul class="nav ace-nav">
                    <li class="grey">
                        <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                            <img class="nav-user-photo" src="<?php echo base_url(); ?>application/third_party/assets/avatars/user.jpg" alt="Jason's Photo" />
                            <span class="user-info">
                                <small>Bienvenido,</small>
                                {{usuario}}
                            </span>

                            <i class="ace-icon fa fa-caret-down"></i>
                        </a>

                        <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                            <li>
                                <a href="<?php echo base_url('usuarios/user_panel'); ?>">
                                    <i class="ace-icon fa fa-cog"></i>
                                    Panel de Usuario
                                </a>
                            </li>

                            <li>
                                <a href="profile.html">
                                    <i class="ace-icon fa fa-user"></i>
                                    Perfil
                                </a>
                            </li>

                            <li class="divider"></li>

                            <li>
                                <a href="<?php echo base_url('usuarios/auth/logout'); ?>">
                                    <i class="ace-icon fa fa-power-off"></i>
                                    Cerrar Sesion
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div><!--/.navbar-container -->
    </div>

    <div class="main-container" id="main-container">
        <script type="text/javascript">
                    try {
                    ace.settings.check('main-container', 'fixed')
                    } catch (e) {
            }
        </script>

        <div id="sidebar" class="sidebar                  responsive">
            <script type="text/javascript">
                try {
                ace.settings.check('sidebar', 'fixed')
                } catch (e) {
                }
            </script>

            <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                    <button class="btn btn-success">
                        <i class="ace-icon fa fa-signal"></i>
                    </button>

                    <button class="btn btn-info">
                        <i class="ace-icon fa fa-pencil"></i>
                    </button>

                    <button class="btn btn-warning">
                        <i class="ace-icon fa fa-users"></i>
                    </button>

                    <button class="btn btn-danger">
                        <i class="ace-icon fa fa-cogs"></i>
                    </button>
                </div>

                <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                    <span class="btn btn-success"></span>

                    <span class="btn btn-info"></span>

                    <span class="btn btn-warning"></span>

                    <span class="btn btn-danger"></span>
                </div>
            </div><!-- /.sidebar-shortcuts -->

            <ul class="nav nav-list">
                <li class="">
                    <a href="index.html">
                        <i class="menu-icon fa fa-tachometer"></i>
                        <span class="menu-text"> Home </span>
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-desktop"></i>
                        <span class="menu-text">
                            CLIENTES
                        </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <a href="<?php echo base_url(); ?>clientes/clientes">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Clientes
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

                <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-desktop"></i>
                        <span class="menu-text">
                            VENDEDORES
                        </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <a href="<?php echo base_url(); ?>vendedores/tipo_vendedor">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Tipo vendedor
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>

                    <ul class="submenu">
                        <li class="">
                            <a href="<?php echo base_url(); ?>vendedores/vendedores">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Vendedores
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

                <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-desktop"></i>
                        <span class="menu-text">
                            PROGRAMAS
                        </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <a href="<?php echo base_url(); ?>programas/tipo_programa">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Tipo programa
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>

                    <ul class="submenu">
                        <li class="">
                            <a href="<?php echo base_url(); ?>programas/programas">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Programas
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

                <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-desktop"></i>
                        <span class="menu-text">
                            PAQUETES
                        </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <a href="<?php echo base_url(); ?>paquetes/paquetes">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Paquetes
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>


            </ul><!-- /.nav-list -->

            <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
            </div>

            <script type="text/javascript">
                try {
                ace.settings.check('sidebar', 'collapsed')
                } catch (e) {
                }
            </script>