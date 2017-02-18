<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Contacts</title>

        <link href="css/styles.css" rel="stylesheet" type="text/css">
        <link href="components/semantic/dist/semantic.min.css" rel="stylesheet" type="text/css">


        <!-- Styles -->

    </head>
    <body ng-app="contactApp" ng-controller="contactController">
      <div class="ui segment">
        <h3>New contact</h3>
        <form id="inputForm" name="inputForm" class="ui form two column stackable grid"  novalidate
        ng-submit="inputForm.$valid&&addContact()">
          <div class="column">
            <div class="ui two column stackable grid">
              <div class="eight wide column ">
                <input  class="ui segment"  type="text" name="Name" placeholder="Name" ng-model="newContact.name" required></input>

              </div>
              <div class="eight wide column ">
                <input class="ui segment" type="text" name="Surname" placeholder="Surname" ng-model="newContact.surname"></input>
              </div>
            </div>
            <div class="ui two column stackable grid">
              <div class="eight wide column ">
                <input class="column" type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="phone" placeholder="Phone" ng-model="newContact.phone" required></input>
              </div>
              <div class="eight wide column ">
                <input class="column" type="date" name="birthday" placeholder="Birthday" ng-model="newContact.birthday"></input>
              </div>
            </div>
          </div>
          <div class="ui column" style="padding: 9px;">
            <textarea  name="info" placeholder="Notes" ng-model="newContact.info" rows="5"></textarea>
            <span class="danger" ng-show="error">Duplicated phone number</span>
            <div>
              <input id="add" class="ui button" type="submit" value="Add">
            </div>
          </div>
        </form>
      </div>

      <div class="ui segment form">
        <input class="ui input" type="text" placeholder="Search" ng-model="srcVal">
      </div>
      <div class=" contactContainer ui segment">
        <h3>Contacts</h3>
        <div class="contactContainer"  ng-repeat="contact in contacts|filter:srcVal">
          <div class="contactRecord ui segment three stackable grid">
            <div class="four wide column">
              {% contact.name %}   {% contact.surname %}
            </div>
            <div class=" three wide column">
              Phone number: {% contact.phone %}
            </div>
            <div class=" four wide column">
              Birthday: {% contact.birthday %}
            </div>
            <div class="five wide column">
              Notes: {% contact.info %}
            </div>
          </div>
        </div>
      </div>

    </body>

    <script src="components/angular/angular.min.js"></script>
    <script src="js/main.js"></script>
</html>
