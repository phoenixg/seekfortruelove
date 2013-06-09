$(document).ready(function() {
    // 隐藏footer
    $('.footer').show();

    // 对IE版本进行检测
    if($.browser.msie != undefined){
        $('#browser-promote').show();
    };

    // 几大原则自动变色
    // 暂时不用
    /*
    var colorScheme = [['#ff4040', '#ff7373', '#ff0000', '#bf3030', '#a60000'],
                       ['#ffb240', '#ffc773', '#ff9900', '#bf8630', '#a66300'],
                       ['#37da7e', '#62da97', '#00b64f', '#22884f', '#007633'],
                       ['#3476cd', '#5dc8cd', '#01939a', '#1d7074', '#006064'],
                       ['#4671d5', '#6c8cd5', '#1240ab', '#2a4480', '#06266f']];

    var changeColor = window.setInterval(function (){
        // 生成随机数(0-4), 即上面的一维数组数
        var randomIndex = Math.floor(Math.random() * (4 - 0 + 1)) + 0;

        for (var i = 0; i < 5; i++) {
            $('#difference > .span2:nth-child('+(i+1)+')')
                .css('background-color', colorScheme[randomIndex][i]);
        };

    }, 10000);
    */

});
