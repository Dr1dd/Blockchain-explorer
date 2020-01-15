<?php
	require '../../vendor/autoload.php';
	use Denpa\Bitcoin\Client as BitcoinClient;
	$bitcoind = new BitcoinClient('http://bitcoin:VUISI@91.103.255.169:8332/');
	if (isset($_GET["id"])) {
		$block = $_GET["id"];
		if(strlen($block) ==64) {
			try{
				$blockinfo = $bitcoind->getBlock(strval($block));
			}
			catch(Exception $e){
				header('location:error.php');
			}
		}
		else {
			$blockHash = $bitcoind->getBlockHash(intval($block));
			$blockinfo = $bitcoind->getBlock(strval($blockHash));
			if(!isset($blockinfo)) header('location:error.php');
	  	  }
	}

	function calculateTxCount($block){
		$sum = $block->count('tx');
		return $sum;
	}
	// function calculateFees($bitcoind, $block){
	// 	$count =0;
	// 	$sumIn = 0;
	// 	$sumOut =0;
	// 	foreach ($block['tx'] as $tx) {
	// 	 	$transactionraw = $bitcoind->getrawtransaction(strval($tx));
	// 	 	$transaction = $bitcoind->decoderawtransaction(strval($transactionraw));
	// 		$vin = $transaction['vin'];
	// 	 	if(isset($vin['txid'])){
	// 			echo $transaction;
	// 		    $txid = $vin['txid'];
	// 			$innerTransactionRaw = $bitcoind->getrawtransaction(strval($txid));
	// 			$innerTransaction = $bitcoind->decoderawtransaction(strval($innerTransactionRaw));

	// 			$vin_vout = $transaction['vout'];
	// 			foreach ($vin_vout as $out) {
	// 				if($out['n'] == $vin_vout) $sumIn+=$out['value'];
	// 			}
	// 			$vout = $transaction['vout'];
	// 			foreach ($vout as $output){
	// 				$sumOut = $output['value'];
	// 			}
	// 		}
	// 		if($count >100) break;
	// 		$count += 1;
	// 	 }
	// 	$tx_fee = $sumIn - $sumOut;
	// 	return $tx_fee;
	// }

?>
<!doctype html>
<html lang="lt">
	<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="viewport" content="height=device-height, initial-scale=1">
	    <link rel="stylesheet" href="../../css/style.css">
	    <title>Table generator</title>
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
			      <button class="btn btn-default" id ="srchbtn" type="submit">
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
					<div class = "row bottomBorder textPadding">
						<div class = "col-sm-3">
							<div class ="blocktext">  Hash </div>
						</div>
						<div class = "col-sm-9">
							<div class ="blocktext">  <?php if(isset($blockHash)) echo $blockHash; else echo $block?> </div>
						</div>
					</div>
					<div class = "row bottomBorder textPadding">
						<div class = "col-sm-3">
							<div class ="blocktext">  Height </div>
						</div>
						<div class = "col-sm-9"> 
							<div class ="blocktext">  <?=$blockinfo['height']?> </div> 
						</div>
					</div>
					<div class = "row bottomBorder textPadding">
						<div class = "col-sm-3">
							<div class ="blocktext">  Time </div>
						</div>
						<div class = "col-sm-9"> 
							<div class ="blocktext">  <?= date("Y-m-d\ H:i:s\ ", $blockinfo['time']);?> </div> 
						</div>
					</div>
					<div class = "row bottomBorder textPadding">
						<div class = "col-sm-3">
							<div class ="blocktext">  Difficulty </div>
						</div>
						<div class = "col-sm-9"> 
							<div class ="blocktext">  <?=number_format($blockinfo['difficulty'], 2, '.', ',');?> </div> 
						</div>
					</div>
					<div class = "row bottomBorder textPadding">
						<div class = "col-sm-3">
							<div class ="blocktext">  Merkle Root </div>
						</div>
						<div class = "col-sm-9"> 
							<div class ="blocktext">  <?=$blockinfo['merkleroot']?> </div> 
						</div>
					</div>
					<div class = "row bottomBorder textPadding">
						<div class = "col-sm-3">
							<div class ="blocktext">  Version </div>
						</div>
						<div class = "col-sm-9"> 
							<div class ="blocktext">  <?php echo "0x".dechex($blockinfo['version'])?> </div> 
						</div>
					</div>
					<div class = "row bottomBorder textPadding">
						<div class = "col-sm-3">
							<div class ="blocktext">  Bits </div>
						</div>
						<div class = "col-sm-9"> 
							<div class ="blocktext">  <?=hexdec($blockinfo['bits'])?> </div> 
						</div>
					</div>
					<div class = "row bottomBorder textPadding">
						<div class = "col-sm-3">
							<div class ="blocktext">  Nonce </div>
						</div>
						<div class = "col-sm-9"> 
							<div class ="blocktext">  <?=number_format($blockinfo['nonce'])?> </div> 
						</div>
					</div>
					<div class = "row bottomBorder textPadding">
						<div class = "col-sm-3">
							<div class ="blocktext">  Size </div>
						</div>
						<div class = "col-sm-9"> 
							<div class ="blocktext">  <?php echo number_format($blockinfo['size'])." bytes"?> </div> 
						</div>
					</div>
					<div class = "row bottomBorder textPadding">
						<div class = "col-sm-3">
							<div class ="blocktext">  Weight </div>
						</div>
						<div class = "col-sm-9"> 
							<div class ="blocktext">  <?php echo number_format($blockinfo['weight'])." bytes"?> </div> 
						</div>
					</div>
					<div class = "row bottomBorder textPadding">
						<div class = "col-sm-3">
							<div class ="blocktext">  Transaction count </div>
						</div>
						<div class = "col-sm-9"> 
							<div class ="blocktext">  <?php echo calculateTxCount($blockinfo) ?> </div> 
						</div>
					</div>
				</div>

				<div class = "col-sm-2">
			

				 </div>
			</div>
		</div>
	</div>

</body>