<html>
<head>
  <title>The page for CSC</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<?php
 session_start();
 ?>
<body ng-app="CscControl" ng-controller="cscctrl">
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">
           CSC
        </a>
      </div>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><?php echo $_SESSION['name']; ?> </a></li>
      <li><a href="#">Logout</a></li>
    </ul>
    </div>
  </nav>
  <div class="container">
  <div class="row">
    <div class="col-md-3">
      <ul class="list-group">
        <li class="list-group-item list-group-item-info" ng-repeat="site in sites"><a target="_blank" href="{{site.link}}">{{site.name}}</a></li>
      </ul>
    </div>
    <div class="col-md-4">
      <ul class="list-group list-unstyled">
        <li><input type="text" ng-model="name" placeholder="Enter the Name:" class="form-control"/></li>
        <li class="list-group-item list-group-item-info" ng-repeat="contact in ciscos | filter:name | orderBy:'name' ">
         <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;{{contact.name}}&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-earphone"></span>&nbsp;&nbsp;&nbsp;{{contact.no}}
       </li>
     </div>
    </div>
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/angular.min.js" ></script>
<script type="text/javascript" src="js/controller.js"></script>
</body>
</html>
