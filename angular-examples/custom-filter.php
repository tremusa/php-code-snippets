<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<body>

<ul ng-app="myApp" ng-controller="namesCtrl">
<li ng-repeat="x in names">
    {{x | myFormat}}
</li>
</ul>

<script>
var app = angular.module('myApp', []);
app.filter('myFormat', function() {
    return function(x) {
        var i, c, txt = "";
        for (i = 0; i < x.length; i++) {
            c = x[i];
            if (i % 2 == 0) {
                c = c.toUpperCase();
            }
            txt += c;
        }
        return txt;
    };
});
app.controller('namesCtrl', function($scope) {
    $scope.names = [
        'Jani',
        'Carl',
        'Margareth',
        'Hege',
        'Joe',
        'Gustav',
        'Birgit',
        'Mary',
        'Kai'
        ];
});
</script>

<p>Make your own filters.</p>
<p>This filter, called "myFormat", will uppercase every other character.</p>
</body>
</html>
