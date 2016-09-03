<html>
<head>
<title>SPL</title>
<link rel="stylesheet" type="text/css" href="<?php echo site_url('public/bootstrap/css/bootstrap.min.css') ; ?>">
<script src="<?php echo site_url('public/js/jquery.min.js') ; ?>"></script>
<script src="<?php echo site_url('public/bootstrap/js/bootstrap.min.js') ; ?>"></script>
</head>
<body class="container">
Team

<table>
	<tr>
		<th>Player name</th>
		<th>Player branch</th>
		<th>Player year</th>
		<th>Player bid</th>
	</tr>
	<?php for ($i=0; $i < sizeof($players); $i++) { 
		echo "<tr><th>".$players[$i]['player_name']."</th><th>".$players[$i]['player_branch']."</th><th>".$players[$i]['player_year']."</th><th>".$players[$i]['player_bid']."</th></tr>";
	} ?>



</table>

</body>
</html>
