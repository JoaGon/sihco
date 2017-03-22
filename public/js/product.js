/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var client = angular.module("product",["module_custom"], function($interpolateProvider){
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
})
.directive('onLastRepeat', function() {

});

client.controller("ClientController",["$scope","$http","idioma","LoadProduct","matematicas_simples",function($scope,$http,idioma,LoadProduct,matematicas_simples) {
    //$scope.dataProduct = LoadProduct.Load('POST','products/cliente',$scope.token);
    /** ******************** iniciar variables****************************** */
    $scope.datos = [];
    $scope.car = [];
    $scope.result_multi = 0;
    /** ******************** iniciar variables****************************** */
    LoadProduct.Load('POST','products/cliente',$scope.token).then(function(data) {
        $scope.datos = data.data;
        console.log($scope.datos);

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
        /*$http({
                method: 'POST',
                url: 'products/cliente/order',
                params: {"order":$scope.car ,"_token":$scope.token}
            }).then(function successCallback(res) {
                  // this callback will be called asynchronously
                  // when the response is available
            }, function errorCallback(res) {
                  // called asynchronously if an error occurs
                  // or server returns response with an error status.
                  console.log('error:',res);
            });*/
        $scope.dato = [];
        angular.forEach($scope.car, function (value, key) {
            if (value.product) {
                $scope.dato.push(value);
            }
        });
        //console.log($scope.data);
        $scope.data = $.param({order: $scope.dato});
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
    }
   // console.log(matematicas_simples.sumar(2,2));


}]);
