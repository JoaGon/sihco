angular.module("AdminDashboard",['angularUtils.directives.dirPagination'], function($interpolateProvider){
  $interpolateProvider.startSymbol('[[');
  $interpolateProvider.endSymbol(']]');
})
.controller("AdminController",function($scope,$http,$timeout){

  $scope.data = $.param({});
  var url1 = "http://localhost:8088/sihco/public/cardiovasculares";
  var url2 = "http://localhost:8088/sihco/public/circulos";
  var url3 = "http://localhost:8088/sihco/public/renales";
  var url_alergica = "http://localhost:8088/sihco/public/alergicas";
  var url_infecciosas = "http://localhost:8088/sihco/public/infecciosas";
  var url_transmision_sexual = "http://localhost:8088/sihco/public/transmision_sexual";
  var url_cancer = "http://localhost:8088/sihco/public/cancer";



 /*Obtienes las enfermedades cardiovasculares registradas en BD*/
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
 /*Obtiene los valores de circulo familiar registradas en BD*/

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
 /*Obtienes las enfermedades renales registradas en BD*/

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

   /*Obtienes las enfermedades alergicas registradas en BD*/

  $http({
    method: "GET",
    url: url_alergica,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
  })
  .then(function successCallback(resp){
    $scope.alergicas = resp.data;
    console.log('alergica',resp.data);


  }, function errorCallback(response) {
    console.log(response);
  });


   /*Obtienes las enfermedades infecciosas registradas en BD*/

  $http({
    method: "GET",
    url: url_infecciosas,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
  })
  .then(function successCallback(resp){
    $scope.infecciosas = resp.data;


  }, function errorCallback(response) {
    console.log(response);
  });


  $http({
    method: "GET",
    url: url_cancer,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
  })
  .then(function successCallback(resp){
    $scope.cancer = resp.data;


  }, function errorCallback(response) {
    console.log(response);
  });

  $http({
    method: "GET",
    url: url_transmision_sexual,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
  })
  .then(function successCallback(resp){
    $scope.transmision_sexual = resp.data;


  }, function errorCallback(response) {
    console.log(response);
  });


  /*Inserta la enfermedad cardiovascular asociada al paciente y a la consulta*/
$scope.add_enfermerdad = function(consulta,paciente, enfermedad, valor){

var enfer_id = enfermedad[0];
var circ = valor;
console.log('locagio',enfer_id[0], valor);

var config = {
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
    }
  }
$scope.data = $.param({consulta: consulta, paciente: paciente, id_enfermedad: enfer_id[0], circulo_id: circ, antecedente: 'familiar'});
//$http.post("http://localhost:8088/sihco/public/enfermedad_cardiovascular",  $scope.data, config)

var url = "http://localhost:8088/sihco/public/enfermedad_cardiovascular";
  $http({
    method: "POST",
    url: url,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {consulta: consulta, paciente: paciente, id_enfermedad: enfer_id, circulo_id: circ, antecedente: 'familiar'}
  })
  .then(function successCallback(resp){
    $scope.enfermedades = resp.data;
    console.log(resp.data)

  }, function errorCallback(response) {
    console.log("error");

  });
}
/*Elimina la enfermedad que esta asociada al paciente y a la consulta*/

$scope.eliminarEnfermedad = function(i,id_enfermedad, consulta, paciente){
  var url_card = "http://localhost:8088/sihco/public/eliminar/paciente/enfermedad_cardiovascular";

  $http({
    method: "POST",
    url: url_card,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {consulta: consulta, paciente: paciente, id_paciente_enfer_cardiovascular: id_enfermedad, antecedente: 'familiar'}
  })
  .then(function successCallback(resp){
    $scope.enfermedades = resp.data;
    console.log(resp.data)

  }, function errorCallback(response) {
    console.log("error");

  });
}

/*Inserta una efermedad cardiovascular en BD*/
$scope.insertarEnfermedad = function(){

  var url_inser = "http://localhost:8088/sihco/public/insertar/enfermedad_cardiovascular";
  var enfermedad_cardio = $scope.nombre_enfermedad;

  var config = {
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
      }
  }
$scope.data = $.param({enfermedad: enfermedad_cardio});

  $http({
    method: "POST",
    url: url_inser,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {enfermedad: enfermedad_cardio}
  })
  .then(function successCallback(resp){
    $scope.cardiovasculares = resp.data;
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
    $scope.cardiovasculares = resp.data;
    console.log(resp.data)

  }, function errorCallback(response) {
    console.log("error");

  });
}

