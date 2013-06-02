@layout('layouts.documents')
@section('page_styles_header')

@endsection
@section('page_scripts_header')
    {{ HTML::script('js/raphael-min.js') }}
    {{ HTML::script('js/livicons.for.documents.js') }}
    <!--[if lt IE 8]>
    {{ HTML::script('js/json2.min.js') }}
    <![endif]-->
@endsection
@section('main')
<h1>帮助大纲</h1>



@endsection
