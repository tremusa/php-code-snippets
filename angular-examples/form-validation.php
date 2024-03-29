<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>  
<body ng-app="">

<p>Try leaving the first input field blank:</p>

<form name="myForm">
<p>Name:
<input name="myName" ng-model="myName" required>
<span ng-show="myForm.myName.$touched && myForm.myName.$invalid">The name is required.</span>
</p>

<p>Address:
<input name="myAddress" ng-model="myAddress" required>
</p>

</form>

<p>We use the ng-show directive to only show the error message if the field has been touched AND is empty.</p>

</body>
</html>
