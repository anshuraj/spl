<!DOCTYPE html>
<html>
<head>
<title>SPL 2016</title>
<link rel="stylesheet" type="text/css" href="<?php echo site_url('public/bootstrap/css/bootstrap.min.css') ; ?>">
<script src="<?php echo site_url('public/js/jquery.min.js') ; ?>"></script>
<script src="<?php echo site_url('public/bootstrap/js/bootstrap.min.js') ; ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo site_url('public/css/main.css'); ?>">

</head>
<body>

<div class="container">
  <div class="row">
    <h2>SYNERGY PREMIER LEAGUE 2016</h2>
        <nav class="navbar navbar-default" role="navigation">
  
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">SPL</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Standing</a></li>
        <li><a href="#">Fixture</a></li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Team <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <?php for($i=0; $i<sizeof($team); $i++) { echo "<li><a href='" . base_url() . "team/". $team[$i]['team_id'] . "'>" . $team[$i]['team_name'] . "</a></li>"; }  ?>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-right" method="post" action="<?php echo site_url('login') ; ?>">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Username" name="username">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Password" name="password">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      
    </div><!-- /.navbar-collapse -->
  
</nav>

  </div>
</div>

<script>
  $(function(){
    $(".dropdown").hover(            
      function() {
          $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
          $(this).toggleClass('open');
          $('b', this).toggleClass("caret caret-up");                
      },
      function() {
          $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
          $(this).toggleClass('open');
          $('b', this).toggleClass("caret caret-up");                
      });
  });
    
</script>
<script>
  $(function(){
    $('form').submit(function (e) {
        e.preventDefault();
        var postData=$(this).serialize();
        var url=$(this).attr('action');
        
        $.ajax({
            url:url,
            type:'POST',
            data:postData,
            success: function(response){
              if(response.status == 1){
                window.location="<?php echo site_url('dashboard') ; ?>";
              }
              else if(response.status == 0){
                alert(response.message);
              }
            }
        });
      });
    });
</script>
</body>
</html>
