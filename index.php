<?php
	require 'vendor/autoload.php';
?>
<!doctype html>
<html lang="lt">
	<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="viewport" content="height=device-height, initial-scale=1">
	    <link rel="stylesheet" href="css/style.css">
	    <title>Table generator</title>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	    <script src="js/script.js"> </script>
	</head>
<body>
	<div class = "main"> 
		<nav class="navbar navbar-inverse navbar-fixed-top">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="#">Blockchain</a>
		    </div>
		    <form class="navbar-form navbar-left" action = "">
		      <div class="input-group" style = "min-width: 44vw">
		      	<input type="text" id ="srchinput" class="form-control" placeholder="Address, Transaction, Block height">
			    <div class="input-group-btn">
			      <button class="btn btn-default" id ="srchbtn" type="submit" style = "padding: 6.2px 12px;"> 
			        <i class="glyphicon glyphicon-search"></i>
			      </button>
			    </div>
			  </div>
		    </form>
		  </div>
		</nav>
		<div class ="container-fluid">
			<div class = "row">
				<div class = "col-l-4">

			    </div>
				<div class = "col-l-8"> </div>
			</div>
		</div>
	</div>

</body>