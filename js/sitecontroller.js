var CscControl = angular.module("CscApp",[]);
CscControl.controller("sitectrl",function($scope,$http){

 $http.get("data/site.php").then(function (response) {$scope.sites = response.data.sites;});

 $scope.add_site = function (site) {
  var name = site.name;
  var site_url = site.site_url;
   $scope.sites.push({
     link  : site_url ,  name : name
   });

};


});
