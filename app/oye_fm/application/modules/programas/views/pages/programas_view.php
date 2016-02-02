<script type="text/javascript">
    var appOye_fm = {};
    appOye_fm.urlGetProgramas = '<?= base_url() . 'programas/programas/get_programas' ?>';
    appOye_fm.urlGetTipoPrograma = '<?= base_url() . 'programas/programas/get_tipo_programas_activos' ?>';
    appOye_fm.urlProcesar = '<?= base_url() . 'programas/programas/procesar' ?>';
    appOye_fm.urlEliminar = '<?= base_url() . 'programas/programas/delete' ?>';
    appOye_fm.urlRepetido = '<?= base_url() . 'programas/programas/validar_repetido' ?>';
    appOye_fm.urlModal = '<?= base_url() . 'application/modules/programas/views/modals' ?>';
</script>
<script src="<?php echo base_url(); ?>application/modules/programas/js/programas.js"></script>
</div>
<div class="main-content" ng-controller="programasCtrl">
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
                    <a href="#">Programas</a>
                </li>
                <li class="active">Programas</li>
            </ul><!-- /.breadcrumb -->
        </div>

        <div class="page-content">            
            <div class="row">
                <div class="col-xs-12">
                    <div class="nav-search" id="nav-search">
                        <span class="input-icon">
                            <input type="text" ng-model="searchText" placeholder="Buscar ..." class="nav-search-input input-xlarge" id="nav-search-input" autocomplete="off" />
                            <i class="ace-icon fa fa-search nav-search-icon"></i>
                        </span>
                    </div>
                    <button popover="Nuevo" popover-trigger="mouseenter" class="btn btn-success glyphicon glyphicon-plus-sign bigger-110" ng-click="showModal()" ><i class='halflings-icon white plus-sign'></i> Nuevo</button>
                    <hr>
                    <div class="table-responsive">
                        <table ng-table="tableParams" class="table table-bordered table-striped table-condensed table-hover">
                            <tr style="background:white;" ng-repeat="cliente in $data| filter:searchText">
                                <td data-title="" width="3%">
                                    <span>{{$index + 1}}</span>
                                </td>

                                <td data-title="'Programa'" sortable="'nombre'">
                                    <span>{{cliente.nombre}}</span>
                                </td>

                                <td data-title="'Tipo Programa'" sortable="'tipo_programa.text'">
                                    <span>{{cliente.tipo_programa.text}}</span>
                                </td>

                                <td data-title="'Observaciones'" sortable="'observaciones'">
                                    <span>{{cliente.observaciones}}</span>
                                </td>

                                <td data-title="''" width="5%">
                                    <div class="action-buttons">
                                        <a class="blue" popover="Editar" popover-trigger="mouseenter" ng-click="showModal(cliente)" href="#">
                                            <i class="ace-icon fa fa-pencil bigger-180"></i>
                                        </a>
                                        <a class="red" popover="Eliminar" popover-trigger="mouseenter" ng-click="eliminar(cliente.id)" href="#">
                                            <i class="ace-icon fa fa-trash-o bigger-180"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <p class="text-center">
                            <strong>Pagina:</strong> {{tableParams.page()}} |
                            <strong>Registros por pagina:</strong> {{tableParams.count()}} |
                            <strong>Total registros:</strong> {{tableParams.total()}}
                        </p>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->