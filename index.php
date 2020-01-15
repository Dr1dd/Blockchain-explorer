<?php
	require 'vendor/autoload.php';
	use Denpa\Bitcoin\Client as BitcoinClient;
	$bitcoind = new BitcoinClient('http://bitcoin:VUISI@91.103.255.169:8332/');
	$blockCount = $bitcoind->getblockchaininfo();
	$blockCount = $blockCount['blocks'];
	$sk = 30;

?>
<!doctype html>
<html lang="lt">
	<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="viewport" content="height=device-height, initial-scale=1">
	    <title>Bitcoin Explorer</title>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	    <link rel="stylesheet" href="css/style.css">
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
		    <div class="navbar-form navbar-left">
		      <div class="input-group" style = "min-width: 44vw">
		      	<input type="text" id ="srchinput" class="form-control" placeholder="Address, Transaction, Block height">
			    <div class="input-group-btn">
			      <button class="btn btn-default" id ="srchbtn" style = "padding: 6.2px 12px;"> 
			        <i class="glyphicon glyphicon-search"></i>
			      </button>
			    </div>
			  </div>
		    </div>
		  </div>
		</nav>
		<div class ="container">
			<div class = "row">
				<div class = "col-sm-2">

			    </div>
				<div class = "col-sm-8">
						<div class ="row margintop">
							<div class = "col-sm-2">
								<div class ="blocktext paddingleft">  Height </div>
							</div>
							<div class = "col-sm-8"> 
								<div class ="blocktext paddingleft">  Hash </div> 
							</div>
							<div class = "col-sm-2 nopadding">
								<div class ="blocktext paddingleft">  Mined </div>
							</div>
						</div>
					<div class ="blockchainList">
					<?php
						for($i = intval($blockCount); $i > intval($blockCount)-$sk; $i--){
							$blocktime =$bitcoind->getBlockHash($i); 
							$blocktime =$bitcoind->getBlock(strval($blocktime)); 
							$timesec = time() - $blocktime['time'];
							if($timesec/60/60 %60 !=0) $time = $timesec/60/60%60 . " h";
							else $time = $timesec/60%60 . " min";
							
							echo "<div class = 'row bottomBorder textPadding'>";
								echo "<div class = 'col-sm-2'>";
									echo "<div class ='blocktext'> <a class ='aBloc'> ".$i." </a></div>";
								echo "</div>";
								echo "<div class = 'col-sm-8'>";
									echo "<div class ='blocktext'> <a class ='aBloc'>".$bitcoind->getBlockHash($i)." </a></div>";
								echo "</div>";
								echo "<div class = 'col-sm-2'>";
									echo "<div class ='blocktext'> ".$time." </div>";
								echo "</div>";
							echo "</div>";
						}

					 ?>
					</div>

				</div>
				<div class = "col-sm-2">
					
			    </div>
			</div>
		</div>
	</div>

</body>