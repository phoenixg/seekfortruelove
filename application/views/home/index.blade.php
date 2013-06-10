@layout('layouts.default')
@section('page_styles_header')
	{{ HTML::style('css/index.css') }}
@endsection
@section('page_scripts_header')
	{{ HTML::script('js/index.js') }}
@endsection
@section('content')
	<div class="container">
		<div class="hero-unit">
			<!-- 这个部分要修改 -->
			<div class="row">
				<div class="span5">
				<h3>
					定位于上海<br />
					面向所有单身青年男女<br />
					为对抗当今拜金主义价值观而产生的<br />
					免费婚恋交友平台
				</h3>
				<!-- 微博图标
				<wb:follow-button uid="3210798063" type="red_1" width="67" height="24" ></wb:follow-button>
				-->
				<p>
				@if ( !Auth::check() )
					<a class="btn btn-primary btn-large" href="register">免费注册</a>
				@endif
				</p>
				</div>
			
				<div class="heroInfoBox span3 offset1" id="heroInfoBoxStats">
					<h4>当前用户数</h4>
					<span>{{ $count }}</span>
				</div>
				<!--
				<div class="heroInfoBox span3" id="heroInfoBoxShots">
					<img src="{{ URL::base() . '/images/sitepromote/' . '201306-10seekfortruelove-site-promote.jpg' }}" />
				</div>
				-->
			</div>
		</div>

		<div class="row" id="difference">
			<div class="span2 offset1">
				<div>
					<h3><span class="diff_title">1</span> 非营利原则</h3>
					<a href="{{ URL::base() }}/faq#anchor-principle-earn" class="pull-right" target="_blank">了解更多</a>
				</div>
			</div>
			<div class="span2">
				<div>
					<h3><span class="diff_title">2</span> 无广告原则</h3>
					<a href="{{ URL::base() }}/faq#anchor-principle-ads" class="pull-right" target="_blank">了解更多</a>
				</div>
			</div>
			<div class="span2">
				<div>
					<h3><span class="diff_title">3</span> 无差异原则</h3>
					<a href="{{ URL::base() }}/faq#anchor-principle-diff" class="pull-right" target="_blank">了解更多</a>
				</div>
			</div>
			<div class="span2">
				<div>
					<h3><span class="diff_title">4</span> 更强调文字</h3>
					<a href="{{ URL::base() }}/faq#anchor-principle-text" class="pull-right" target="_blank">了解更多</a>
				</div>
			</div>
			<div class="span2">
				<div>
					<h3><span class="diff_title">5</span> 真实性原则</h3>
					<a href="{{ URL::base() }}/faq#anchor-principle-true" class="pull-right" target="_blank">了解更多</a>
				</div>
			</div>
		</div>

		<br />
		<br />
		<!--
		<div class="row">
			<div class="span12" style="text-align: center;">
				<i>[ 公测中 ]</i><br>
				<i>更多期待请加QQ群：287539779</i>
			</div>
		</div>
		-->

	</div>
@endsection
