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
        <div class="col-md-3">
          <ul class="list-group">
            <li class="list-group-item list-group-item-info" ng-repeat="site in sites | orderBy:'name' "><a target="_blank" href="{{site.link}}">{{site.name}}</a></li>
          </ul>
        </div>

        <div class="col-md-3 col-md-offset-3">
          <div id="error"></div>
          <div class="row">
            <form id="add_site" >
              <input type="text" id="site_name" ng-model="site.name" class="form-control" placeholder="Enter the Name" required/></br>
              <input type="text" id="site_url" ng-model="site.site_url" class="form-control" placeholder="Enter the URL" pattern="/d" required/></br>
              <input type="submit" ng-click="add_site(site)" value="Add"  class="btn btn-primary center-block" />
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
      $('#add_site').submit(function(e){
        e.preventDefault();
        var name = $('#site_name').val();
        var site_url= $('#site_url').val();
        $.ajax({
          url: "add_data/add_site.php",
          type: "POST",
          data: "name="+name+"&site_url="+site_url,
          success: function(data,status,xhr){
            if(data=="success"){
              $('#site_name').val("");
              $('#site_url').val("");
            }
            else{
              $('#error').html("Try Again");
            }
          },
        });
      });
    });
    </script>
  </body>
  </html>
  <?php
}
else {
  header('Location:signin.html');
} ?>
