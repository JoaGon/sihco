angular.module("Despachador",[], function($interpolateProvider){
  $interpolateProvider.startSymbol('[[');
  $interpolateProvider.endSymbol(']]');
})
.controller("DespachadorController", function($scope,$http){

  $scope.orders = [];
  $scope.order_id=0;
  $scope.display_order = 0;
  $scope.display_order_products = false;

  $http({
    method: "GET",
    url: "dispatcher/orders"
  }).then(function successCallback(response){
    $scope.orders=response.data;
    //console.log("$scope.orders ",response.data);
  },
  function errorCallback(response)
  {
    console.log('error');
  });


  /*$scope.showOrderProducts = function(index,order){
    $scope.indexProds = index;
    $scope.display_order = order;
    $scope.display_order_products = true;

  }*/

  $scope.showOrderProducts = function(product_index,order){

    $scope.order_id=order;
    $http({
    method: "POST",
    url: "product_detail",
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
      params: {order: order}
  })
  .then(function successCallback(resp){
    $scope.products_array=resp.data;
    //console.log(resp.data);
    $scope.display_order_products = true;

  }, function errorCallback(response) {

    });
  }


  $scope.approveOrder = function(index,order){
    $http({
    method: "GET",
    url: "approve_order",
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
      params: {order: order}
  })
  .then(function successCallback(resp){
    $scope.orders[index].status = "Aprobado";

  }, function errorCallback(response) {

    });
  }

  $scope.cancelOrder = function(index,order){
    $http({
    method: "GET",
    url: "cancel_order_from_dispatcher",
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
      params: {order: order}
  })
  .then(function successCallback(resp){

    $scope.orders[index].status = "Cancelado";

  }, function errorCallback(response) {

    });

  }

  $scope.setProductCanceled = function(index,product){
    $http({
    method: "POST",
    url: "product_canceled",
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
      params: {order: $scope.order_id,product: product}
  })
  .then(function successCallback(resp){


    $scope.products_array[index].status = "Cancelado";
    
  }, function errorCallback(response) {

    });
  }
});
