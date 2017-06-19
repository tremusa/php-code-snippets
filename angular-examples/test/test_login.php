<!DOCTYPE html>
<html lang="en-US">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-route.js"></script>


<body ng-app="myApp" ng-controller="myController">
<h1> FB Login </h1>
<input type="button" ng-click="onFBLogin()" value="Login" style="width:100px;height:50px" />
</body>  

<script>
window.fbAsyncInit = function() {
  FB.init({
    appId      : '190001711479299',
    cookie     : true,  
     xfbml      : true, 
    version    : 'v2.8',
    status     : true,
  });
};
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));


var myApp= angular.module("myApp",[]);
myApp.controller("myController", function($scope,$http) {
	$scope.onFBLogin= function(){
		FB.login(function(response){
			if(response.authResponse){
				FB.api('/me','GET',{fields:'email,name,id,cover,first_name,last_name,age_range,link,gender,locale,picture,timezone,updated_time,verified'},function(response){
					alert(JSON.stringify(response));
					var name= response.name;
					var profile= response.picture.data.url;
	
					$scope.Test($http);	
				});
			}
		});

	}
	$scope.Test= function(){
    $http.post("test.php").then(function (response) {
      alert(response.data);
    });
	}
});
</script>
</html>