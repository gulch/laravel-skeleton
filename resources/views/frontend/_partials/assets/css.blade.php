{{-- PRODUCTION STYLES --}}
<link rel="stylesheet" href="{{ app_asset('f.css') }}" type="text/css" property="stylesheet">

@if(isset($styles))
    @foreach($styles as $item)
        <link rel="stylesheet" href="{{ $item }}" type="text/css" property="stylesheet">
    @endforeach
@endif
