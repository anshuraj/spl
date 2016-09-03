<html>
<head>
<title>SPL</title>

<link rel="stylesheet" type="text/css" href="<?php echo site_url('public/bootstrap/css/bootstrap.min.css') ; ?>">
<script src="<?php echo site_url('public/js/jquery.min.js') ; ?>"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<h4>Team registration</h4>

	<form action="<?php echo site_url('regteam/save') ; ?>" method="">
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">Team name</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="name" placeholder="Team Name" required="required">
			</div>
		</div>
		<div class="form-group row">
			<label for="owner" class="col-sm-2 col-form-label">Team owner</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="owner" placeholder="Team Owner" required="required">
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
