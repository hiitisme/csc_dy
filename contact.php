<?php
SESSION_START();
if(isset($_SESSION['user_id']))
{
  error_reporting(E_ERROR);
  ?>
  <html>
  <head>
    <title>Home</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
    .cat-icon{
      font-size: 6vw;
    }
    .cat-name {
      margin-top: 3%;
      font-size: 2vw;
    }
    .log-icon{
      font-size: 20px;
    }
    </style>
  </head>
  <body ng-app="CscControl" ng-controller="cscctrl">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home img-circle log-icon"></span></a>

        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">

            <li><img class="img-circle" src="img/profile.png" height="40" width="40"></li>
            <li><a href="profile.php"><?php echo $_SESSION['name']; ?></a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-off log-icon"></span></a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="row" class="text-center">
        <div class="col-md-4">
          <ul class="list-group list-unstyled">
            <li><input type="text" ng-model="name" placeholder="Enter the Name:" class="form-control"/></li>
            <li id="dis_cisco" class="list-group-item list-group-item-info" ng-repeat="contact in ciscos | filter:name | orderBy:'name'">
             <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;{{contact.name}}&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-earphone"></span>&nbsp;&nbsp;&nbsp;{{contact.no}}
           </li>
         </div>


        <div class="col-md-3 col-md-offset-3">
          <div id="error"></div>
          <div class="row">
            <form id="add_cisco">
              <input type="text" id="name" ng-model="cisco.name" class="form-control" placeholder="Enter the Name" required/></br>
              <input type="text" id="cisco" ng-model="cisco.number" class="form-control" placeholder="Enter the Number" pattern="/d" required/></br>
              <input type="submit" ng-click="add_cisco(cisco)" value="Add" class="btn btn-primary center-block" />
            </form>
       </div>
     </div>

      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/angular.min.js" ></script>
    <script type="text/javascript" src="js/controller.js"></script>
    <script type="text/javascript">

    $(document).ready(function(){
      $('#add_cisco').submit(function(e){
        e.preventDefault();
        var name = $('#name').val();
        var cisco= $('#cisco').val();
        $.ajax({
          url: "add_data/add_cisco.php",
          type: "POST",
          data: "name="+name+"&cisco="+cisco,
          success: function(data,status,xhr){
            if(data=="success"){
              $('#name').val("");
              $('#cisco').val("");
            }
            else{
              $('#error').html("Try Again");
            }
          }, }); });
    });
    </script>
  </body>
  </html>
  <?php
}
else {
  header('Location:signin.html');
} ?>
