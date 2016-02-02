var app = angular.module('MainApp', [
    'ui.bootstrap',
    'ngTable',
    'angular-messagebox',
    'ui.select2.sortable'
]);

app.controller('MenuCtrl', function ($scope, $http, $interval, $timeout, $element) {

    $.blockUI();

    $scope.showMensajeError = function (mensaje) {
        $scope.isErrorView = true;
        $scope.mensajeErrorView = mensaje;
        var intervalo = $interval(function () {
            $scope.mensajeErrorView = "";
            $scope.isErrorView = false;
            $interval.cancel(intervalo);
        }, 4000);
    };

    $scope.showMensajeErrorModal = function (item, mensaje) {
        item.isError = true;
        item.mensajeError = mensaje;
        var intervalo = $interval(function () {
            item.mensajeError = "";
            item.isError = false;
            $interval.cancel(intervalo);
        }, 4000);
    };

    $http.get(urlAuth + "get_user_name").success(function (result, status) {
        $scope.usuario = result;
    });

    $http.get(urlAuth + "is_admin").success(function (result, status) {
        $scope.isAdmin = result;
    });

    $http.get(urlPanel + "count_users").success(function (result, status) {
        $scope.countUsers = result;
    });

    $http.get(urlPanel + "count_roles").success(function (result, status) {
        $scope.countRoles = result;
    });


});

$(document).ready(function () {
    var url = window.location;
    $('ul.nav a').filter(function () {
        return this.href == url;
    }).parent().addClass('active').parent().parent().addClass('active open');

    $('.ace-nav li').removeClass('active open')
});