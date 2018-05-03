<html lang="{{ config('app.locale') }}">
<head>
    <title>{{ $seo_title }}</title>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <link rel="stylesheet" href="{{ app_asset('smntc.css') }}"/>
</head>
<body>

<div class="ui hidden divider"></div>

<div class="ui centered stackable grid">

    <div class="four wide column center aligned ui segment">
        <h1 class="ui image header">
            <div class="content">
                @yield('title')
            </div>
        </h1>

        @yield('content')

    </div>

</div>
<script defer src="{{ app_asset('jqr.js') }}"></script>
<script defer src="{{ app_asset('f.js') }}"></script>
</body>
</html>
