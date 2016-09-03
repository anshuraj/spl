<html>
<head>
<title>SPL</title>
</head>
<link rel="stylesheet" type="text/css" href="<?php echo site_url('public/bootstrap/css/bootstrap.min.css') ; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo site_url('public/css/auction.css') ; ?>">

<script src="<?php echo site_url('public/js/jquery.min.js') ; ?>"></script>
<script src="<?php echo site_url('public/bootstrap/js/bootstrap.min.js') ; ?>"></script>
<body>
<h1>Player</h1>

<ul class="pager">
 <li class="previous"><a onclick="Prev()" id="prev_button">Previous</a></li>
 <li class="next"><a onclick="Next()" id="next_button">Next</a></li>
 </ul>

 <!-- <ul id="list">
 	
 </ul> -->

<div id="output"></div>
<div id="branch"></div>
<div id="year"></div>




<script>
		
Current = 0;
		$.get("<?php echo site_url('auction/list'); ?>", function(data, status){

			sav = data;
			document.getElementById("output").innerHTML = sav[Current]['player_name'];
			document.getElementById("branch").innerHTML = sav[Current]['player_branch'];
			document.getElementById("year").innerHTML = sav[Current]['player_year'];

 });

function Prev(){
    if(Current == 0)
        Current = sav.length - 1;
    else
        Current--;

    document.getElementById("output").innerHTML = sav[Current]['player_name'];
    document.getElementById("branch").innerHTML = sav[Current]['player_branch'];
	document.getElementById("year").innerHTML = sav[Current]['player_year'];
}

function Next(){
    if(Current == sav.length - 1)
        Current = 0
    else
        Current++;

    document.getElementById("output").innerHTML = sav[Current]['player_name'];
    document.getElementById("branch").innerHTML = sav[Current]['player_branch'];
	document.getElementById("year").innerHTML = sav[Current]['player_year'];
}
	
</script>
</body>
</html>
