<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<title>SEEK FOR TRUELOVE -- 定位于上海面向所有单身青年男女为对抗当今拜金主义价值观而产生的免费婚恋交友平台</title>

	<!-- favicon -->
	<link id="favicon" href="favicon.ico" rel="icon" type="image/x-icon" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- sina weibo -->
	<html xmlns:wb="http://open.weibo.com/wb">

	{{ Asset::styles() }}
	@yield('page_styles_header')

	{{ Asset::scripts() }}
	@yield('page_scripts_header')

	<script type="text/javascript">
		var BASE = "<?php echo URL::base(); ?>";
	</script>

	<!-- sina weibo
	<script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
	-->
</head>
<body>
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="alert" id="browser-promote" style="display:none;">
			        <button data-dismiss="alert" class="close" type="button">×</button>
			        <span>
			        	您的IE浏览器版本过低，可能影响正常使用本站，建议使用更加优秀的&nbsp;
						<a href="http://www.google.com.hk/chrome/intl/zh-CN/landing_chrome.html" target="_blank">Chrome</a>,&nbsp;
						<a href="http://firefox.com.cn/download/" target="_blank">Firefox</a>,&nbsp;
						<a href="http://www.apple.com.cn/safari/" target="_blank">Safari</a>&nbsp;等浏览器浏览本站
			        </span>
			</div>

			<div class="container">
				{{ HTML::link_to_route('home', 'Seek For Truelove', array() , array('class' => 'brand')) }}

				<div class="nav-collapse">
					<ul class="nav">
						<li>{{ HTML::link_to_route('home', '首页') }}</li>
						<li>{{ HTML::link_to_route('search', '搜索') }}</li>
						<li>{{ HTML::link_to_route('documents', '帮助') }}</li>
						<!--
						<li><a href="#">关于我们</a></li>
						-->
					</ul>
				</div>

				<div class="nav-collapse pull-right">
					<ul class="nav pull-right">
						@if(Auth::check())
							<li><a href="#">欢迎回来！ {{ Auth::user()->nickname }}</a></li>
							<li class="divider-vertical"></li>
							<li class="dropdown">
								<a data-toggle="dropdown" class="dropdown-toggle" href="#">管理 <b class="caret"></b></a>
								<ul class="dropdown-menu">
								<li>{{ HTML::link_to_route('dashboard', '控制面板') }}</li>

								<!--<li><a href="#">其他</a></li>-->

								<li class="divider"></li>
								<!--<li class="nav-header">标题</li>-->
								<li>{{ HTML::link_to_route('logout', '注销') }}</li>
								</ul>
							</li>
						@else
							<li>{{ HTML::link_to_route('login', '登录') }}</li>
						@endif
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div id="main">
		@yield('content')
	</div>


	<div class="container footer">
		<footer>
			<span>Copyright © 2013 PHX&nbsp;
				<a href="mailto:&#104;&#101;&#114;&#101;&#115;&#121;&#115;&#101;&#101;&#107;&#101;&#114;&#64;&#103;&#109;&#97;&#105;&#108;&#46;&#99;&#111;&#109;">&#104;&#101;&#114;&#101;&#115;&#121;&#115;&#101;&#101;&#107;&#101;&#114;&#64;&#103;&#109;&#97;&#105;&#108;&#46;&#99;&#111;&#109;</a>
			</span>

			<!-- 浏览器图标
			<table id="browser-icons">
			<tr>
				<td class="browser-icon-chrome"></td>
				<td class="browser-icon-firefox"></td>
				<td class="browser-icon-opera"></td>
				<td class="browser-icon-safari"></td>
				<td class="browser-icon-ie"></td>
			</tr>
			</table>
			-->
		</footer>
	</div>


	@yield('page_scripts_footer')

	<!-- CNZZ STATS -->
	<div style="display:none;visibility:hidden;">
		<script src="http://s13.cnzz.com/stat.php?id=4858222&web_id=4858222" language="JavaScript"></script>
	</div>
</body>
</html>
