var CscControl = angular.module("CscApp",[]);
CscControl.controller("sitectrl",function($scope,$http){

 $http.get("data/site.php").then(function (response) {$scope.sites = response.data.sites;});

 $scope.add_site = function (site) {
   $http({
            method  : 'POST',
            url     : 'add_data/add_site.php',
            data    : site,
            headers : {'Content-Type': 'application/x-www-form-urlencoded'}
           })
            .success(function(data) {
               $scope.sites.push({
                 id : data.id ,  link : data.link ,  name : data.name
              });
              $scope.site.site_url = "";
              $scope.site.name  = "";
            });
          };

};


});
