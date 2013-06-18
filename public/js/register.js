$(document).ready(function() {
    //出生日期的表单内容年份原始数据
    for (i = 1995; i > 1969; i--) {
        $('#born').append($('<option />').val(i).html(i));
    }

    //验证码
    $('#captcha .verse').click(function(){
        $(this).addClass('choosen').parent().find('.verse').css({'background-color':'#eee','color': '#555'});
        $(this).css({'background-color':'#028D79','color': '#eee'}).siblings().removeClass('choosen');

        if($(this).hasClass('correct')) {
            $("input[type=submit]").removeAttr('disabled').attr('value', '选择正确 提交注册信息');
        } else {
            $("input[type=submit]").attr('disabled','disabled').attr('value', '请选择正确的出处');
        }
    });

    $("input[type=submit]").
        attr('value', '请选择正确的出处').
        attr('disabled','disabled').
        click(function(){
        });



});
