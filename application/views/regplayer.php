<html>
<head>
<title>SPL</title>

<link rel="stylesheet" type="text/css" href="<?php echo site_url('public/bootstrap/css/bootstrap.min.css') ; ?>">
<script src="<?php echo site_url('public/js/jquery.min.js') ; ?>"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<h4>Players registration</h4>

	<form action="<?php echo site_url('regplayer/save') ; ?>" method="">
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">Player name</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="name" placeholder="name" required="required">
			</div>
		</div>
		<div class="form-group row">
			<label for="branch" class="col-sm-2 col-form-label">Branch</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="branch" placeholder="branch" required="required">
			</div>
		</div>
		<div class="form-group row">
			<label for="year" class="col-sm-2 col-form-label">Select year</label>
			<div class="col-sm-4">
				<select class="form-control" id="year" required="required" name="year">
					<option value="" disabled="disabled" selected="selected">--Select year--</option>
					<option value="1">1st year</option>
					<option value="2">2nd year</option>
					<option value="3">3rd year</option>
					<option value="4">4th year</option>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="player_type" class="col-sm-2 col-form-label">Select player type</label>
			<div class="col-sm-4">
				<select class="form-control" id="player_type" required="required" name="player_type">
					<option value="" disabled="disabled" selected="selected">--Select player type--</option>
					<option value="Allrounder">Allrounder</option>
					<option value="Batsmen">Batsmen</option>
					<option value="Bowler">Bowler</option>
				</select>
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
	<div>
		<p id="msg" class="alert alert-info" style="display:none"></p>
	</div>

</div>
<script>
	$(function(){
    $('form').submit(function (e) {
    	$('#msg').fadeOut();
        e.preventDefault();
        var postData=$(this).serialize();
        var url=$(this).attr('action');
        
        $.ajax({
            url:url,
            type:'POST',
            data:postData,
            success: function(response){
        		$('#msg').html(response.message);
        		$('#msg').fadeIn();
            	
            }
        });
      });
    });
</script>
</body>
</html>
