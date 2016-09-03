<html>
<head>
<title>SPL</title>

<link rel="stylesheet" type="text/css" href="<?php echo site_url('public/bootstrap/css/bootstrap.min.css') ; ?>">
<script src="<?php echo site_url('public/js/jquery.min.js') ; ?>"></script>
<script src="<?php echo site_url('public/bootstrap/js/bootstrap.min.js') ; ?>"></script>
</head>
<body>
<div class="container">
	<h4>Bidding</h4>

	<form action="<?php echo site_url('bidding/savebid') ; ?>" method="">
		<div class="form-group row">
			<label for="player" class="col-sm-2 col-form-label">Select player</label>
			<div class="col-sm-4">
				<select class="form-control" id="player" required="required" name="player" onchange="getPlayers()">
					<option value="" disabled="disabled" selected="selected">--Select player--</option>
					<?php foreach ($players as $t) {
                      echo "<option value='".$t['player_id']."'>$t[player_name], $t[player_branch], $t[player_year]</option>\n" ;
                    } ?>
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label for="team" class="col-sm-2 col-form-label">Select team</label>
			<div class="col-sm-4">
				<select class="form-control" id="team" required="required" name="team" onchange="getPlayers()">
					<option value="" disabled="disabled" selected="selected">--Select team--</option>
					<?php foreach ($team as $t) {
                      echo "<option value='".$t['team_id']."'>$t[team_name]</option>\n" ;
                    } ?>
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label for="bid" class="col-sm-2 col-form-label">Bidding amount</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="bid" placeholder="Bidding amount" required="required">
			</div>
		</div>
		

		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
	<div>
		<p id="msg" class="alert alert-info" style="display:none"></p>
	</div>

</div>
<script>
	$(function() {
    $('form').submit(function (e) {
        e.preventDefault();
        var postData=$(this).serialize();
        var url=$(this).attr('action');
        
        $.ajax({
            url:url,
            type:'POST',
            data:postData,
            success: function(response){
            	var response = JSON.parse(response);
        		$('#msg').html(response.message);
            	$('#msg').show();
            }
        });
      });
    });
</script>
</body>
</html>
