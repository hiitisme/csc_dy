var CscControl = angular.module("CscApp",[]);
CscControl.controller("ciscoctrl",function($scope,$http){

$http.get("data/cisco.php").then(function (response) {$scope.ciscos = response.data.ciscos;});

$scope.add_cisco = function (cisco) {
 var name = cisco.name;
 var number = cisco.number;
 var mobile = cisco.mobile_number;
 var short_id = cisco.short_id;
  $scope.ciscos.push({
    name  : name ,  no : number , mobile : mobile , short_id : short_id
  });

};

});
