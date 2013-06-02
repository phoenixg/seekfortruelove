$(document).ready(function() {
// 同意照片查看请求
$('#requestPersonImages button.agreePersonImagesRequest').click(function(){
	var imgSrc = $(this).parent().prev().children('img').attr('src');
	var userId = parseUserId(imgSrc);
	
	$.ajax({
		url: BASE + "/dashboard/messagegalleryauthhandle",
		data: {
			"choice" : 'accepted',
			"userid" : userId
		},
		type:"POST",
		dataType:"JSON",
		context: this,
		success: function(re) {
			//console.log(re);
			if (re.success == true) {
				$(this).closest('table').fadeOut(300);
				alertify.success(re.msg);
			} else if (re.success == false){				
				alertify.success(re.msg);
			}
		},
		error: function(re) {
			//console.log(re);
		}
	});
}).hover(function(){
	$(this).css( "color", "#ddd" );
}, function(){
	$(this).css( "color", "#fff" );
});

// 忽略照片查看请求
$('#requestPersonImages button.ignorePersonImagesRequest').click(function(){
	var imgSrc = $(this).parent().parent().prev().find('img').attr('src');
	var userId = parseUserId(imgSrc);
	
	$.ajax({
		url: BASE + "/dashboard/messagegalleryauthhandle",
		data: {
			"choice" : 'ignored',
			"userid" : userId
		},
		type:"POST",
		dataType:"JSON",
		context: this,
		success: function(re) {
			//console.log(re);
			if (re.success == true) {
				$(this).closest('table').fadeOut(300);
				alertify.success(re.msg);
			} else if (re.success == false){				
				alertify.success(re.msg);
			}
		},
		error: function(re) {
			//console.log(re);
		}
	});

}).hover(function(){
	$(this).css( "color", "#ddd" );
}, function(){
	$(this).css( "color", "#fff" );
});

function parseUserId(imgSrc){
	return imgSrc.substring(imgSrc.lastIndexOf('/')+1, imgSrc.lastIndexOf('.'));
}

});
