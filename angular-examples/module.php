<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<body>

<p>Try to change the names.</p>

<div ng-app="myApp" ng-controller="myCtrl">

First Name: <input type="text" ng-model="firstName"><br>
Last Name: <input type="text" ng-model="lastName"><br>
<br>
Full Name: {{firstName + " " + lastName}}

</div>

<div id='app2' ng-app="myApp2" ng-controller="myCtrl2">

First Name: <input type="text" ng-model="firstName"><br>
Last Name: <input type="text" ng-model="lastName"><br>
<br>
Full Name: {{firstName + " " + lastName}}

</div>

<script>
// creates module named myApp with controlled named myCtrl
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope) {
    $scope.firstName= "John";
    $scope.lastName= "Doe";
});

var app = angular.module('myApp2', []);
app.controller('myCtrl2', function($scope) {
    $scope.firstName= "John";
    $scope.lastName= "Doe";
});

// manual bootstrapping for more than one app
angular.bootstrap(document.getElementById("app2"), ['myApp2']);
</script>

</body>
</html>
