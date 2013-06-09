@layout('layouts.dashboard')
@section('page_styles_header')
    {{ HTML::style('js/alertify.js-0.3.9/themes/alertify.core.css') }}
    {{ HTML::style('js/alertify.js-0.3.9/themes/alertify.default.css') }}
@endsection
@section('page_scripts_header')
@endsection
@section('page_scripts_footer')
    {{ HTML::script('js/alertify.js-0.3.9/lib/alertify.min.js') }}}
@endsection
@section('main')
<h2>杂项</h2>
<hr />

@if($errors->has())
<div class="alert alert-block alert-error fade in">
    <a href="javascript: void(0)" data-dismiss="alert" class="close">×</a>
    <h4 class="alert-heading">呀，发生了以下错误哦！</h4>
    <p>
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </p>
    <p>
        <a href="javascript: void(0)" class="btn btn-danger">好嘛我改</a>
    </p>
</div>
@endif

@if (Session::has('old_password_error'))
<div class="alert alert-block alert-error fade in">
    <a href="javascript: void(0)" data-dismiss="alert" class="close">×</a>
    <h4 class="alert-heading">呀，发生了以下错误哦！</h4>
    <p>
        {{ Session::get('old_password_error')}}
    </p>
    <p>
        <a href="javascript: void(0)" class="btn btn-danger">好嘛我改</a>
    </p>
</div>
@endif

@if (Session::has('change_password_success'))
<div class="alert alert-block alert-success fade in">
    <a href="javascript: void(0)" data-dismiss="alert" class="close">×</a>
    <h4 class="alert-heading">恭喜！</h4>
    <p>
        {{ Session::get('change_password_success')}}
    </p>
</div>
@endif

<div class="row">
    <div class="span9">
            {{ Form::open(URL::to_route('changepassword'), 'PUT', array('class' => 'form-horizontal')) }}
                <fieldset>
                    <legend>修改密码</legend>
                    <div class="control-group">
                        {{ Form::label('password', '旧密码', array('class' => 'control-label')) }}
                        <div class="controls">
                            <input type="password" name="password_old" placeholder="" class="span2">
                        </div>
                    </div>

                    <div class="control-group">
                        {{ Form::label('password', '新密码', array('class' => 'control-label')) }}
                        <div class="controls">
                            <input type="password" name="password" placeholder="" class="span2">
                        </div>
                    </div>

                    <div class="control-group">
                        {{ Form::label('password_confirmation', '重复一遍', array('class' => 'control-label')) }}
                        <div class="controls">
                            <input type="password" name="password_confirmation" placeholder="" class="span2">
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            {{ Form::submit('确定', array('class' => 'btn btn-primary')) }}
                        </div>
                    </div>

                </fieldset>

                {{ Form::token() }}

            {{ Form::close() }}

    </div>
</div>
@endsection
