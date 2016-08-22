<?php
SESSION_START();
ob_start();
if(isset($_SESSION['user_id']))
{
  error_reporting(E_ERROR);
  ?>
  <html>
  <head>
    <title>Sites</title>
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
  <body ng-app="CscApp" ng-controller="sitectrl">
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
            <li id={{site.id}} class="list-group-item list-group-item-info" ng-repeat="site in sites | orderBy:'name' ">
              <div class="row">
                <div class="col-md-9">
                 <a target="_blank" href="{{site.link}}">{{site.name}}</a>
                </div>
                <div ng-if="site.user_id != 0">
                  <div class="col-md-1">
                   <div id={{site.id}} class="site_edit"><span class="glyphicon glyphicon-pencil"></span></div>
                  </div>
                </div>
                <div ng-if="site.user_id != 0">
                  <div class="col-md-1">
                   <div id={{site.id}} class="close" aria-label="Close"><span aria-hidden="true">&times;</span></div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>

        <div class="col-md-3 col-md-offset-3">
          <div id="error"></div>
          <div class="row">
            <form id="add_site" >
              <input type="hidden" id="site_id" ng-model="site.id" /></br>
              <input type="text" id="site_name" ng-model="site.name" class="form-control" placeholder="Enter the Name" required/></br>
              <input type="text" id="site_url" ng-model="site.site_url" class="form-control" placeholder="Enter the URL" required/></br>
              <input id="add_submit" type="submit" ng-click="add_site(site)" value="Add"  class="btn btn-primary center-block" />
              <input id="edit_submit" type="submit" class="btn btn-primary center-block hidden" value="Update">
            </form>
       </div>
     </div>

      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/angular.min.js" ></script>
    <script type="text/javascript" src="js/sitecontroller.js"></script>
    <script type="text/javascript">

    $(document).ready(function(){

      $(document).on("click",".site_edit",function(e){
        e.preventDefault();
        var site_id = $(this).attr('id');
        $.ajax({
          url: "data/get_site_edit.php",
          type: "POST",
          data: "site_id="+site_id,
          success: function(data,status,xhr){
              $('#site_name').val(data.name);
              $('#site_url').val(data.link);
              $('#site_id').val(data.id);
              $('#add_site').prop('id', 'update_site');
              $('#add_submit').addClass('hidden');
              $('#edit_submit').removeClass('hidden');
          }, }); });

    $(document).on("submit","#update_site",function(e){
          e.preventDefault();
          var site_id = $('#site_id').val();
          var site_name = $('#site_name').val();
          var site_url = $('#site_url').val();
          $.ajax({
            url: "update/update_site.php",
            type: "POST",
            data: name"="+site_name+"&site_url="+site_url+"&site_id="+site_id,
            success: function(data,status,xhr){
              if(data=="success"){
                $('#site_name').val("");
                $('#site_url').val("");
                $('#site_id').val("");
                $('#edit_submit').addClass('hidden');
                $('#add_submit').removeClass('hidden');
                $('#update_site').prop('id', 'add_site');
                $('#'+site_id+' .site_name').html(site_name);
                $('#'+site_id+' .site_url').html(site_url);
              }
              else{
                $('#error').html("Try Again");
              }
            }, }); });

      $(document).on("click",".close",function(e){
        e.preventDefault();
        var site_id = $(this).attr('id');
        $.ajax({
          url: "delete/site_delete.php",
          type: "POST",
          data: "site_id="+site_id,
          success: function(data,status,xhr){
              $('#'+site_id).remove();
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
