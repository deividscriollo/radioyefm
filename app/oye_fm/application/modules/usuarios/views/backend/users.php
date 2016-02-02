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

                <li>
                    <a href="<?php echo base_url('usuarios/user_panel'); ?>">Panel de usuario</a>
                </li>
                <li class="active">Usuarios</li>
            </ul><!-- /.breadcrumb -->
        </div>

        <div class="page-content table-responsive">            
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <?php
                    if (isset($reset_message))
                        echo $reset_message;
                    echo validation_errors();

                    $this->table->set_heading('', 'Usuario', 'Email', 'Rol', 'Baneado', 'Ultima IP', 'Ultimo acceso', 'Creado');

                    foreach ($users as $user) {
                        $banned = ($user->banned == 1) ? '<div class="label label-sm label-danger arrowed-in arrowed-in-right">Si</div>' : '<div class="label label-sm label-success arrowed-in arrowed-in-right">No</div>';

                        $this->table->add_row(
                                form_checkbox('checkbox_' . $user->id, $user->id), $user->username, $user->email, $user->role_name, $banned, $user->last_ip, date('Y-m-d', strtotime($user->last_login)), date('Y-m-d', strtotime($user->created)));
                    }
                    ?>
                    <form name="registerForm" action="<?php echo base_url('usuarios/backend'); ?>" method="post">
                        <div class="col-lg-4 col-sm-offset-1">
                            <button type="submit" class="btn btn-sm btn-info" name="ban">
                                <i class="ace-icon fa fa-ban"></i>
                                <span class="bigger-110">Banear Usuario</span>
                            </button>

                            <button type="submit" class="btn btn-sm btn-warning" name="unban">
                                <i class="ace-icon fa fa-unlock"></i>
                                <span class="bigger-110">Desbanear Usuario</span>
                            </button>

                            <button type="submit" class="btn btn-sm btn-danger" name="reset_pass" value="Reset password">
                                <i class="ace-icon fa fa-lightbulb-o"></i>
                                <span class="bigger-110">Resetear contraseña</span>
                            </button>
                        </div>
                        <br><hr>
                        <?php
                        $tmpl = array(
                            'table_open' => '<table class="table table-bordered table-striped table-condensed table-hover">');
                        $this->table->set_template($tmpl);
                        echo $this->table->generate();
                        ?>
                    </form>
                    <ul class="pagination">
                        <?php
                        echo $pagination;
                        ?>
                        <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
