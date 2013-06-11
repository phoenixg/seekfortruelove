@layout('layouts.documents')
@section('page_styles_header')
    {{ HTML::style('js/timeliner/timeliner.css') }}
    {{ HTML::style('js/timeliner/timeliner-inc/colorbox.css') }}
@endsection
@section('page_scripts_header')
    {{ HTML::script('js/raphael-min.js') }}
    {{ HTML::script('js/livicons.for.documents.js') }}
    <!--[if lt IE 8]>
    {{ HTML::script('js/json2.min.js') }}
    <![endif]-->
@endsection
@section('page_scripts_footer')
    {{ HTML::script('js/documents.memorabilia.js') }}
    {{ HTML::script('js/timeliner/timeliner.min.js') }}
    {{ HTML::script('js/timeliner/timeliner-inc/colorbox.js') }}
@endsection
@section('main')
<h1>网站大事记</h1>
<hr />

<div id="timelineContainer">
    <div class="timelineToggle"><p><a class="expandAll expanded">- 收缩全部</a></p></div>
    <br class="clear">

    <div class="timelineMajor">
        <h2 class="timelineMajorMarker"><span>2012年12月21日</span></h2>
        <dl class="timelineMinor">
            <dt id="mytime1"><a class="open">上线</a></dt>
        </dl>
    </div>

    <div class="timelineMajor">
        <h2 class="timelineMajorMarker"><span>2012年12月22日</span></h2>
        <dl class="timelineMinor">
            <dt id="mytime2"><a class="open">第1位注册用户诞生</a></dt>
        </dl>
    </div>

    <div class="timelineMajor">
        <h2 class="timelineMajorMarker"><span>2012年12月26日</span></h2>
        <dl class="timelineMinor">
            <dt id="mytime3"><a class="open">被迫改变定位</a></dt>
            <dd style="display: block;" id="mytime3EX" class="timelineEvent">
            <p>在yimaneili和赞美社先后遭到删贴，不得不改成非主内定位。</p>
            <br /><br />
            <table>
                <tr>
                    <td><img src="{{ URL::base() . '/images/memorabilia/' . 'screenshot20121229.png' }}" alt="" width="250px"></td>
                    <td><img src="{{ URL::base() . '/images/memorabilia/' . 'screenshot20121230.png' }}" alt="" width="250px"></td>
                </tr>
            </table>
            <br class="clear">
            </dd>
        </dl>
    </div>

    <div class="timelineMajor">
        <h2 class="timelineMajorMarker"><span>2013年01月04日 左右</span></h2>
        <dl class="timelineMinor">
            <dt id="mytime4"><a class="open">中止网站程序开发</a></dt>
        </dl>
    </div>

    <div class="timelineMajor">
        <h2 class="timelineMajorMarker"><span>2013年04月09日</span></h2>
        <dl class="timelineMinor">
            <dt id="mytime5"><a class="open">重启网站程序开发</a></dt>
        </dl>
    </div>

    <div class="timelineMajor">
        <h2 class="timelineMajorMarker"><span>2013年05月14日</span></h2>
        <dl class="timelineMinor">
            <dt id="mytime6"><a class="open">截图</a></dt>
            <dd style="display: block;" id="mytime6EX" class="timelineEvent">
            <p>移植到了新版本的框架，并更换了模板，网站焕然一新。</p>
            <br /><br />
            <table>
                <tr>
                    <td><img src="{{ URL::base() . '/images/memorabilia/' . 'screenshot20130514.png' }}" alt="" width="250px"></td>
                </tr>
            </table>
            <br class="clear">
            </dd>
        </dl>
    </div>

    <div class="timelineMajor">
        <h2 class="timelineMajorMarker"><span>2013年05月27日 - 2013年06月02日</span></h2>
        <dl class="timelineMinor">
            <dt id="mytime7"><a class="open">因程序代码无意中开源了livicons遭到作者的DMCA指控，github源码托管被冻结而导致项目开发中断</a></dt>
        </dl>
    </div>

    <div class="timelineMajor">
        <h2 class="timelineMajorMarker"><span>2013年06月11日</span></h2>
        <dl class="timelineMinor">
            <dt id="mytime8"><a class="open">截图</a></dt>
            <dd style="display: block;" id="mytime8EX" class="timelineEvent">
            <p>网站重新上线，正式投入使用！</p>
            <br /><br />
            <table>
                <tr>
                    <td><img src="{{ URL::base() . '/images/memorabilia/' . 'screenshot20130611.png' }}" alt="" width="250px"></td>
                </tr>
            </table>
            <br class="clear">
            </dd>
        </dl>
    </div>



</div><!-- /#timelineContainer -->
@endsection
