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

                        $(document).ready(function () {
                            $(".select2").css('width', '100%').select2({allowClear: true})
                        });
            </script>

            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Home</a>
                </li>

                <li>
                    <a href="<?php echo base_url('usuarios/user_panel'); ?>">Panel de usuario</a>
                </li>
                <li class="active">Roles de Usuario</li>
            </ul><!-- /.breadcrumb -->
        </div>

        <div class="page-content table-responsive">            
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <?php
                    echo validation_errors();

                    $this->table->set_heading('', 'ID', 'Rol', 'ID Padre');
                    $options[0] = 'None';
                    foreach ($roles as $role) {
                        $options[$role->id] = $role->name;
                        $this->table->add_row(form_checkbox('checkbox_' . $role->id, $role->id), $role->id, $role->name, $role->parent_id);
                    }
                    ?>
                    <form name="rolForm" action="<?php echo base_url('usuarios/backend/roles'); ?>" method="post" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-lg-4 control-label"><strong>Rol de Usuario</strong> <span class="red"> *</span></label>
                            <div class="col-lg-4" ng-class="{ 'has-error' : rolForm.empresa.$invalid && !userForm.empresa.$pristine }">
                                <input type="text" placeholder="Rol de Usuario" name="role_name" class="form-control" ng-model="rol" onkeypress="return letrasnumeros(event)" ng-minlength="3" ng-maxlength="40">
                                <div ng-show="rolForm.role_name.$error.required && !rolForm.role_name.$pristine" class="red">El campo Empresa es requerido.</div>
                                <div ng-show="rolForm.role_name.$error.minlength" class="red">El campo Empresa es muy pequeño, minimo 3 caracteres.</div>
                                <div ng-show="rolForm.role_name.$error.maxlength" class="red">El campo Empresa es muy grande, maximo 255 caracteres.</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-4 control-label"><strong>Rol Padre</strong></label>
                            <div class="col-lg-4">
                                <select class="select2" name="role_parent" data-placeholder="Click to Choose...">
                                    <option value="0">Ninguno</option>
                                    <?php foreach ($roles as $rol) { ?>
                                        <option value="<?php echo $rol->id; ?>"><?php echo $rol->name; ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-offset-5">
                            <button type="submit" class="btn btn-sm btn-info" name="add" value="add">
                                <i class='glyphicon glyphicon-plus-sign bigger-110'></i>
                                <span class="bigger-110">Agregar Rol</span>
                            </button>

                            <button type="submit" class="btn btn-sm btn-danger" name="delete" value="delete">
                                <i class="glyphicon glyphicon-trash bigger-110"></i>
                                <span class="bigger-110">Eliminar Rol</span>
                            </button>
                        </div>
                        <br><br><hr>
                        <?php
                        $tmpl = array(
                            'table_open' => '<table class="table table-bordered table-striped table-condensed table-hover">');
                        $this->table->set_template($tmpl);
                        echo $this->table->generate();
                        ?>
                    </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
