$(function(){
	$("#srchbtn").on("click", function(){
		if($("#srchinput").val().length != 0){
			if($("#srchinput").val().length == 64){
				console.log($("#srchinput").val().substring(0,5));
				if($("#srchinput").val().substring(0,5) != "00000"){
					console.log(location.pathname.substring(0,19));
					if(location.pathname.substring(0,19) == "/blockchain/src/php") location.replace("transaction.php?id="+$("#srchinput").val()+"");
					else location.replace("src/php/transaction.php?id="+$("#srchinput").val()+"");
				}
				else{		
					if(location.pathname.substring(0,19) == "/blockchain/src/php") location.replace("block.php?id="+$("#srchinput").val()+"");
					else location.replace("src/php/block.php?id="+$("#srchinput").val()+"");
				}
			}
			else {
				if(location.pathname.substring(0,19) == "/blockchain/src/php") location.replace("block.php?id="+$("#srchinput").val()+"");
				else location.replace("src/php/block.php?id="+$("#srchinput").val()+"");
			}
		}
	});

	$(".aBloc").on("click", function(){
		 location.replace("src/php/block.php?id="+$(this).text()+"");
	});
});
