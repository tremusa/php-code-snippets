<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-route.js"></script>

<body ng-app="myApp" ng-controller="myCtrl">


<div ng-click="Test()"> Response {{ResponseDetails}}</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    var app = angular.module("myApp", []);
    app.controller("myCtrl", function ($scope, $http) {
        $scope.ResponseDetails = 'initial';

        $scope.Test = function(){
            $http.post("test.php?groupby=breednames", {cache:false})
                .then(function(response){
                    $scope.ResponseDetails = angular.copy(response.data);
            });
        }
    });
</script>
</body>
</html>

