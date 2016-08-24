var CscControl = angular.module("CscApp",[]);
CscControl.controller("ciscoctrl",function($scope,$http){

$http.get("data/cisco.php").then(function (response) {$scope.ciscos = response.data.ciscos;});

$scope.add_cisco = function (cisco) {

  $http({
           method  : 'POST',
           url     : 'add_data/add_cisco.php',
           data    : cisco,
           headers : {'Content-Type': 'application/x-www-form-urlencoded'}
          })
           .success(function(data) {
             $scope.ciscos.push({
               id :data.id , name  : data.name ,  no : data.no , mobile : data.mobile , short_id : data.short_id
             });
             $scope.cisco.number = "";
             $scope.cisco.name  = "";
             $scope.cisco.mobile_number  = "";
             $scope.cisco.short_id  = "";
           });
         };



});
