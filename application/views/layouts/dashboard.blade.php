<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>SEEK FOR TRUELOVE -- 控制面板</title>

    <!-- favicon -->
    <link id="favicon" href="favicon.ico" rel="icon" type="image/x-icon" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{ Asset::styles() }}
    @yield('page_styles_header')
    {{ HTML::style('css/dashboard.css') }}

    {{ Asset::scripts() }}
    @yield('page_scripts_header')

    <script type="text/javascript">
        var BASE = "<?php echo URL::base(); ?>";
    </script>
</head>
<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                {{ HTML::link_to_route('home', 'Seek For Truelove', array() , array('class' => 'brand')) }}

                <div class="nav-collapse pull-right">
                    <ul class="nav">
                        <li>{{ HTML::link('logout', '注销') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @if($user_notice)
    <div class="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ $user_notice }}
    </div>
    @endif

    <div id="main">
        <div class="container">
            <div class="row">
                <div class="span3">
                    <div class="well">
                        <ul class="nav nav-list">
                            <?php /*<!--
                            <li class="nav-header">控制面板</li>
                            <li class="@if(isset($menuflg_index))active@endif">
                                <a href="{{ URL::to_route('dashboard') }}"><i class="icon-home@if(isset($menuflg_index)) icon-white@endif"></i> 统计</a>
                            </li>
                            -->*/?>

                            <li class="nav-header">个人信息</li>
                            <li class="@if(isset($menuflg_profile))active@endif">
                                <a href="{{ URL::to_route('dashboard_profile') }}"><i class="icon-user@if(isset($menuflg_profile)) icon-white@endif"></i>
                                    资料
                                    @if(isset($verified) && ($verified == 0))<span class="label label-important nav-status">未激活邮箱</span>@endif
                                    @if(isset($verified) && ($verified == 1))<span class="label label-important nav-status">等待审核</span>@endif
                                    @if(isset($verified) && ($verified == 3))<span class="label label-important nav-status">未通过审核</span>@endif
                                    @if(isset($verified) && ($verified == 2))<span class="label label-success nav-status">已审核</span>@endif
                                </a>
                            </li>
                            <li class="@if(isset($menuflg_image))active@endif">
                                <a href="{{ URL::to_route('dashboard_image') }}"><i class="icon-picture @if(isset($menuflg_image)) icon-white@endif"></i>&nbsp;相册</a>
                            </li>
                            <li class="@if(isset($menuflg_personalad))active@endif">
                                <a href="{{ URL::to_route('dashboard_personalad') }}"><i class="icon-pencil"></i>&nbsp;征婚启事</a>
                            </li>
                            <li class="@if(isset($menuflg_message))active@endif">
                                <a href="{{ URL::to_route('dashboard_message') }}"><i class="icon-envelope"></i>&nbsp;消息中心</a>
                            </li>
                            <li class="@if(isset($menuflg_miscellaneous))active@endif">
                                <a href="{{ URL::to_route('dashboard_miscellaneous') }}"><i class="icon-cog"></i>&nbsp;杂项</a>
                            </li>
                            <?php /*
                            <li class="nav-header">高级功能</li>
                            <li><a href="#"><i class="icon-pencil"></i> 项目</a></li>
                            */?>
                        </ul>
                    </div>
                </div>

                <div class="span9">
                    @yield('main')
                </div>
            </div>
        </div>
    </div>


    @yield('page_scripts_footer')
    <!-- CNZZ STATS -->
    <div style="display:none;visibility:hidden;">
        <script src="http://s13.cnzz.com/stat.php?id=4858222&web_id=4858222" language="JavaScript"></script>
    </div>
</body>
</html>
