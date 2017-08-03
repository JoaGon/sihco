angular.module("ControlPlaca",[], function($interpolateProvider){
  $interpolateProvider.startSymbol('[[');
  $interpolateProvider.endSymbol(']]');
})
.controller("ControlPlacaController",function($scope,$http,$timeout){

        var jsonArmado
        
        var adultoArriva = [];
        var test = [];
        for (var i = 1; i < 17; i++) {
            if (i > 3 && i < 14) {
                jsonArmado = {id:i,tipoDiente:'decidua mixta'};
                adultoArriva.push(jsonArmado);
            }
            else
            {
                jsonArmado = {id:i,tipoDiente:'decidua'};
                adultoArriva.push(jsonArmado);
            }
            
        }
        /****Arriba***/
        //Dientes izquierdos
        for(var i = 0; i < 8; i++){
            var test2 = 18 - i;
            adultoArriva[i].value = test2;
        }
        //Dientes derechos
        for(var i = 8; i < 16; i++){
            var test3 = 13 + i;
            adultoArriva[i].value = test3;
        }
        
        $scope.adultoArriva = adultoArriva;

        var adultoAbajo = [];
        for (var i = 17; i < 33; i++) {
            if (i > 19 && i < 30) {
                jsonArmado = {id:i,tipoDiente:'decidua mixta'};
                adultoAbajo.push(jsonArmado);
            }
            else
            {
                jsonArmado = {id:i,tipoDiente:'decidua'};
                adultoAbajo.push(jsonArmado);
            }
        }
        $scope.adultoAbajo = adultoAbajo;

        /****Abajo***/
        //Dientes izquierdos
        for(var i = 0; i < 8; i++){
            var test2 = 48 - i;
            adultoAbajo[i].value = test2;
        }
        //Dientes derechos
        for(var i = 8; i < 16; i++){
            var test3 = 23 + i;
            adultoAbajo[i].value = test3;
        }
    
        
        var ninoArriva = [];
        for (var i = 33; i < 43; i++) {
            jsonArmado = {id:i,tipoDiente:'nino'};
            ninoArriva.push(jsonArmado);
        }
        $scope.ninoArriva = ninoArriva;

        var ninoAbajo = [];
        for (var i = 43; i < 53; i++) {
            jsonArmado = {id:i,tipoDiente:'nino'};
            ninoAbajo.push(jsonArmado);
        }
        $scope.ninoAbajo = ninoAbajo;



});
