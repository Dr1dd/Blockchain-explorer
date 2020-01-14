$(function(){
	$("#srchbtn").on("click", function(){
		console.log($("#srchinput").val().length);
		if($("#srchinput").val().length != 0){
			if($("#srchinput").val().length == 64){
				console.log("Hello");
				window.open("src/php/block.php?id="+$("#srchinput").val()+"");
			}
			//else if ($("#srchinput").val().length < 8)
		}
	});

});