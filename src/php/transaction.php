<?php
	require '../../vendor/autoload.php';
	use Denpa\Bitcoin\Client as BitcoinClient;
	$bitcoind = new BitcoinClient('http://bitcoin:VUISI@91.103.255.169:8332/');
	if (isset($_GET["id"])) {
		$tx = $_GET["id"];
		if(strlen($tx) ==64) {
			try{
				$txinfo = $bitcoind->getrawtransaction(strval($tx));
				$txinfo = $bitcoind->decoderawtransaction(strval($txinfo));
				#echo $txinfo;

			}
			catch(Exception $e){
				header('location:error.php');
			}
		}
	}
	function totalInput($bitcoind, $txinfo){
		$vin = $txinfo['vin'];
		$sumvalue = 0;
		foreach ($vin as $value) {
			$tx = $bitcoind->getrawtransaction(strval($value['txid']));
			$txdecoded = $bitcoind->decoderawtransaction(strval($tx));
			$txnewvout = $txdecoded['vout'];
			foreach ($txnewvout as $key) {
				if($value['vout'] == $key['n'])  $sumvalue += $key['value'];
			}
		}
		return $sumvalue;
	}
	function totalOutput($bitcoind, $txinfo){
		$vout = $txinfo['vout'];
		$sumOut = 0;
		foreach ($vout as $value){
			$sumOut += $value['value'];
		}
		return $sumOut;
	}


?>
<!doctype html>
<html lang="lt">
	<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="viewport" content="height=device-height, initial-scale=1">
	    <link rel="stylesheet" href="../../css/style.css">
	    <title>Bitcoin Explorer</title>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	    <script src="../../js/script.js"> </script>
	</head>
<body>
	<div class = "main"> 
		<nav class="navbar navbar-inverse navbar-fixed-top">
		  <div class="container-fluid ">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="../../index.php">Blockchain</a>
		    </div>
		    <div class="navbar-form navbar-left">
		      <div class="input-group" style = "min-width: 44vw">
			    <input type="text" id ="srchinput" class="form-control search" placeholder="Address, Transaction, Block height">
			    <div class="input-group-btn">
			      <button class="btn btn-default" id ="srchbtn" type="submit" style = "padding: 6.2px 12px;">
			        <i class="glyphicon glyphicon-search"></i>
			      </button>
			    </div>
			  </div>
		    </div>
		  </div>
		</nav>
		<div class ="container outputText" >
			<div class = "row">
				<div class = "col-sm-2">
					
				 </div>

				<div class = "col-sm-8">
					<div class ="row">
							<div class = "col-sm-4">
								<div class ="blocktext paddingleft outputHeader">  Transaction </div>
							</div>
					</div>
					<div class = "row bottomBorder textPadding">
						<div class = "col-sm-3">
							<div class ="blocktext">  Hash </div>
						</div>
						<div class = "col-sm-9">
							<div class ="blocktext">  <?php echo $txinfo['txid'] ?></div>
						</div>
					</div>
					<div class = "row bottomBorder textPadding">
						<div class = "col-sm-3">
							<div class ="blocktext">  Size </div>
						</div>
						<div class = "col-sm-9"> 
							<div class ="blocktext">  <?=$txinfo['size']?> Bytes </div> 
						</div>
					</div>
					<div class = "row bottomBorder textPadding">
						<div class = "col-sm-3">
							<div class ="blocktext">  Weight </div>
						</div>
						<div class = "col-sm-9"> 
							<div class ="blocktext">  <?= $txinfo['weight']?> </div> 
						</div>
					</div>
					<div class = "row bottomBorder textPadding">
						<div class = "col-sm-3">
							<div class ="blocktext">  Total Input </div>
						</div>
						<div class = "col-sm-9"> 
							<div class ="blocktext">  <?php echo totalInput($bitcoind, $txinfo)?> BTC </div> 
						</div>
					</div>
					<div class = "row bottomBorder textPadding">
						<div class = "col-sm-3">
							<div class ="blocktext">  Total Output </div>
						</div>
						<div class = "col-sm-9"> 
							<div class ="blocktext">  <?php echo totalOutput($bitcoind, $txinfo)?> BTC </div> 
						</div>
					</div>
					<div class = "row bottomBorder textPadding">
						<div class = "col-sm-3">
							<div class ="blocktext">  Fees </div>
						</div>
						<div class = "col-sm-9"> 
							<div class ="blocktext">  <?php echo totalInput($bitcoind, $txinfo)-totalOutput($bitcoind, $txinfo)?> BTC </div> 
						</div>
					</div>

					
				</div>

				<div class = "col-sm-2">
			

				 </div>
			</div>
		</div>
	</div>

</body>