<?php
SESSION_START();
if(isset($_SESSION['user_id']))
{
  error_reporting(E_ERROR);
?>
<html>
<head>
  <title>The page for CSC</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
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
        <li id="dis_site" class="list-group-item list-group-item-info" ng-repeat="site in sites"><a target="_blank" href="{{site.link}}">{{site.name}}</a></li>
      </ul>
    </div>
    <div class="col-md-4">
      <ul class="list-group list-unstyled">
        <li><input type="text" ng-model="name" placeholder="Enter the Name:" class="form-control"/></li>
        <li id="dis_cisco" class="list-group-item list-group-item-info" ng-repeat="contact in ciscos | filter:name | orderBy:'name' ">
         <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;{{contact.name}}&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-earphone"></span>&nbsp;&nbsp;&nbsp;{{contact.no}}
       </li>
     </div>
     <div class="col-md-3">
       <div id="error"></div>
       <div class="row">
         <form>
           <input type="text" id="name" class="form-control" placeholder="Enter the Name" required/></br>
           <input type="text" id="cisco" class="form-control" placeholder="Enter the Number" pattern="/d" required/></br>
           <input type="submit" value="Add" id="add_cisco" class="btn btn-primary center-block" />
         </form>
         <form>
           <input type="text" id="site_name" class="form-control" placeholder="Enter the Name" required/></br>
           <input type="text" id="site_url" class="form-control" placeholder="Enter the URL" pattern="/d" required/></br>
           <input type="submit" value="Add" id="add_site" class="btn btn-primary center-block" />
         </form>
    </div>
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/angular.min.js" ></script>
<script type="text/javascript" src="js/controller.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('#add_cisco').click(function(e){
    e.preventDefault();
    var name = $('#name').val();
    var cisco= $('#cisco').val();
    $.ajax({
      url: "add_cisco.php",
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
$(document).ready(function(){
  $('#add_site').click(function(e){
    e.preventDefault();
    var name = $('#site_name').val();
    var site_url= $('#site_url').val();
    $.ajax({
      url: "add_site.php",
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
