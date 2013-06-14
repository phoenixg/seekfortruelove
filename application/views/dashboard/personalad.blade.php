@layout('layouts.dashboard')
@section('page_styles_header')
	{{ HTML::style('js/alertify.js-0.3.9/themes/alertify.core.css') }}
	{{ HTML::style('js/alertify.js-0.3.9/themes/alertify.default.css') }}
	{{ HTML::style('css/dashboard.personalad.css') }}
@endsection
@section('page_scripts_header')
    {{ HTML::script('js/raphael-min.js') }}
    {{ HTML::script('js/livicons.for.personalad.js') }}
    <!--[if lt IE 8]>
    {{ HTML::script('js/json2.min.js') }}
    <![endif]-->
	{{ HTML::script('js/ckeditor/ckeditor.js') }}
@endsection
@section('page_scripts_footer')
	{{ HTML::script('js/alertify.js-0.3.9/lib/alertify.min.js') }}
	{{ HTML::script('js/dashboard.personalad.js') }}
@endsection
@section('main')
	<h2>征婚启事</h2>
	<hr />
	<p>
		<input type="button" class="btn-primary" value="预览" id="editorToggle">
		<input type="submit" class="btn-primary" value="保存" id="editorSubmit">
	</p>
	<!-- This div will hold the editor. -->
	<div id="editor"></div>
	<div id="contents" style="display: none">
		<!-- This div will be used to display the editor contents. -->
		<div id="editorcontents"></div>
	</div>

	<hr />

	<p>请用礼貌的态度和合宜的言辞展现你自己，征婚启事的内容可以包含但不仅限于：
		<ul>
			<li>个人基本信息</li>
			<li>个人经历</li>
			<li>联系方式</li>
			<li>兴趣爱好</li>
			<li>择偶标准</li>
			<li>理想中的婚姻生活</li>
			<li>对子女教育的看法</li>
			<li>对物质条件的看法</li>
			<li>...</li>
		</ul>
		尽情发挥你的才智吧！
	</p>
	
	<p>这里推荐几篇征婚启事作为参考，或许可以帮助你寻找灵感：</p>



	<blockquote>
		<span class="livicon" data-n="quote-left" data-s="32" data-c="original" data-hc="#000" data-a="1" data-l="0" data-i="3" data-d="0" data-et="hover" data-op="0"></span>
		<p>
		我，单身，无神论者，白人，52岁，据说比较聪明，对于政治、科学、音乐和舞蹈有着不同寻常的兴趣。
		</p>
		<p>
		我想寻找这样一位女士：爱好广泛，对世界充满好奇心，能够清晰表达她的爱憎（我痛恨动脑筋猜测），乐于使男人着迷，渴望被温柔地爱，对于快乐、真理、美和正义的评价高于"成功"。这样的话，我们就能不断对另一方产生热烈而又美好的了解，当我们被生活中其他东西吸引的时候，彼此就能感到宽容的温暖。
		</p>
		<p>
		我有一个22岁的孩子----自由软件运动----他占据了我大部分的生活，没有精力再抚养更多的孩子了，但是我仍然会投入的爱我的爱人。我有大量时间花在巡回演讲上，经常要去欧洲、亚洲和拉丁美洲。如果你有空在某些时间陪我一起旅行，那就最好了。
		</p>
		<p>
		如果你有兴趣的话，请写信到rms@stallman.org，让我们看看会有什么结果。
		</p>
		<p class="blockquoteAuthor">
		by Richard Stallman
		</p>
	</blockquote>
@endsection
