angular.module("AdminDashboard",[], function($interpolateProvider){
  $interpolateProvider.startSymbol('[[');
  $interpolateProvider.endSymbol(']]');
})
.controller("AdminController",function($scope,$http,$timeout){

  $scope.date_order=new Date().toISOString().slice(0,10);
  $scope.menu_nav = 1;
  $scope.main_content = 1;
  $scope.displayContent = function(menu,main_content){
    $scope.menu_nav = menu;
    $scope.main_content = main_content;
  };
  $scope.orders_status = "7";
  $scope.orders = [];
  $scope.display_order = 0;
  $scope.display_order_products = false;

  $http({
    method: "GET",
    url: "adm_orders",
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {status: $scope.orders_status,date_order:$scope.date_order}
  })
  .then(function successCallback(resp){
    $scope.orders = resp.data;
    //console.log("order_date is "+$scope.date_order);

  }, function errorCallback(response) {

  });

  /*  $http({
  method: "GET",
  url: "adm_orders"
})
.then(function successCallback(resp){
$scope.orders = resp.data;

console.log($scope.orders);
}, function errorCallback(response) {
console.log("error");
});*/

$scope.getOrdersByDate = function(date){
  $http({
    method: "GET",
    url: "adm_orders",
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {date: date}
  })
  .then(function successCallback(resp){
    $scope.orders = resp.data;


  }, function errorCallback(response) {

  });
}

$scope.getOrdersByStatus = function(){
  $http({
    method: "GET",
    url: "adm_orders",
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {status: $scope.orders_status,date_order:$scope.date_order}
  })
  .then(function successCallback(resp){
    $scope.orders = resp.data;

  }, function errorCallback(response) {

  });
}

$scope.showOrderProducts = function(index,order){
  $scope.indexProds = index;
  $scope.display_order = order;
  $scope.display_order_products = true;
}

$scope.approveOrder = function(index,order){
  var config = {
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
    }
  }
  $scope.data = $.param({order: order});
  $http.post("approve_order",  $scope.data, config)

  $http({
    method: "POST",
    url: "approve_order",
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {order: order}
  })
  .then(function successCallback(resp){
    $scope.orders[index].status = "Aprobado";

    //console.log($scope.orders);

  }, function errorCallback(response) {

  });
}

$scope.cancelOrder = function(index,order){
  $http({
    method: "GET",
    url: "cancel_order",
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {order: order}
  })
  .then(function successCallback(resp){
    $scope.orders[index].status = "Cancelado";

  }, function errorCallback(response) {

  });
}

$scope.setProdNotAvailable = function(index,product)
{
  console.log("product es ",product);
  var config = {
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
    }
  }
  $scope.data = $.param({order: $scope.display_order,product: product});
  $http.post("prod_not_available",  $scope.data, config)
  $http({
    method: "POST",
    url: "prod_not_available",
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {order: $scope.display_order,product: product}

  })
  .then(function successCallback(resp){
    $scope.orders[$scope.indexProds].products[index].status = "No Disponible";
    console.log($scope.orders);

  }, function errorCallback(response) {
    console.log("error");
  });
}


});
