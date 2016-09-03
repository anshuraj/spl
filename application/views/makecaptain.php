<html>
<head>
<title>SPL</title>

<link rel="stylesheet" type="text/css" href="<?php echo site_url('public/bootstrap/css/bootstrap.min.css') ; ?>">
<script src="<?php echo site_url('public/js/jquery.min.js') ; ?>"></script>
<script src="<?php echo site_url('public/bootstrap/js/bootstrap.min.js') ; ?>"></script>
</head>
<body>
<div class="container">
	<h4>Captain selection</h4>

	<form action="<?php echo site_url('makecaptain/savecaptain') ; ?>" method="">
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
			<label for="year" class="col-sm-2 col-form-label">Select a captain</label>
			<div class="col-sm-4">
				<select class="form-control" id="list" required="required" name="list">
					<option value="" disabled="disabled" selected="selected">--Select captain--</option>
					
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
	function getPlayers(){
		$id = $('#team').val();

		$.get("<?php echo site_url('makecaptain/getplayer/'); ?>"+$id, function(data, status){
	        alert("Data: " + data + "\nStatus: " + status);
	        $a = JSON.parse(data);
			console.log($a[0]);
			console.log($a[0]['player_name']);

	        for (var $i = 0; $i < $a.length; $i++ ) {
			     $('#list').append("<option value='"+$a[$i]['player_id']+"'>"+ $a[$i]['player_name'] +"</option>");
			}

	    });
	}

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
