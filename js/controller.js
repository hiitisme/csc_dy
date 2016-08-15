var CscControl = angular.module("CscControl",[]);
CscControl.controller("cscctrl",function($scope,$http){

 $http.get("data/cisco.php").then(function (response) {$scope.ciscos = response.data.ciscos;});

 $http.get("data/site.php").then(function (response) {$scope.sites = response.data.sites;});


});
