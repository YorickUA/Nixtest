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

    $scope.dateDiff= function(contact){

      var birthday = new Date (contact.birthday);
      var today = new Date();
      today.setHours(0,0,0,0);

      birthday.setFullYear(today.getFullYear());
      if (today > birthday) {
        birthday.setFullYear(today.getFullYear() + 1);
      }
      var days=Math.floor((birthday - today) / (1000*60*60*24));
      return days<10?(days<5?'veryClose':'close'):'';
    }
  })


})();
