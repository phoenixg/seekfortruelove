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
<div class="row">
    <div class="span9">
        abcde
    </div>
</div>
@endsection
