<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<body>

<div ng-app="myApp" ng-controller="myCtrl">

<div>
    <ul>
        <li ng-repeat="x in names">
            {{x}}
        </li>
    </ul>
</div>

</div>

<script>
// creates module named myApp with controlled named myCtrl
var app = angular.module('myApp', []);



app.controller('myCtrl', function($scope) {
    $scope.names = ['kaka','baka','tata'];
    $scope.firstName= "John";
    $scope.lastName= "Doe";
});

</script>

</body>
</html>
