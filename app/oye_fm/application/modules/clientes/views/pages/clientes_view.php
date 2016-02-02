<script type="text/javascript">
    var appOye_fm = {};
    appOye_fm.urlGetClientes = '<?= base_url() . 'clientes/clientes/get_clientes' ?>';
    appOye_fm.urlProcesar = '<?= base_url() . 'clientes/clientes/procesar' ?>';
    appOye_fm.urlEliminar = '<?= base_url() . 'clientes/clientes/delete' ?>';
    appOye_fm.urlRepetido = '<?= base_url() . 'clientes/clientes/validar_repetido' ?>';
    appOye_fm.urlInfoSri = '<?= base_url() . 'clientes/clientes/get_info_sri' ?>';
    appOye_fm.urlModal = '<?= base_url() . 'application/modules/clientes/views/modals' ?>';
</script>
<script src="<?php echo base_url(); ?>application/modules/clientes/js/clientes.js"></script>
</div>
<div class="main-content" ng-controller="clientesCtrl">
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
                    <a href="#">Clientes</a>
                </li>
                <li class="active">Clientes</li>
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

                                <td data-title="'Empresa'" sortable="'empresa'">
                                    <span>{{cliente.empresa}}</span>
                                </td>

                                <td data-title="'Ruc'" sortable="'ruc'">
                                    <span>{{cliente.ruc}}</span>
                                </td>

                                <td data-title="'Direccion'" sortable="'direccion'">
                                    <span>{{cliente.direccion}}</span>
                                </td>

                                <td data-title="'Telefono'" sortable="'telefono'">
                                    <span>{{cliente.telefono}}</span>
                                </td>

                                <td data-title="'Contacto'" sortable="'contacto'">
                                    <span>{{cliente.contacto}}</span>
                                </td>

                                <td data-title="'Telefono Contacto'" sortable="'telefono_contacto'">
                                    <span>{{cliente.telefono_contacto}}</span>
                                </td>

                                <td data-title="'Status'" sortable="'status'">
                                    <span ng-class="cliente.clase">{{cliente.situacion.text}}</span>
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
