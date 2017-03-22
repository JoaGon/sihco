/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var client = angular.module("client",["module_custom"], function($interpolateProvider){
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
})
.directive('onLastRepeat', function($timeout) {
    return function($scope) {
        if ($scope.$last) {
            $timeout(function(){
                $('#dataTables-example').DataTable({
                    responsive: true,
                    "columns": [
                        { "orderDataType": "dom-text" },
                        { "orderDataType": "dom-text" },
                        { "orderDataType": "dom-text" },
                        { "bSortable": false, targets: [4] }
                    ],
                    "oLanguage": {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "Buscar:",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sLast":     "Último",
                            "sNext":     "Siguiente",
                            "sPrevious": "Anterior"
                        }
                    }
                });
            }, 100);

        }

    };
});

client.controller("ClientController",["$scope","$http","idioma","LoadProduct","matematicas_simples",function($scope,$http,idioma,LoadProduct,matematicas_simples) {
    //$scope.dataProduct = LoadProduct.Load('POST','products/cliente',$scope.token);
    /** ******************** iniciar variables****************************** */
    $scope.datos = [];
    $scope.car = [];
    $scope.result_multi = 0;
    $scope.boton = [];

    //$scope.date_order = new Date();
    /** ******************** iniciar variables****************************** */
    LoadProduct.Load('POST','products/cliente',$scope.token).then(function(data) {
        $scope.datos = data.data;
        console.log($scope.datos);

    });
    LoadProduct.Load('POST','products_category/cliente',$scope.token).then(function(data) {
        $scope.category = data.data;
        console.log($scope.category);

    });
    $scope.$watch('car', function (value) {
        console.log($scope.car);

    });


    $scope.send_order = function(){
        console.log($scope.car);
        var config = {
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
            }
        }

        $scope.dato = [];
        angular.forEach($scope.car, function (value, key) {
            if (value.product) {

                $scope.dato.push(value);

            }
        });


        
        $scope.data = $.param({order: $scope.dato,date:$scope.date_order});
        console.log($scope.data);
        $http.post("products/cliente/order",  $scope.data, config)
        .then(function (data) {

            console.log(data.data);

        }
        , function (err) {
            console.log(err);
        });
    }


    $scope.multi = function(num1,num2,j){
        $scope.car[j].total = parseFloat(num1*num2);
        $scope.car[j].product = $scope.datos[j];

        console.log($scope.car);

    }
   // console.log(matematicas_simples.sumar(2,2));
   $scope.SetDate = function(){
       console.log('llego');
   }

   $scope.eliminarPedido = function (j) {
       console.log($scope.boton[j]);
      $scope.boton[j]=false;
      delete $scope.car[j];
   }


    $scope.showPopover=false;

    $scope.popover = {

        message: 'El producto se ha Agregado a tu Carro de Compras'
    }




}]);
