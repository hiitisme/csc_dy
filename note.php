<?php
SESSION_START();
if(isset($_SESSION['user_id']))
{
  error_reporting(E_ERROR);
  ?>
  <html>
  <head>
    <title>Notes</title>
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

    .notebor{
  border-width:1px;
  border-bottom-style:solid;
}

    </style>
  </head>
  <body ng-app="CscApp" ng-controller="notectrl">
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
        <div id="error"></div>
        <div class="col-md-6">
          <form id="add_note">
            <div class="col-md-9">
              <textarea class="form-control" ng-model="note.note" placeholder="note" id="note"></textarea>
            </div>
            <div class="col-md-3">
              <div class="row">
                <input type="hidden" id="note_id" ng-model="note.id" />
                <input type="text" class="form-control" ng-model="note.tag" placeholder="Tag" id="tag" />
              </div><p></p>
              <div class="row">
                 <input id="edit_submit" type="submit" class="btn btn-primary center-block hidden" value="Update">
                 <input id="add_submit" type="submit" ng-click="add_note(note)" class="btn btn-primary center-block" value="Add">
              </div>
            </div>
          </form>
        </div>
      {{test}}
        <div class="col-md-2">
          <input type="text" placeholder="Enter the tag name" class="form-control" ng-model="tag"/>
        </div>
      </div>
      <div style="margin-top:5%">
      <div class="panel panel-default col-md-5" ng-repeat="note in notes | filter:tag" style="margin-left:5%;" id="{{note.id}}">
        <div class="panel-body notebor">
          <div class="row">
            <div class="col-md-10">
              <div class="row">
                <div class="col-md-6">
                  {{note.created_time}}
                </div>
                <div class="col-md-6 note_tag">
                  {{note.tag}}
                </div>
              </div>
            </div>
            <div class="col-md-1">
              <div class="note_edit" id="{{note.id}}"><span class="glyphicon glyphicon-pencil"></span></div>
            </div>
            <div class="col-md-1">
              <button type="button" class="close" id="{{note.id}}"  aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
          </div>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12 note_note">
              {{note.note}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/angular.min.js" ></script>
    <script type="text/javascript" src="js/notecontroller.js"></script>
    <script type="text/javascript" src="js/analytic.js" ></script>
    <script type="text/javascript">

    $(document).ready(function(){

      $(document).on("click",".note_edit",function(e){
        e.preventDefault();
        var note_id = $(this).attr('id');
        $.ajax({
          url: "data/get_note_edit.php",
          type: "POST",
          data: "note_id="+note_id,
          success: function(data,status,xhr){
              $('#note').val(data.note);
              $('#tag').val(data.tag);
              $('#note_id').val(data.id);
              $('#add_note').prop('id', 'update_note');
              $('#add_submit').addClass('hidden');
              $('#edit_submit').removeClass('hidden');
          }, }); });

    $(document).on("submit","#update_note",function(e){
          e.preventDefault();
          var note_id = $('#note_id').val();
          var note = $('#note').val();
          var tag = $('#tag').val();
          $.ajax({
            url: "update/update_note.php",
            type: "POST",
            data: "note="+note+"&tag="+tag+"&note_id="+note_id,
            success: function(data,status,xhr){
              if(data=="success"){
                $('#note').val("");
                $('#tag').val("");
                $('#note_id').val("");
                $('#edit_submit').addClass('hidden');
                $('#add_submit').removeClass('hidden');
                $('#update_note').prop('id', 'add_note');
                $('#'+note_id+' .note_tag').html(tag);
                $('#'+note_id+' .note_note').html(note);
              }
              else{
                $('#error').html("Try Again");
              }
            }, }); });

      $(document).on("click",".close",function(e){
        e.preventDefault();
        var note_id = $(this).attr('id');
        $.ajax({
          url: "delete/note_delete.php",
          type: "POST",
          data: "note_id="+note_id,
          success: function(data,status,xhr){
              $('#'+note_id).remove();
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
