@layout('layouts.documents')
@section('page_styles_header')
    {{ HTML::style('css/roadmap.css') }}
@endsection
@section('page_scripts_header')
    {{ HTML::script('js/raphael-min.js') }}
    {{ HTML::script('js/livicons.for.documents.js') }}
    <!--[if lt IE 8]>
    {{ HTML::script('js/json2.min.js') }}
    <![endif]-->
@endsection
@section('main')
<h1>路线图</h1>

<hr />

<div id="roadmap">
    <ul>
        <li>2013年6月中旬： 完成个人页面留言功能的开发</li>
        <li>2013年6月： 有待补充的其他功能</li>
        <li>2013年7月： 完成地图功能的初步开发</li>
    </ul>

    <p>如您有任何问题或提议，可以发邮件至：
    <a href="mailto:&#104;&#101;&#114;&#101;&#115;&#121;&#115;&#101;&#101;&#107;&#101;&#114;&#64;&#103;&#109;&#97;&#105;&#108;&#46;&#99;&#111;&#109;">&#104;&#101;&#114;&#101;&#115;&#121;&#115;&#101;&#101;&#107;&#101;&#114;&#64;&#103;&#109;&#97;&#105;&#108;&#46;&#99;&#111;&#109;</a>
    </p>
</div>
@endsection
