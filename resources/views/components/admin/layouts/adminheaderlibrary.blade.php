<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet"
    href="{{ asset('admin/css/' . (App::make('themesetting') ? App::make('themesetting')->path : 'theme/bluetheme.css')) }}">
@section('headSection')
@show
