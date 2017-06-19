<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<body ng-app="myApp">

<!--always use hiphenated version in html-->
<sk-directive></sk-directive>

<p style="color:green;" sk-directive> Some text? </p>

<script>
var app = angular.module("myApp", []);
// Always user camel case here i.e. first word lower case, all next upper(first char of word)
app.directive("skDirective", function() {
    return {
        restrict: 'AE', // Restricts use only in attributes and elements
        template : "<h1>Made by a custom directive!</h1>"
    };
});
</script>

</body>
</html>
