<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Pagina de Accesos - Oye Fm</title>

        <meta name="description" content="User login page" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/third_party/assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/third_party/assets/font-awesome/4.2.0/css/font-awesome.min.css" />

        <!-- text fonts -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/third_party/assets/fonts/fonts.googleapis.com.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/third_party/assets/css/ace.min.css" />

        <!--[if lte IE 9]>
                <link rel="stylesheet" href="assets/css/ace-part2.min.css" />
        <![endif]-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/third_party/assets/css/ace-rtl.min.css" />

        <!--[if lte IE 9]>
          <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
        <![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript">
            var appOye_fm = {};
            appOye_fm.urlAuth = '<?= base_url() . 'auth' ?>';
        </script>
        <script src="<?php echo base_url(); ?>application/third_party/assets/js/jquery.2.1.1.min.js"></script>
        <script src="<?php echo base_url(); ?>application/third_party/js/angular.min.js"></script>
        <script src="<?php echo base_url(); ?>application/modules/usuarios/js/login.js"></script>
    </head>

    <body class="login-layout login-layout light-login" ng-app="LoginApp" ng-controller="userCtrl">
        <div class="main-container">
            <div class="main-content">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="login-container">
                            <div class="center">
                                <h1>
                                    <i class="ace-icon fa fa-coffee green"></i>
                                    <span class="red">OYE FM</span>
                                    <span class="white" id="id-text2">Admin</span>
                                </h1>
                                <h4 class="blue" id="id-company-text">&copy; Conceptual Business Group</h4>
                            </div>

                            <div class="space-6"></div>

                            <div class="position-relative">
                                <div id="login-box" class="login-box visible widget-box no-border"> <!--login box-->
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <h4 class="header blue lighter bigger">
                                                <i class="ace-icon fa fa-database red"></i>
                                                Ingrese su Informacion
                                            </h4>

                                            <div class="space-6"></div>

                                            <form name="loginForm" action="<?php echo base_url('usuarios/auth'); ?>" method="post" novalidate>
                                                <fieldset>
                                                    <div class="red"><?php echo $this->dx_auth->get_auth_error(); ?></div>
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="text" class="form-control" placeholder="Usuario" name="username" ng-model="auth.user" ng-minlength="4" ng-maxlength="25" required value="<?php var_dump(set_value('username')); ?>"/>
                                                            <i class="ace-icon fa fa-user"></i>
                                                        </span>
                                                        <div ng-show="loginForm.username.$error.required && !loginForm.username.$pristine" class="red">El campo Usuario es requerido.</div>
                                                        <div ng-show="loginForm.username.$error.minlength" class="red">El campo Usuario es muy pequeño, minimo 4 caracteres.</div>
                                                        <div ng-show="loginForm.username.$error.maxlength" class="red">El campo Usuario es muy grande, maximo 25 caracteres.</div>
                                                    </label>

                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="password" class="form-control" placeholder="Contraseña" name="password" ng-model="auth.password" ng-minlength="4" ng-maxlength="25" required/>
                                                            <i class="ace-icon fa fa-lock"></i>
                                                        </span>
                                                        <div ng-show="loginForm.password.$error.required && !loginForm.password.$pristine" class="red">El campo Contraseña es requerido.</div>
                                                        <div ng-show="loginForm.password.$error.minlength" class="red">El campo Contraseña es muy pequeño, minimo 4 caracteres.</div>
                                                        <div ng-show="loginForm.password.$error.maxlength" class="red">El campo Contraseña es muy grande, maximo 25 caracteres.</div>
                                                    </label>

                                                    <div class="space"></div>

                                                    <div class="clearfix">
                                                        <label class="inline">
                                                            <input type="checkbox" class="ace" name="remember" value="1" ng-model="auth.recordarme"/>
                                                            <span class="lbl"> Recordarme</span>
                                                        </label>

                                                        <button type="submit" class="width-35 pull-right btn btn-sm btn-primary" ng-disabled="loginForm.$invalid" ng-click="login()">
                                                            <i class="ace-icon fa fa-key"></i>
                                                            <span class="bigger-110">Login</span>
                                                        </button>
                                                    </div>

                                                    <div class="space-4"></div>
                                                </fieldset>
                                            </form>

                                            <div class="social-or-login center">
                                                <span class="bigger-110">Or Login Using</span>
                                            </div>

                                            <div class="space-6"></div>

                                            <div class="social-login center">
                                                <a class="btn btn-primary">
                                                    <i class="ace-icon fa fa-facebook"></i>
                                                </a>

                                                <a class="btn btn-info">
                                                    <i class="ace-icon fa fa-twitter"></i>
                                                </a>

                                                <a class="btn btn-danger">
                                                    <i class="ace-icon fa fa-google-plus"></i>
                                                </a>
                                            </div>
                                        </div><!-- /.widget-main -->

                                        <div class="toolbar clearfix">
                                            <div>
                                                <a href="<?php echo base_url('usuarios/auth/forgot_password'); ?>" data-target="#forgot-box" class="forgot-password-link">
                                                    <i class="ace-icon fa fa-arrow-left"></i>
                                                    Olvide mi contraseña
                                                </a>
                                            </div>

                                            <div>
                                                <a href="<?php echo base_url('usuarios/auth/register'); ?>" data-target="#signup-box" class="user-signup-link">
                                                    Registrar me
                                                    <i class="ace-icon fa fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- /.widget-body -->
                                </div><!-- /.login-box -->
                            </div><!-- /.position-relative -->
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.main-content -->
        </div><!-- /.main-container -->

        <!--[if !IE]> -->
        <script type="text/javascript">
                    window.jQuery || document.write("<script src='<?php echo base_url(); ?>application/third_party/assets/js/jquery.min.js'>" + "<" + "/script>");
        </script>

        <!-- <![endif]-->

        <script type="text/javascript">
                    if ('ontouchstart' in document.documentElement)
                        document.write("<script src='<?php echo base_url(); ?>application/third_party/assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>
    </body>
</html>
