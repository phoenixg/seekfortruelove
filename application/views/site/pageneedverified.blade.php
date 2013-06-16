@layout('layouts.default')
@section('page_styles_header')
@endsection
@section('page_scripts_header')
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="span12">
        	<h4>请耐心等待帐号通过审核，之后才能搜索和查看其他用户。请确保真实填写了资料，并上传了照片，以及设置了头像。</h4>
        	<a class="btn btn-primary" href="{{ URL::to_route('dashboard') }}">现在就去</a>
        </div>
    </div>
</div>


@endsection
