$(document).ready(function() {
	$('.footer').show();

	// 原则自动变色
	var colorScheme = [['#ff4040', '#ff7373', '#ff0000', '#bf3030', '#a60000'],
					   ['#ffb240', '#ffc773', '#ff9900', '#bf8630', '#a66300'],
					   ['#37da7e', '#62da97', '#00b64f', '#22884f', '#007633'],
					   ['#3476cd', '#5dc8cd', '#01939a', '#1d7074', '#006064'],
					   ['#4671d5', '#6c8cd5', '#1240ab', '#2a4480', '#06266f'],
					   ['#9f3ed5', '#ad66d5', '#7109aa', '#5f2580', '#48036f'],
					   ['#d60062', '#4312ae', '#154f55', '#d42b28', '#6c43ce']];
	console.log(colorScheme);
	var changeColor = window.setInterval(function (){  
	    $('#difference > .span2:nth-child(1)').hide();


	}, 1000);  


});
