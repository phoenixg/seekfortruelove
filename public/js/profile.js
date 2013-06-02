$(document).ready(function(){
	// 初始化swipebox照片预览插件
	$(".swipebox").swipebox({
		useCSS : true,
		hideBarsDelay : 3000
	});

	// 照片
	$('#photos').hide();

	var photosToggleText = $('#photosToggle').text();
	$('#photosToggle').toggle(function(){
		$(this).text('隐藏彩色照片');
		$('#photos').slideDown(300);
	},function(){
		$(this).text(photosToggleText);
		$('#photos').slideUp(300);
	});

	// 请求彩色照片查看权
	$('#photoRequest').click(function(){
		var userId = $('#userId').val();
		$.ajax({
			url: BASE + "/galleryauth/" + userId,
			data: {},
			type:"GET",
			dataType:"JSON",
			success: function(re){
				if (re.success == false) {
					alertify.error(re.msg);
				} else if (re.success == true) {
					alertify.success(re.msg);
					$('#photoRequest').fadeOut(1000);
				};
			},
			error:function(re) {
				//console.log(re);
			}
		});
	});

});