$scope.add_enfermerdad_renal = function(consulta,paciente, enfermedad, valor){

var enfer_id = enfermedad[0];
var circ = valor;
//console.log('locagio',window.location);

var config = {
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
    }
  }
$scope.data = $.param({consulta: consulta, paciente: paciente, id_enfermedad: enfer_id[0], circulo_id: circ, antecedente: 'familiar'});
//$http.post("http://localhost:8088/sihco/public/enfermedad_cardiovascular",  $scope.data, config)

var url = "http://localhost:8088/sihco/public/enfermedad_renal";
  $http({
    method: "POST",
    url: url,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {consulta: consulta, paciente: paciente, id_enfermedad: enfer_id, circulo_id: circ, antecedente: 'familiar'}
  })
  .then(function successCallback(resp){
    $scope.enfer_renal = resp.data;
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
    params: {consulta: consulta, paciente: paciente, id_paciente_enfer_renal: id_enfermedad, antecedente: 'familiar'}
  })
  .then(function successCallback(resp){
    $scope.enfer_renal = resp.data;
    console.log(resp.data)

  }, function errorCallback(response) {
    console.log("error");

  });
}

$scope.eliminarEnfermedadRenal = function(id_enfermedad){

    var url_del= "http://localhost:8088/sihco/public/eliminar/enfermedad_renal";

console.log(id_enfermedad);
$scope.data = $.param({id_enfermedad: id_enfermedad});

  $http({
    method: "POST",
    url: url_del,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {id_enfermedad: id_enfermedad}
  })
  .then(function successCallback(resp){
    $scope.renales = resp.data;
    console.log(resp.data)

  }, function errorCallback(response) {
    console.log("error");

  });
}

$scope.insertarEnfermedadRenal = function(){

  var url_inser = "http://localhost:8088/sihco/public/insertar_renal";
  var enfermedad_renal = $scope.nombre_enfermedad_renal;

  var config = {
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
      }
  }
$scope.data = $.param({enfermedad: enfermedad_renal});

  $http({
    method: "GET",
    url: url_inser,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {enfermedad: enfermedad_renal}
  })
  .then(function successCallback(resp){
      $scope.renales = resp.data;
    console.log(resp.data)

  }, function errorCallback(response) {
    console.log("error");

  });


}

/***************Alergicas****************/

 /*Inserta la enfermedad cardiovascular asociada al paciente y a la consulta*/
$scope.add_enfermerdad_alergica = function(consulta,paciente, enfermedad, valor){

var enfer_id = enfermedad[0];
var circ = valor;
//console.log('locagio',window.location);
  
var config = {
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
    }
  }
$scope.data = $.param({consulta: consulta, paciente: paciente, id_enfermedad: enfer_id[0], circulo_id: circ, antecedente: 'familiar'});
//$http.post("http://localhost:8088/sihco/public/enfermedad_cardiovascular",  $scope.data, config)

var url = "http://localhost:8088/sihco/public/enfermedad_alergica";
  $http({
    method: "POST",
    url: url,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {consulta: consulta, paciente: paciente, id_enfermedad: enfer_id, circulo_id: circ, antecedente: 'familiar'}
  })
  .then(function successCallback(resp){
    $scope.enfer_alergica = resp.data;
    console.log(resp.data)

  }, function errorCallback(response) {
    console.log("error");

  });
}

/*Elimina la enfermedad que esta asociada al paciente y a la consulta*/

$scope.eliminarAlergica = function(i,id_enfermedad, consulta, paciente){
  var url_card = "http://localhost:8088/sihco/public/eliminar/paciente/enfermedad_alergica";

  $http({
    method: "POST",
    url: url_card,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {consulta: consulta, paciente: paciente, id_paciente_enfer: id_enfermedad, antecedente: 'familiar'}
  })
  .then(function successCallback(resp){
    $scope.enfer_alergica = resp.data;
    console.log(resp.data)

  }, function errorCallback(response) {
    console.log("error");

  });
}

/*Inserta una efermedad alergica en BD*/
$scope.insertarEnfermedadAlergica = function(){

  var url_inser = "http://localhost:8088/sihco/public/insertar/enfermedad_alergica";
  var enfermedad_alergica = $scope.nombre_enfermedad_alergica;

  var config = {
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
      }
  }
$scope.data = $.param({enfermedad: enfermedad_alergica});

  $http({
    method: "POST",
    url: url_inser,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {enfermedad: enfermedad_alergica}
  })
  .then(function successCallback(resp){
    $scope.alergicas = resp.data;

  }, function errorCallback(response) {
    console.log("error");

  });
}

