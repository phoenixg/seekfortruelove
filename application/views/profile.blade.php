@layout('layouts.default')
@section('page_styles_header')
    {{ HTML::style('js/alertify.js-0.3.9/themes/alertify.core.css') }}
    {{ HTML::style('js/alertify.js-0.3.9/themes/alertify.default.css') }}
    {{ HTML::style('css/profile.css') }}
    {{ HTML::style('js/swipebox/swipebox.css') }}
@endsection
@section('page_scripts_header')
    {{ HTML::script('js/alertify.js-0.3.9/lib/alertify.min.js') }}
    {{ HTML::script('js/swipebox/jquery.swipebox.min.js') }}
    {{ HTML::script('js/profile.js') }}
@endsection
@section('page_scripts_footer')

@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="span2">
            <ul id="thumbnails" class="thumbnails">
                <li>
                    @if( File::exists( path('image_profile_icon').$user->id.'.jpg') )
                        {{ HTML::image('/images/profile/icon/'.$user->id.'.jpg', '头像', array('id' => 'icon')) }}
                    @elseif($user->sex == '男')
                        {{ HTML::image('/images/profile/icon/'.'default.male.jpg',   '头像', array('id' => 'icon')) }}
                    @elseif($user->sex == '女')
                        {{ HTML::image('/images/profile/icon/'.'default.female.jpg', '头像', array('id' => 'icon')) }}
                    @endif
                    <input type="hidden" value="{{ $user->id }}" id="userId" />
                </li>
            </ul>
        </div>

        <div class="span10" id="profile-info">
            <div class="row">
                <div class="span4"><strong>昵称:&nbsp;</strong>{{ $user->nickname }}</div>
                <div class="span2"><strong>性别:&nbsp;</strong>{{ $user->sex }}</div>
                <div class="span2"><strong>民族:&nbsp;</strong>{{ $user->ethnic }}</div>
                <div class="span2"><strong>籍贯:&nbsp;</strong>{{ $user->nationality }}</div>
            </div>
            <div class="row">
                <div class="span2"><strong>身高/体重:&nbsp;</strong>{{ $user->height }}/{{ $user->weight }}</div>
                <div class="span2"><strong>出生年份<!--/年龄-->:&nbsp;</strong>{{ $user->born }}<!--/25--></div>
                <div class="span2"><strong>婚姻状况:&nbsp;</strong>{{ $user->marriage }}</div>
                <div class="span2"><strong>常住区域:&nbsp;</strong>{{ $user->district }}</div>
                <div class="span2"><strong>住房情况:&nbsp;</strong>{{ $user->living }}</div>
            </div>
            <div class="row">
                <div class="span2"><strong>最高学历:&nbsp;</strong>{{ $user->academic }}</div>
                <div class="span2"><strong>专业:&nbsp;</strong>{{ $user->major }}</div>
                <div class="span4"><strong>毕业院校:&nbsp;</strong>{{ $user->school }}</div>
            </div>
            <div class="row">
                <div class="span2"><strong>行业:&nbsp;</strong>{{ $user->industry }}</div>
                <div class="span2"><strong>职业:&nbsp;</strong>{{ $user->profession }}</div>
                <div class="span2"><strong>公司类型:&nbsp;</strong>{{ $user->companytype }}</div>
                <div class="span2"><strong>税前月薪:&nbsp;</strong>{{ $user->salary }}</div>
            </div>
            <div class="row">
                <div class="span10"><strong>个人博客:&nbsp;</strong>{{ $user->blog }}</div>
            </div>
        </div>
    </div>
    
    <hr />

    <div class="row loginHistory">
        <div class="span12">
            <strong>最近登录活跃度：</strong>
            @forelse ($d as $historyDate => $loginTimes)
                <div class="loginHistoryBlock
                            @if($loginTimes == 1) loginHistoryBlockL1@endif
                            @if($loginTimes >= 2) loginHistoryBlockL2@endif
                            @if($loginTimes >= 5) loginHistoryBlockL3@endif
                            @if($loginTimes == 0 || $loginTimes == null) loginHistoryBlockL0@endif
                            "></div>
            @empty
                <p>暂无数据</p>
            @endforelse
        </div>
    </div>

    <div class="row watchers">
        <div class="span12">
            <strong>最近被谁关注了：</strong>
            @forelse ($watchers as $watcher)
                <a href="{{ URL::base() . '/profile/'. $watcher->watcher_user_id }}" class="" title="" target="_blank">
                    <img src="{{ URL::base() . '/images/profile/icon/'.$watcher->watcher_user_id .'.jpg' }}" alt="" />
                </a>
            @empty
                <span>暂时没有人来看过，别着急，等会儿吧^^</span>
            @endforelse
        </div>
    </div>

    <hr />

    <?php //var_dump(Auth::user()->id);var_dump(URI::segment(2)); ?>
    <!-- login的人和该页的人是不同的两个人才行 -->
    @if((int) Auth::user()->id !== (int) URI::segment(2))
        @if(!$iamallowed)
            <a href="javascript:void(0);" id="photoRequest" 
                class="btn btn-mini btn-success">请求彩色照片查看权</a>
        @endif
    @endif

    @if($iamallowed || (Auth::user()->id == URI::segment(2)))
        <a href="javascript:void(0);" 
                class="btn btn-mini btn-success" id="photosToggle">显示彩色照片</a>
        <div id="photos">
            @forelse ($images as $image)
                <a href="{{ URL::base() . '/images/profile/large/' . $image->filename }}" class="swipebox" title="">
                    <img src="{{ URL::base() . '/images/profile/small/' . $image->filename_thumb }}" alt="" />
                </a>
            @empty
                <p>目前暂无彩色照片</p>
            @endforelse
        </div>
    @endif

    <div class="row">
        <div class="span12">
            <div id="personalad">
                <h2>征婚启事</h2>
                <hr />
                @if($user_personalad)
                    {{$user_personalad}}
                @else
                    暂时没有
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

