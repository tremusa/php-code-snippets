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

<script src='myApp.js'></script>
<script src='myCtrl.js'></script>
</body>
</html>
