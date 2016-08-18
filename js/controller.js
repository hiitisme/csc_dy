var CscControl = angular.module("CscControl",[]);
CscControl.controller("cscctrl",function($scope,$http){

 $http.get("data/cisco.php").then(function (response) {$scope.ciscos = response.data.ciscos;});

 $http.get("data/site.php").then(function (response) {$scope.sites = response.data.sites;});

 $http.get("data/note.php").then(function (response) {$scope.notes = response.data.notes;});

 $scope.add_site = function (site) {
  var name = site.name;
  var site_url = site.site_url;
   $scope.sites.push({
     link  : site_url ,  name : name
   });

};

$scope.add_cisco = function (cisco) {
 var name = cisco.name;
 var number = cisco.number;
  $scope.ciscos.push({
    name  : name ,  no : number
  });

};

$scope.add_note = function (note) {
 var note = note.note;
 var tag = note.tag;
  $scope.notes.push({
    note  : note ,  tag : tag
  });

};


});
