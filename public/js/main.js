(function (){

  var app=angular.module('contactApp',[]);
  app.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('{%').endSymbol('%}');
  });

  app.controller('contactController', function($scope, $http){
    $scope.contacts=[];
    $scope.newContact={};
    $scope.error=false;
    $http.get('contacts').then(function(response){
      $scope.contacts=response.data;
    })
    $scope.addContact= function (){
      if($scope.newContact.birthday){
      var a= new Date($scope.newContact.birthday);
      $scope.newContact.birthday= a.getUTCFullYear() + "-" +
          ("0" + (a.getUTCMonth()+1)).slice(-2) + "-" +
          ("0" + a.getUTCDate()).slice(-2);

        }else{
          $scope.newContact.birthday="";
        }
        $http.post('contacts', $scope.newContact).then(function(response){
          console.log(response);
          if(response.data!="false"){
             if (response.status===200){
            $scope.contacts.push($scope.newContact);
            $scope.newContact={};
            $scope.error=false;
          }
          }else{
            $scope.error=true;
          }
        })
    }
  })


})();
