<script src="<?php echo base_url(); ?>application/modules/usuarios/js/users.js"></script>
</div>
<div class="main-content" ng-controller="usersCtrl">
    <div class="main-content-inner">
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                        try {
                            ace.settings.check('breadcrumbs', 'fixed')
                        } catch (e) {
                        }
            </script>

            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Home</a>
                </li>

                <li class="active">Panel de Usuario</li>
            </ul><!-- /.breadcrumb -->
        </div>

        <div class="page-content">            
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-header">
                    <h1 class="bigger lighter green">
                        <i class="ace-icon fa fa-cog"></i>
                        Panel de Usuario
                    </h1>
                </div>

                <div class="col-xs-offset-1">
                    <a ng-if="isAdmin" href="<?php echo base_url('usuarios/backend'); ?>" class="btn btn-primary btn-xlg">
                        <i class="ace-icon fa fa-users bigger-300"></i>
                        Usuarios
                        <span class="badge">{{countUsers}}</span>
                    </a>

                    <a ng-if="isAdmin" href="<?php echo base_url('usuarios/backend/roles'); ?>" class="btn btn-success btn-xlg">
                        <i class="ace-icon fa fa-folder-open bigger-300"></i>
                        Roles de Usuario
                        <span class="badge">{{countRoles}}</span>
                    </a>                    

                    <a href="<?php echo base_url('usuarios/auth/change_password'); ?>" class="btn btn-yellow btn-xlg">
                        <i class="ace-icon fa fa-key bigger-300"></i>
                        Cambiar Contraseña
                    </a>

                    <a href="<?php echo base_url('usuarios/auth/cancel_account'); ?>" class="btn btn-danger btn-xlg">
                        <i class="ace-icon fa fa-ban bigger-300"></i>
                        Cancelar Cuenta
                    </a>
                </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
