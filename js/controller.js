var CscControl = angular.module("CscControl",[]);
CscControl.controller("cscctrl",function($scope,$http){

 $http.get("data/data.php").then(function (response) {$scope.ciscos = response.data.ciscos;});


});
