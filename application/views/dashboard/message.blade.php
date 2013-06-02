@layout('layouts.dashboard')
@section('page_styles_header')
    {{ HTML::style('js/alertify.js-0.3.9/themes/alertify.core.css') }}
    {{ HTML::style('js/alertify.js-0.3.9/themes/alertify.default.css') }}
    {{ HTML::style('css/dashboard.message.css') }}
@endsection
@section('page_scripts_header')
@endsection
@section('page_scripts_footer')
    {{ HTML::script('js/alertify.js-0.3.9/lib/alertify.min.js') }}
    {{ HTML::script('js/dashboard.message.js') }}
@endsection
@section('main')
<h2>消息中心</h2>
<hr />
<h5>他们希望看到你的彩色照片:</h5>
<div class="row">
    <div class="span9" id="requestPersonImages">
        @if(is_array($user_infoauth) && !empty($user_infoauth))
            @foreach($user_infoauth as $user_id)
                @if(File::exists(path('image_profile_icon') . $user_id . '.jpg'))
                <table>
                    <tr>
                        <td rowspan="2"><img src="{{ URL::base() . '/images/profile/icon/' . $user_id . '.jpg' }}" 
                            alt="" width="50px" /></td>
                        <td><button class="btn-mini btn-primary agreePersonImagesRequest">同意</button> <br /></td>
                    </tr>
                    <tr>
                        <td><button class="btn-mini btn-danger ignorePersonImagesRequest">忽略</button></td>
                    </tr>
                </table>
                @endif 
            @endforeach
        @else
            <p>暂时没有，过会儿来看看吧^^</p>
        @endif
    </div>
</div>
@endsection
