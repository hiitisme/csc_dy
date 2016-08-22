var CscControl = angular.module("CscApp",[]);
CscControl.controller("notectrl",function($scope,$http){

 $http.get("data/note.php").then(function (response) {$scope.notes = response.data.notes;});

$scope.add_note = function (note) {
   $http({
            method  : 'POST',
            url     : 'add_data/add_note.php',
            data    : note,
            headers : {'Content-Type': 'application/x-www-form-urlencoded'}
           })
            .success(function(data) {
               $scope.notes.push({
                 id : data.id , note  : data.note ,  tag : data.tag , created_time : data.created_time
              });
              $scope.note.note = "";
              $scope.note.tag  = "";
            });
          };

  });