/*Elimina una efermedad alergica en BD*/
$scope.eliminarEnfermedadAlergica = function(id_enfermedad){
    var url = "http://localhost:8088/sihco/public/eliminar/enfermedad_alergica";

  $http({
    method: "POST",
    url: url,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {id_enfermedad: id_enfermedad}
  })
  .then(function successCallback(resp){
    $scope.alergicas = resp.data;
    console.log(resp.data)

  }, function errorCallback(response) {
    console.log("error");

  });
}

/***********************************************************************************/


/*Inserta una efermedad infecciosa en BD*/
$scope.insertarEnfermedadInfecciosa = function(){

  var url_inser = "http://localhost:8088/sihco/public/insertar/enfermedad_infecciosa";
  var enfermedad_infecciosa = $scope.nombre_enfermedad_infecciosa;

  var config = {
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
      }
  }
$scope.data = $.param({enfermedad: enfermedad_infecciosa});

  $http({
    method: "POST",
    url: url_inser,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {enfermedad: enfermedad_infecciosa}
  })
  .then(function successCallback(resp){
    $scope.infecciosas = resp.data;

  }, function errorCallback(response) {
    console.log("error");

  });
}

/*Elimina una efermedad infecciosa en BD*/
$scope.eliminarEnfermedadInfecciosa = function(id_enfermedad){
    var url = "http://localhost:8088/sihco/public/eliminar/enfermedad_infecciosa";

  $http({
    method: "POST",
    url: url,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {id_enfermedad: id_enfermedad}
  })
  .then(function successCallback(resp){
    $scope.infecciosas = resp.data;
    console.log(resp.data)

  }, function errorCallback(response) {
    console.log("error");

  });
}

/*Inserta la enfermedad infecciosa asociada al paciente y a la consulta*/
$scope.add_enfermerdad_infecciosa = function(consulta,paciente, enfermedad, valor){

var enfer_id = enfermedad[0];
var circ = valor;
//console.log('locagio',window.location);
  
var config = {
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
    }
  }
$scope.data = $.param({consulta: consulta, paciente: paciente, id_enfermedad: enfer_id[0], circulo_id: circ, antecedente: 'familiar'});
//$http.post("http://localhost:8088/sihco/public/enfermedad_cardiovascular",  $scope.data, config)

var url = "http://localhost:8088/sihco/public/enfermedad_infecciosa";
  $http({
    method: "POST",
    url: url,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {consulta: consulta, paciente: paciente, id_enfermedad: enfer_id, circulo_id: circ, antecedente: 'familiar'}
  })
  .then(function successCallback(resp){
    $scope.enfer_infecciosa = resp.data;
    console.log(resp.data)

  }, function errorCallback(response) {
    console.log("error");

  });
}

/*Elimina la enfermedad que esta asociada al paciente y a la consulta*/

$scope.eliminarInfecciosa = function(i,id_enfermedad, consulta, paciente){
  var url_card = "http://localhost:8088/sihco/public/eliminar/paciente/enfermedad_infecciosa";

  $http({
    method: "POST",
    url: url_card,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {consulta: consulta, paciente: paciente, id_paciente_enfer: id_enfermedad, antecedente: 'familiar'}
  })
  .then(function successCallback(resp){
    $scope.enfer_infecciosa = resp.data;
    console.log(resp.data)

  }, function errorCallback(response) {
    console.log("error");

  });
}

/***********************************************************************************/

/*Inserta una efermedad transimision sexual en BD*/
$scope.insertarEnfermedadTransmSexual= function(){

  var url_inser = "http://localhost:8088/sihco/public/insertar/enfermedad_transmision_sexual";
  var enfermedad_trasm_sexual = $scope.nombre_enfermedad_transmision_sexual;

  var config = {
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
      }
  }
$scope.data = $.param({enfermedad: enfermedad_trasm_sexual});

  $http({
    method: "POST",
    url: url_inser,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {enfermedad: enfermedad_trasm_sexual}
  })
  .then(function successCallback(resp){
    $scope.transmision_sexual = resp.data;

  }, function errorCallback(response) {
    console.log("error");

  });
}

/*Elimina una efermedad transmision sexual en BD*/
$scope.eliminarEnfermedadTransmSexual = function(id_enfermedad){
    var url = "http://localhost:8088/sihco/public/eliminar/enfermedad_transmision_sexual";

  $http({
    method: "POST",
    url: url,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {id_enfermedad: id_enfermedad}
  })
  .then(function successCallback(resp){
    $scope.transmision_sexual = resp.data;

  }, function errorCallback(response) {
    console.log("error");

  });
}

