@layout('layouts.default')
@section('page_styles_header')
@endsection
@section('page_scripts_header')
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="span12">
        	<h4>您好！请到“控制面板”里完成
        		个人资料的填写，等待帐号通过审核后才能搜索其他用户。</h4>
        	<a class="btn btn-primary" href="{{ URL::to_route('dashboard') }}">现在就去</a>
        </div>
    </div>
</div>


@endsection
