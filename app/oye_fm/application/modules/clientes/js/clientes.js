app.controller('clientesCtrl',
        function ($scope, $http, $modal, $log, $filter, ngTableParams, MessageBox) {

            cargar_tabla();

            function cargar_tabla() {
                $http.get(appOye_fm.urlGetClientes).success(function (result, status) {
                    $scope.searchText = '';
                    obtener_datos(result);
                }).then(function (res, a) {
                    $.unblockUI();
                });
            }

            function obtener_datos(data) {
                $scope.$watch('searchText', function () {
                    $scope.tableParams.reload();
                    $scope.tableParams.page(1);
                }, true);

                $scope.tableParams = new ngTableParams({
                    page: 1,
                    count: 10,
                    filter: {
                        empresa: ''
                    },
                    sorting: {
                        empresa: 'asc'
                    }
                }, {
                    total: data.length,
                    getData: function ($defer, params) {
                        var filteredData = $filter('filter')(data, function (data) {
                            return filter_by_fields(data);
                        });

                        var orderedData = params.sorting() ? $filter('orderBy')(filteredData, params.orderBy()) : filteredData;

                        params.total(orderedData.length);

                        $defer.resolve(orderedData.slice((params.page() - 1) * params.count(), params.page() * params.count()));
                    },
                    $scope: $scope

                });
            }

            function filter_by_fields(data) {
                var text = $scope.searchText;
                if (text) {
                    var reg_exp = new RegExp(text, 'i');
                    return !text || reg_exp.test(data.empresa) || reg_exp.test(data.ruc)
                            || reg_exp.test(data.direccion) || reg_exp.test(data.observaciones)
                            || reg_exp.test(data.situacion);
                }
                return true;
            }

            $scope.showModal = function (fila) {
                var modalInstance = $modal.open({
                    templateUrl: appOye_fm.urlModal + '/modalCliente.html',
                    controller: ModalInstanceCtrl,
                    animation: true,
                    backdrop: 'static',
                    windowClass: 'app-modal-window',
                    resolve: {
                        items: function () {
                            return {
                                cliente: angular.copy(fila),
                                showMensajeErrorModal: $scope.showMensajeErrorModal
                            };
                        }
                    }
                });

                modalInstance.result.then(function (selectedItem) {
                    $scope.selected = selectedItem;
                }, function () {
                    $log.info('Modal dismissed at: ' + new Date());
                });
            };

            var ModalInstanceCtrl = function ($scope, $modalInstance, items) {
                $scope.items = items;

                $scope.guardar = function () {
                    if ($scope.userForm.$valid) {
                        procesar(items, $modalInstance);
                    }
                };

                $scope.cancel = function () {
                    $modalInstance.dismiss('cancel');
                };


                $scope.getStatus = function (term, done) {
                    var data = [
                        {id: 'a', text: "Activo"},
                        {id: 'p', text: "Pasivo"},
                        {id: 'f', text: "Potencial"},
                        {id: 'n', text: "Lista Negra"}
                    ]
                    done($filter('filter')(data, {text: term}, 'text'));
                };

                $scope.valida_ruc = function (ruc) {
                    if (ruc !== undefined && ruc !== "") {
                        if (!check_ruc(ruc))
                            items.cliente.ruc = "";
                        else
                            get_info_sri(ruc);
                    }
                };

                function get_info_sri(ruc) {
                    items.loading = true;
                    items.cliente.empresa = '';
                    items.cliente.direccion = '';
                    $http.get(appOye_fm.urlInfoSri + '/' + ruc).success(function (result, status) {
                        if (result[0] !== null) {
                            items.cliente.empresa = result[0][1];
                            items.cliente.direccion = result[1][1];
                        } else {
                            MessageBox.error('El ruc que ingreso no se encuentra registrado en SRI', 'Error al cargar datos');
                        }
                    }).then(function (res, status) {
                        items.loading = false;
                    })
                }

            };


            $scope.eliminar = function (id) {
                var mbox = MessageBox.confirm('Esta seguro de eliminar este cliente?', 'Eliminar Cliente');
                mbox.result.then(function (btn) {
                    $http.post(appOye_fm.urlEliminar + '/' + id).success(function (result, status) {
                        MessageBox.notify('Datos eliminados correctamente', 'Proceso Correcto');
                        cargar_tabla();
                    }).error(function (result, status) {
                        MessageBox.error('Error al eliminar los datos', 'Error al procesar');
                    });
                });
            };


            function procesar(registro, $modalInstance) {
                var id = registro.cliente.id;
                if (registro.cliente.id === undefined) {
                    id = 0;
                }
                validar_repetido(id, registro.cliente.ruc, function (message) {
                    if (message == "ok") {
                        ejecutar_proceso(id, registro, $modalInstance);
                    } else {
                        registro.showMensajeErrorModal(registro, message);
                    }
                });
            }

            function validar_repetido(id, texto, callback) {
                $http.post(appOye_fm.urlRepetido + '/' + texto + '/' + id).success(function (result, status) {
                    callback(result);
                }).error(function (result, status) {
                    MessageBox.error('Error guardar los datos', 'Error al procesar');
                });
            }

            function ejecutar_proceso(id, registro, $modalInstance) {
                $http.post(appOye_fm.urlProcesar + '/' + id, registro).success(function (result, status) {
                    MessageBox.notify('Datos guardados correctamente', 'Proceso Correcto');
                    $modalInstance.close();
                    cargar_tabla();
                }).error(function (result, status) {
                    MessageBox.error('Error al guardar los datos', 'Error al procesar');
                });
            }
        }
);
