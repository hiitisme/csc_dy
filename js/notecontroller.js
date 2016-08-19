var CscControl = angular.module("CscApp",[]);
CscControl.controller("notectrl",function($scope,$http){

 $http.get("data/note.php").then(function (response) {$scope.notes = response.data.notes;});

$scope.add_note = function (note) {
 var note = note.note;
 var tag = note.tag;
  $scope.notes.push({
    note  : note ,  tag : tag
  });

};


});
