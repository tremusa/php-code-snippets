<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<body>

<div ng-app="myApp" ng-controller="myCtrl" ng-init='obj=false'>

<p ng-hide="obj">I am not visible.</p>

<p ng-hide="obj">I am visible.</p>

<p ng-click="One()"> Go Booiz </p>

</div> 

<script>
	var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope) {
    
    $scope.One = function() {
        if($scope.obj == true)
        	$scope.obj = false;
        else
        	$scope.obj = true;
    }
});

</script>

</body>
</html>
