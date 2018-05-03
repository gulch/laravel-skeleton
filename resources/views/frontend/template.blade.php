<!DOCTYPE html>
<html lang="ru" prefix="og: http://ogp.me/ns#" itemscope="itemscope" itemtype="http://schema.org/WebSite">
<head>
    @include('frontend._partials.meta')
</head>
<body>

{{-- Main --}}
<main id="main">
    @yield('content')
</main>

{{-- JAVASCRIPT --}}
@include('frontend._partials.assets.js')
</body>
</html>