/*Inserta la enfermedad sexual asociada al paciente y a la consulta*/
$scope.add_enfermerdad_transm_sexual = function(consulta,paciente, enfermedad, valor){

var enfer_id = enfermedad[0];
var circ = valor;
//console.log('locagio',window.location);
  
var config = {
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
    }
  }
$scope.data = $.param({consulta: consulta, paciente: paciente, id_enfermedad: enfer_id[0], circulo_id: circ, antecedente: 'familiar'});
//$http.post("http://localhost:8088/sihco/public/enfermedad_cardiovascular",  $scope.data, config)

var url = "http://localhost:8088/sihco/public/enfermedad_transmision_sexual";
  $http({
    method: "POST",
    url: url,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {consulta: consulta, paciente: paciente, id_enfermedad: enfer_id, circulo_id: circ, antecedente: 'familiar'}
  })
  .then(function successCallback(resp){
    $scope.enfer_trans_sexual = resp.data;
    console.log(resp.data)

  }, function errorCallback(response) {
    console.log("error");

  });
}

/*Elimina la enfermedad que esta asociada al paciente y a la consulta*/

$scope.eliminarTransmSexual = function(i,id_enfermedad, consulta, paciente){
  var url_card = "http://localhost:8088/sihco/public/eliminar/paciente/enfermedad_transmision_sexual";

  $http({
    method: "POST",
    url: url_card,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {consulta: consulta, paciente: paciente, id_paciente_enfer: id_enfermedad, antecedente: 'familiar'}
  })
  .then(function successCallback(resp){
    $scope.enfer_trans_sexual = resp.data;
    console.log(resp.data)

  }, function errorCallback(response) {
    console.log("error");

  });
}

/***********************************************************************************/


/*Inserta cancer en BD*/
$scope.insertarEnfermedadCancer= function(){

  var url_inser = "http://localhost:8088/sihco/public/insertar/enfermedad_cancer";
  var enfermedad_cancer = $scope.nombre_enfermedad_cancer;

  var config = {
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
      }
  }
$scope.data = $.param({enfermedad: enfermedad_cancer});

  $http({
    method: "POST",
    url: url_inser,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {enfermedad: enfermedad_cancer}
  })
  .then(function successCallback(resp){
    $scope.cancer = resp.data;

  }, function errorCallback(response) {
    console.log("error");

  });
}

/*Elimina una efermedad transmision sexual en BD*/
$scope.eliminarEnfermedadCancer = function(id_enfermedad){
    var url = "http://localhost:8088/sihco/public/eliminar/enfermedad_cancer";

  $http({
    method: "POST",
    url: url,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {id_enfermedad: id_enfermedad}
  })
  .then(function successCallback(resp){
    $scope.cancer = resp.data;

  }, function errorCallback(response) {
    console.log("error");

  });
}


/*Inserta la enfermedad sexual asociada al paciente y a la consulta*/
$scope.add_enfermerdad_cancer = function(consulta,paciente, enfermedad, valor){

var enfer_id = enfermedad[0];
var circ = valor;
//console.log('locagio',window.location);
  
var config = {
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
    }
  }
$scope.data = $.param({consulta: consulta, paciente: paciente, id_enfermedad: enfer_id[0], circulo_id: circ, antecedente: 'familiar'});
//$http.post("http://localhost:8088/sihco/public/enfermedad_cardiovascular",  $scope.data, config)

var url = "http://localhost:8088/sihco/public/enfermedad_cancer";
  $http({
    method: "POST",
    url: url,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {consulta: consulta, paciente: paciente, id_enfermedad: enfer_id, circulo_id: circ, antecedente: 'familiar'}
  })
  .then(function successCallback(resp){
    $scope.enfer_cancer = resp.data;
    console.log(resp.data)

  }, function errorCallback(response) {
    console.log("error");

  });
}

/*Elimina la enfermedad que esta asociada al paciente y a la consulta*/

$scope.eliminarCancer = function(i,id_enfermedad, consulta, paciente){
  var url_card = "http://localhost:8088/sihco/public/eliminar/paciente/enfermedad_cancer";

  $http({
    method: "POST",
    url: url_card,
    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
    params: {consulta: consulta, paciente: paciente, id_paciente_enfer: id_enfermedad, antecedente: 'familiar'}
  })
  .then(function successCallback(resp){
    $scope.enfer_cancer = resp.data;
    console.log(resp.data)

  }, function errorCallback(response) {
    console.log("error");

  });
}

/***********************************************************************************/

});
