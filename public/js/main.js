(function (){

  var app=angular.module('contactApp',[]);
  app.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('{%').endSymbol('%}');
  });

  app.controller('contactController', function($scope, $http){
    $scope.contacts=[];
    $http.get('contacts').then(function(response){
      $scope.contacts=response.data;
    })
  })


})();
