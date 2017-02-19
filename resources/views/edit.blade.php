<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Contacts</title>

        <!-- Fonts -->

        <link href="../css/styles.css" rel="stylesheet" type="text/css">
        <link href="../components/semantic/dist/semantic.min.css" rel="stylesheet" type="text/css">
        <script src="../components/angular/angular.min.js"></script>
        <script src="../js/main.js"></script>

        <!-- Styles -->

    </head>
    <body ng-app="contactApp" ng-controller="editController" ng-init="Contact={{$contact}}">
      <div class="ui segment">
        <h3>Edit contact</h3>
        <form id="inputForm" name="inputForm" class="ui form two column stackable grid"  novalidate
        ng-submit="inputForm.$valid&&editContact()">
          <div class="column">
            <div class="ui two column stackable grid">
              <div class="eight wide column ">
                <input  class="ui segment"  type="text" name="Name" placeholder="Name*" ng-change="updated=false" ng-model="Contact.name" required></input>

              </div>
              <div class="eight wide column ">
                <input class="ui segment" type="text" name="Surname" placeholder="Surname" ng-change="updated=false" ng-model="Contact.surname"></input>
              </div>
            </div>
            <div class="ui two column stackable grid">
              <div class="eight wide column ">
                <input class="column" type="text" ng-change="updated=false" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="phone" placeholder="Phone*|" ng-model="Contact.phone" required></input>
              </div>
              <div class="eight wide column ">
                <input class="column" type="date" name="birthday" placeholder="Birthday" ng-change="updated=false" ng-model="Contact.birthday"></input>
              </div>
            </div>
          </div>
          <div class="ui column" style="padding: 9px;">
            <textarea  name="info" placeholder="Notes" ng-change="updated=false" ng-model="Contact.info" rows="5"></textarea>
            <span ng-show="error">Update failed. Duplicated phone number</span>
            <span ng-show="!inputForm.$valid">Fill all required fields*</span>
            <span ng-show="updated">Update successful</span>
            <div>
              <div class="buttonBox">
                <a href="/" class="ui button ourButton">Back</a>
                <div  class="ui button ourButton red"  ng-click="deleteContact()">Delete</div>
                <input id="add" class="ui button ourButton green" type="submit" value="Edit"></input>
              </div>
            </div>
          </div>
        </form>
      </div>
    </body>
</html>
