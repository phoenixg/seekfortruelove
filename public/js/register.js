$(document).ready(function() {
	//出生日期的表单内容年份原始数据
	for (i = 1995; i > 1969; i--) {
		$('#born').append($('<option />').val(i).html(i));
	}

    //验证码
    $('#captcha .verse').click(function(){
        $(this).addClass('choosen').parent().find('.verse').css({'background-color':'#eee','color': '#555'});
        $(this).css({'background-color':'#028D79','color': '#eee'}).siblings().removeClass('choosen');

        //if($(this).hasClass('correct'));
    });

    // TODO
    $("input[type=submit]").click(function(){
        var a = $('#captcha .verse').parent().find('.correct');
        console.log(a);
        return false;
    });



});
