<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Contacts</title>

        <!-- Fonts -->

        <link href="css/app.css" rel="stylesheet" type="text/css">


        <!-- Styles -->

    </head>
    <body ng-app="contactApp" ng-controller="contactController">
      <ul  ng-repeat="contact in contacts">
        <li>{% contact.name %}</li>
      </ul>

    </body>

    <script src="components/angular/angular.min.js"></script>
    <script src="js/main.js"></script>
</html>
