angular.module("ClientDash",[], function($interpolateProvider){
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
})
.controller("ClientDashController",["$scope","$http",function($scope,$http){

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
    $scope.delivery_date = Date();
    var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate()+1;
    $scope.date_order_again = day+'/'+month+'/'+d.getFullYear();
    $http({
      method: "GET",
      url: "ordenes_clientes",
      headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
        //params: {status: $scope.orders_status,date_order:$scope.date_order}
    })
    .then(function successCallback(resp){
      $scope.orders = resp.data;
      //console.log("order_date is "+$scope.orders);

    }, function errorCallback(response) {
        console.log('err');
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

    $scope.dateFormat = function(date){
        var fecha = date.split('-');
        //console.log(day);
        return fecha[2]+'/'+fecha[1]+'/'+fecha[0];
    }
    $scope.dateFormatConvert = function(date){
        var fecha = date.split('/');
        console.log(fecha);
        //console.log(day);
        return fecha[2]+'-'+fecha[1]+'-'+fecha[0];
    }

    $scope.dateFormatExcat = function(date){
        var d = new Date(date);
        var month = d.getMonth()+1;
        var day = d.getDate();
        return day+'/'+month+'/'+d.getFullYear();
    }

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
       console.log("order_date in getOrdersByStatus is"+$scope.date_order);

  		}, function errorCallback(response) {

  	  	});
  	}

  	$scope.showOrderProducts = function(index,order){
  		$scope.indexProds = index;
  		$scope.display_products = order;
        $scope.date_delivery = $scope.dateFormat($scope.orders[index].delivery_date);
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
      console.log($scope.orders);

		}, function errorCallback(response) {

	  	});
  	}

  	$scope.cancelOrder = function(index,order){
        var data = $.param({
                Purchase_order: order
            });
        var config = {
           headers : {
               'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
           }
       }
        $http.post("cancel_order/products",data,config)
		.then(function successCallback(resp){
			$scope.orders[index].value = "Cancelado";
            $scope.orders[index].status_id = '9'

		}, function errorCallback(response) {

	  	});
  	}

    $scope.updateOrder = function(){
        $scope.orders[$scope.indexProds].delivery_date = $scope.dateFormatConvert($scope.date_delivery);
        var data = $.param({
                Purchase_order: $scope.orders[$scope.indexProds]
            });
        var config = {
           headers : {
               'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
           }
       }
        $http.post("update_order/products",data,config)
		.then(function successCallback(resp){
            location.reload();
		}, function errorCallback(response) {

	  	});
    }

    $scope.generateOrder = function(){
        $scope.orders[$scope.indexProds].delivery_date = $scope.dateFormatConvert($scope.date_order_again);
        var data = $.param({
                Purchase_order: $scope.orders[$scope.indexProds]
            });
        var config = {
           headers : {
               'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
           }
       }
        $http.post("generate_order/products",data,config)
		.then(function successCallback(resp){
            //location.reload();
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


}]);
