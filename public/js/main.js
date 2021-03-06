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
      transformDate($scope.newContact);
        $http.post('contacts', $scope.newContact).then(function(response){
          console.log(response);
          if(response.data!="false"){
             if (response.status===200){
             $scope.newContact.id=response.data.id;
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
      return days<=10?(days<=5?'veryClose':'close'):'';
    }
  })

  app.controller('editController', function($scope,  $location, $http){
    var id=$location.absUrl().split('/');
     id=id[id.length-1];
     $scope.error=false;
     $scope.updated=false;


     $http.get('/contacts/'+id).then( function(response){
       if(response.data.birthday){
       response.data.birthday=new Date(response.data.birthday);
     }
       $scope.Contact=response.data;
    })
    $scope.editContact= function(){
      transformDate($scope.Contact);
      $http.put('/edit/'+id, $scope.Contact).then(function(response){
        if(response.data!="false"){
          $scope.error=false;
          $scope.updated=true;
        }else{
          $scope.error=true;
          $scope.updated=false;
        }
      })
    }
    $scope.deleteContact=function(){
      $http.delete('/edit/'+id).then(function(response){
        window.location.href=window.location.hostname;
      })
    }
  })
  function transformDate(contact){
    if(contact.birthday){
    var a= new Date(contact.birthday);
    contact.birthday= a.getUTCFullYear() + "-" +
        ("0" + (a.getUTCMonth()+1)).slice(-2) + "-" +
        ("0" + a.getUTCDate()).slice(-2);

      }else{
        contact.birthday="";
      }
  }

})();
