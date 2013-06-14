@layout('layouts.documents')
@section('page_styles_header')
    {{ HTML::style('css/help.css') }}
@endsection
@section('page_scripts_header')
    {{ HTML::script('js/raphael-min.js') }}
    {{ HTML::script('js/livicons.for.documents.js') }}
    <!--[if lt IE 8]>
    {{ HTML::script('js/json2.min.js') }}
    <![endif]-->
@endsection
@section('main')
<h1>使用帮助</h1>

<hr />

<div id="help">
    <h4><a name="anchor-imageuploadfail">为什么上传照片失败？</a></h4>
    <p>请确保上传的照片格式是JPG, PNG或GIF格式，大小在100K以内。</p>

    <h4><a name="anchor-howresizeimage">照片大于100K，怎样压缩？</a></h4>
    <p>可以点此下载&nbsp;<a href="http://url.cn/GN5OXR"
        class="btn btn-mini" rel="sidebar" title="图片压缩工具" target="_blank">图片压缩工具</a>&nbsp;，使用方法见图：</p>

    <table>
        <tr><td><img src="{{ URL::base() . '/images/help/' . 'howresize1.jpg' }}" alt="" width="450px"></td>
            <td><img src="{{ URL::base() . '/images/help/' . 'howresize2.jpg' }}" alt="" width="450px"></td></tr>
        <tr><td><img src="{{ URL::base() . '/images/help/' . 'howresize3.jpg' }}" alt="" width="450px"></td>
            <td><img src="{{ URL::base() . '/images/help/' . 'howresize4.jpg' }}" alt="" width="450px"></td></tr>
    </table>

    <h4><a name="anchor-morehelp">这些问题都帮不上，我有其他的问题怎么办？</a></h4>
    <p>可以发邮件至：
    <a href="mailto:&#104;&#101;&#114;&#101;&#115;&#121;&#115;&#101;&#101;&#107;&#101;&#114;&#64;&#103;&#109;&#97;&#105;&#108;&#46;&#99;&#111;&#109;">&#104;&#101;&#114;&#101;&#115;&#121;&#115;&#101;&#101;&#107;&#101;&#114;&#64;&#103;&#109;&#97;&#105;&#108;&#46;&#99;&#111;&#109;</a></p>
</div>
@endsection
