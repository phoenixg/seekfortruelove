<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>SEEK FOR TRUELOVE</title>

    <!-- favicon -->
    <link id="favicon" href="favicon.ico" rel="icon" type="image/x-icon" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{ Asset::styles() }}
    @yield('page_styles_header')

    {{ Asset::scripts() }}
    @yield('page_scripts_header')

    <style>
    .well .nav-list hr{
        margin-top: 2px;
        margin-bottom: 10px;
    }
    </style>

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
                        <li>{{ HTML::link_to_route('home', '回首页') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div id="main">
        <div class="container">
            <div class="row">
                <div class="span3">
                    <div class="well">
                        <ul class="nav nav-list">
                            <li class="nav-header"><h4>帮助中心</h4></li>
                            <hr />
                            <!--
                            <li class="">
                                <a href="{{ URL::to_route('documents') }}">
                                    <span class="livicon" data-n="home" data-s="16" data-c="original" data-hc="#000" data-a="1" data-l="0" data-i="3" data-d="0" data-et="hover" data-op="0"></span>&nbsp;帮助大纲</a>
                            </li>
                            -->
                            <li class="">
                                <a href="{{ URL::to_route('faq') }}">
                                    <span class="livicon" data-n="question" data-s="16" data-c="original" data-hc="#000" data-a="1" data-l="0" data-i="3" data-d="0" data-et="hover" data-op="0"></span>&nbsp;常见问题</a>
                            </li>
                            <li class="">
                                <a href="{{ URL::to_route('memorabilia') }}">
                                    <span class="livicon" data-n="calendar" data-s="16" data-c="original" data-hc="#000" data-a="1" data-l="0" data-i="3" data-d="0" data-et="hover" data-op="0"></span>&nbsp;大事记</a>
                            </li>
                            <!--
                            <li class="">
                                <a href="{{ URL::to_route('faq') }}">
                                    <span class="livicon" data-n="help" data-s="16" data-c="original" data-hc="#000" data-a="1" data-l="0" data-i="3" data-d="0" data-et="hover" data-op="0">&nbsp;使用帮助</a>
                            </li>
                            -->
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
