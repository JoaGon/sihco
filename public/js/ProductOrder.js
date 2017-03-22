angular.module("ProductOrder",[], function($interpolateProvider){
  $interpolateProvider.startSymbol('[[');
  $interpolateProvider.endSymbol(']]');
})
.controller("ProductOrderController",function($scope,$http){



  $scope.products = [];
  $scope.products_form = [];



  $scope.getProductOrders=function(order_id)
  {

    $http({
      method: "GET",
      url: "admin/edit/orders",
      headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
      params: {order_id: order_id}
    })
    .then(function successCallback(resp){
      $scope.products = resp.data;
      angular.forEach($scope.products,function(val,i){
        $scope.products_form.push({prod_number: val.id_product, list_prod_number: val.id_list_product, quantity: val.quantity, unit_price: val.unit_price_purchased});

      });


    }, function errorCallback(response) {

    });

  }
  $scope.sendEmail=function(order_id)
  {

    $http({
      method: "GET",
      url: "admin/send/bill",
      headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
      params: {order_id: order_id}
    })

  }

  $scope.products_to_edit=function()
  {

    $scope.data = $.param({products: $scope.products_form});
    var config = {
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
      }
    }
    $scope.data = $.param({products: $scope.products_form});
    $http.post("admin/products/orders/edited",  $scope.data, config);

    location.reload();
  }

});
