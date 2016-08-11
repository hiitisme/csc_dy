var CscControl = angular.module("CscControl",[]);
CscControl.controller("cscctrl",function($scope){

    $scope.contacts = [
      {name:'Aravindh',no:'701311'},
      {name:'Venkat',no:'722427'},
      {name:'kkuna',no:'705492'},
      {name:'Srudeep',no:'709980'},
      {name:'Paddy',no:'703213'},
      {name:'Deepika',no:'700024'},
      {name:'Ajay',no:'705230'},
      {name:'Chithravel',no:'706334'},
      {name:'Manikanta',no:'708718'},
      {name:'Deva',no:'722300'},
      {name:'Kavitha',no:'704732'},
      {name:'Prasanth',no:'709051'},
      {name:'Sumit',no:'701837'},
      {name:'Ashwin',no:'702958'}

    ];

    $scope.sites = [
        {name:'C3',link:"https://c3.csc.com"},
        {name:'ESS',link:"https://csc100.csc.com/irj/portal"},
        {name:'Workday',link:"https://www.myworkday.com/csc/d/home.htmld"},
        {name:'CSS',link:"https://www.csc.com/css_in"},
        {name:'CSC University',link:"https://csc.skillport.com/skillportfe/custom/login/csc/csclanding.action"},
        {name:'CHAT',link:"http://chat.csc.com/"},
        {name:'Portal',link:"https://in.portal.csc.com/"},
        {name:'Attendace',link:"https://etes.csc.com"}];


});
