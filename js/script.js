$(function(){
	$("#srchbtn").on("click", function(){
		console.log($("#srchinput").val().length);
		if($("#srchinput").val().length != 0){
			if($("#srchinput").val().length == 64){
				console.log("Hello");
				if(location.pathname.substring(0,19) == "/blockchain/src/php") location.replace("block.php?id="+$("#srchinput").val()+"");
				else location.replace("src/php/block.php?id="+$("#srchinput").val()+"");
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
