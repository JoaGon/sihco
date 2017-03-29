angular.module("AdminDashboard",[], function($interpolateProvider){
  $interpolateProvider.startSymbol('[[');
  $interpolateProvider.endSymbol(']]');
})
.controller("AdminController",function($scope,$http,$timeout){

  $scope.data = $.param({});
  var url1 = "http://localhost:8088/sihco/public/cardiovasculares";
  var url2 = "http://localhost:8088/sihco/public/circulos";
  var url3 = "http://localhost:8088/sihco/public/renales";

 
  $http({
    method: "POST",
    url: url1,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
  })
  .then(function successCallback(resp){
    $scope.cardiovasculares = resp.data;
    console.log(resp.data);
  }, function errorCallback(response) {
    console.log(response);

  });

  $http({
    method: "GET",
    url: url2,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
  })
  .then(function successCallback(resp){
    $scope.circulos = resp.data;
    $scope.circulos_renal = resp.data;

    $scope.valor = $scope.circulos[1].id_valor;

  }, function errorCallback(response) {
    console.log(response);
  });

  $http({
    method: "GET",
    url: url3,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
  })
  .then(function successCallback(resp){
    $scope.renales = resp.data;

  }, function errorCallback(response) {
    console.log(response);
  });


  
$scope.add_enfermerdad = function(consulta,paciente){

var enfer_id = $scope.enfer;
var circ = $scope.valor;
//console.log('locagio',window.location);

var config = {
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
    }
  }
$scope.data = $.param({consulta: consulta, paciente: paciente, id_enfermedad: enfer_id, circulo_id: circ});
//$http.post("http://localhost:8088/sihco/public/enfermedad_cardiovascular",  $scope.data, config)

var url = "http://localhost:8088/sihco/public/enfermedad_cardiovascular";
  $http({
    method: "POST",
    url: url,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {consulta: consulta, paciente: paciente, id_enfermedad: enfer_id, circulo_id: circ}
  })
  .then(function successCallback(resp){
    $scope.enfermedades = resp.data;
    console.log(resp.data)

  }, function errorCallback(response) {
    console.log("error");

  });
}

$scope.eliminarEnfermedad = function(i,id_enfermedad, consulta, paciente){
  var url = "http://localhost:8088/sihco/public/eliminar/paciente/enfermedad_cardiovascular";

  $http({
    method: "POST",
    url: url,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {consulta: consulta, paciente: paciente, id_paciente_enfer_cardiovascular: id_enfermedad}
  })
  .then(function successCallback(resp){
    $scope.enfermedades = resp.data;
    console.log(resp.data)

  }, function errorCallback(response) {
    console.log("error");

  });
}

$scope.insertarEnfermedad = function(){

  var url = "http://localhost:8088/sihco/public/insertar/enfermedad_cardiovascular";

var config = {
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
    }
  }
$scope.data = $.param({enfermedad: enfermedad});

  var enfermedad = $scope.nombre_enfermedad_renal;
  $http({
    method: "POST",
    url: url,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {enfermedad: enfermedad}
  })
  .then(function successCallback(resp){
    $scope.cardiovasculares = resp.data;
    $scope.enfermedades_cardiovasculares = resp.data;

    console.log(resp.data)

  }, function errorCallback(response) {
    console.log("error");

  });
}

$scope.eliminarEnfermedadCardiovascular = function(id_enfermedad){
    var url = "http://localhost:8088/sihco/public/eliminar/enfermedad_cardiovascular";

  $http({
    method: "POST",
    url: url,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {id_enfermedad: id_enfermedad}
  })
  .then(function successCallback(resp){
    $scope.enfer = resp.data;
    $scope.cardiovasculares = resp.data;
    console.log(resp.data)

  }, function errorCallback(response) {
    console.log("error");

  });
}

$scope.add_enfermerdad_renal = function(consulta,paciente){

var enfer_id = $scope.enf_renal;
var circ = $scope.valor_renal;
//console.log('locagio',window.location);

var config = {
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
    }
  }
$scope.data = $.param({consulta: consulta, paciente: paciente, id_enfermedad: enfer_id, circulo_id: circ});
//$http.post("http://localhost:8088/sihco/public/enfermedad_cardiovascular",  $scope.data, config)

var url = "http://localhost:8088/sihco/public/enfermedad_renal";
  $http({
    method: "POST",
    url: url,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {consulta: consulta, paciente: paciente, id_enfermedad: enfer_id, circulo_id: circ}
  })
  .then(function successCallback(resp){
    $scope.enfer_renal = resp.data;
    console.log(resp.data)

  }, function errorCallback(response) {
    console.log("error");

  });
}


$scope.eliminarEnfermedadRenal = function(id_enfermedad){
    var url = "http://localhost:8088/sihco/public/eliminar/enfermedad_renal";

  $http({
    method: "POST",
    url: url,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {id_enfermedad: id_enfermedad}
  })
  .then(function successCallback(resp){
    $scope.enfer_renal = resp.data;
    $scope.renales = resp.data;
    console.log(resp.data)

  }, function errorCallback(response) {
    console.log("error");

  });
}

$scope.eliminarRenal= function(i,id_enfermedad, consulta, paciente){
  var url = "http://localhost:8088/sihco/public/eliminar/paciente/enfermedad_renal";
  console.log(id_enfermedad);
  $http({
    method: "POST",
    url: url,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {consulta: consulta, paciente: paciente, id_paciente_enfer_renal: id_enfermedad}
  })
  .then(function successCallback(resp){
    $scope.enfer_renal = resp.data;
    console.log(resp.data)

  }, function errorCallback(response) {
    console.log("error");

  });
}

$scope.insertarEnfermedadRenal = function(){
  var enfermedad = $scope.nombre_enfermedad_renal;
  var config = {
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
    }
  }
  $scope.data = $.param({enfermedad: enfermedad});
  var url_ = "http://localhost:8088/sihco/public/insertar/enfermedad_renal";

  $http({
    method: "POST",
    url: url_,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {enfermedad: enfermedad}
  })
  .then(function successCallback(resp){
    $scope.renales = resp.data;
    console.log(resp.data)

  }, function errorCallback(response) {
    console.log("error");

  });
}


});
