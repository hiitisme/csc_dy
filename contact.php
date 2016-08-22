<?php
SESSION_START();
if(isset($_SESSION['user_id']))
{
  error_reporting(E_ERROR);
  ?>
  <html>
  <head>
    <title>Contact</title>
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
  <body ng-app="CscApp" ng-controller="ciscoctrl">
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
        <div class="col-md-6">
          <ul class="list-group list-unstyled">
            <li><input type="text" ng-model="name" placeholder="Enter the Name:" class="form-control"/></li>
            <li id="dis_cisco" class="list-group-item list-group-item-info" ng-repeat="contact in ciscos | filter:name | orderBy:'name'" id={{contact.id}}>
              <div class="row">
                <div class="col-md-3">
                   <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;{{contact.name}}
                </div>
                <div class="col-md-3">
                   <span class="glyphicon glyphicon-phone-alt"></span>&nbsp;&nbsp;&nbsp;{{contact.no}}
                </div>
                <div class="col-md-3">
                   <span class="glyphicon glyphicon-earphone"></span>&nbsp;&nbsp;&nbsp;{{contact.mobile}}
                </div>
                <div class="col-md-3">
                   <span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;&nbsp;{{contact.short_id}}
                </div>
              </div>
           </li>
         </div>


        <div class="col-md-3 col-md-offset-2">
          <div id="error"></div>
          <div class="row">
            <form id="add_cisco">
              <input type="text" id="name" ng-model="cisco.name" class="form-control" placeholder="Enter the Name" required/></br>
              <input type="text" id="cisco" ng-model="cisco.number" class="form-control" placeholder="Extension Number" pattern="\d*" required/></br>
              <input type="text" id="mobile" ng-model="cisco.mobile_number" class="form-control" placeholder="Mobile Number" pattern="\d*" /></br>
              <input type="text" id="short" ng-model="cisco.short_id" class="form-control" placeholder="Short ID" /></br>
              <input type="submit" ng-click="add_cisco(cisco)" value="Add" class="btn btn-primary center-block" />
            </form>
       </div>
     </div>

      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/angular.min.js" ></script>
    <script type="text/javascript" src="js/ciscocontroller.js"></script>
    <script type="text/javascript">

    $(document).ready(function(){
      $(document).on("click",".cisco_edit",function(e){
        e.preventDefault();
        var cisco_id = $(this).attr('id');
        $.ajax({
          url: "data/get_cisco_edit.php",
          type: "POST",
          data: "cisco_id="+cisco_id,
          success: function(data,status,xhr){
              $('#name').val(data.name);
              $('#cisco').val(data.no);
              $('#mobile').val(data.mobile);
              $('#short').val(data.short_id);
              $('#add_cisco').prop('id', 'update_cisco');
              $('#add_submit').addClass('hidden');
              $('#edit_submit').removeClass('hidden');
          }, }); });

    $(document).on("submit","#update_site",function(e){
          e.preventDefault();
          var cisco_id = $('#cisco_id').val();
          var name = $('#name').val();
          var cisco = $('#cisco').val();
          var mobile = $('#mobile').val();
          var short = $('#short').val();
          $.ajax({
            url: "update/update_cisco.php",
            type: "POST",
            data: "name="+name+"&cisco="+cisco+"&mobile="+mobile+"&short_id="+short,
            success: function(data,status,xhr){
              if(data=="success"){
                $('#name').val("");
                $('#cisco').val("");
                $('#short').val("");
                $('#mobile').val("");
                $('#edit_submit').addClass('hidden');
                $('#add_submit').removeClass('hidden');
                $('#update_cisco').prop('id', 'update_cisco');
                $('#'+cisco_id+' .site_name').html(site_name);
                $('#'+cisco_id+' .site_url').html(site_url);
              }
              else{
                $('#error').html("Try Again");
              }
            }, }); });

      $(document).on("click",".close",function(e){
        e.preventDefault();
        var cisco_id = $(this).attr('id');
        $.ajax({
          url: "delete/cisco_delete.php",
          type: "POST",
          data: "site_id="+site_id,
          success: function(data,status,xhr){
              $('#'+cisco_id).remove();
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
