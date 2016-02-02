<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Cancelar Cuenta - Oye Fm</title>

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

                                <div id="signup-box" class="signup-box widget-box visible no-border"> <!-- signup-box -->
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <h4 class="header red lighter bigger">
                                                <i class="ace-icon fa fa-lock red"></i>
                                                Cancelar Cuenta
                                            </h4>

                                            <div class="space-6"></div>
                                            <p> Ingrese sus datos: </p>

                                            <form name="cancelForm" novalidate action="<?php echo base_url('usuarios/auth/cancel_account'); ?>" method="post">
                                                <fieldset>                                                    
                                                    <div class="red"><?php echo $this->dx_auth->get_auth_error(); ?></div>
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="password" class="form-control" placeholder="Contraseña" name="password" ng-model="password" ng-minlength="4" ng-maxlength="25" required/>
                                                            <i class="ace-icon fa fa-lock"></i>
                                                        </span>
                                                        <div class="red"><?php echo form_error('password'); ?></div>
                                                        <div ng-show="cancelForm.password.$error.required && !cancelForm.password.$pristine" class="red">El campo Contraseña anterior es requerido.</div>
                                                        <div ng-show="cancelForm.password.$error.minlength" class="red">El campo Contraseña es muy pequeño, minimo 4 caracteres.</div>
                                                        <div ng-show="cancelForm.password.$error.maxlength" class="red">El campo Contraseña es muy grande, maximo 25 caracteres.</div>
                                                    </label>

                                                    <label class="block clearfix" ng-controller="Ctrl">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="password" class="form-control" placeholder="Confirme contraseña" name="confirm_new_password" ng-model="confirm_password" ng-minlength="4" ng-maxlength="25" required nx-equal-ex="password"/>
                                                            <i class="ace-icon fa fa-retweet"></i>
                                                        </span>
                                                        <div ng-show="cancelForm.confirm_new_password.$error.required && !cancelForm.confirm_new_password.$pristine" class="red">El campo Contraseña es requerido.</div>
                                                        <div ng-show="cancelForm.confirm_new_password.$error.minlength" class="red">El campo Confirmar contraseña es muy pequeño, minimo 4 caracteres.</div>
                                                        <div ng-show="cancelForm.confirm_new_password.$error.maxlength" class="red">El campo Confirmar contraseña es muy grande, maximo 25 caracteres.</div>
                                                        <div ng-show="cancelForm.confirm_new_password.$error.nxEqualEx" class="red">Las Contraseñas no coinciden!</div>
                                                    </label>

                                                    <div class="space-24"></div>

                                                    <div class="clearfix ">
                                                        <button type="submit" class="width-65 pull-right btn btn-sm btn-danger" ng-disabled="cancelForm.$invalid">
                                                            <span class="bigger-110">Cancelar Cuenta</span>

                                                            <i class="ace-icon fa fa-lightbulb-o"></i>
                                                        </button>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>

                                        <div class="toolbar center">
                                            <a href="<?php echo base_url('usuarios/user_panel'); ?>" data-target="#login-box" class="back-to-login-link">
                                                <i class="ace-icon fa fa-arrow-left"></i>
                                                Regresar al login
                                            </a>
                                        </div>
                                    </div><!-- /.widget-body -->
                                </div><!-- /.signup-box -->
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