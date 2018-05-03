<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

@if(isset($noindex) && $noindex)
    <meta name="robots" content="noindex, nofollow">
@endif

<?php
$seo_title = $seo_title ?? config('app.name');
$seo_description = $seo_description ?? '';
$seo_keywords = $seo_keywords ?? '';
$seo_image = $seo_image ?? '';
?>

<title>{{ $seo_title }}</title>
<meta name="description" content="{{ $seo_description }}">
<meta name="keywords" content="{{ $seo_keywords }}">
<link rel="image_src" href="{{ $seo_image }}">

{{-- RSS Feed --}}
<link rel="alternate" type="application/rss+xml" title="{{ config('app.name') }}" href="/feed">

{{-- Prefetch DNS  --}}
{{--<link rel="dns-prefetch" href="https://ajax.googleapis.com">--}}

{{--
    Preconnect
    * https://w3c.github.io/resource-hints/#dfn-preconnect
--}}
{{--<link rel="preconnect" href="https://maps.googleapis.com">--}}

{{--
    Preload
    * https://www.w3.org/TR/preload/
--}}
@if(isset($preload))
    @foreach($preload as $prld)
        <link rel="preload"
              href="{{ $prld['href'] }}"
              as="{{ $prld['as'] }}"
              @if(isset($prld['type'])) type="{{ $prld['type'] }}" @endif
        >
    @endforeach
@endif

{{-- CSS --}}
@include('frontend._partials.assets.css')

@if(isset($canonical) && $canonical)
        <link rel="canonical" href="{!! $canonical !!}">
@endif

@if(isset($noIndex))
    <meta name="robots" content="noindex"/>
@endif

{{-- Social: Google+ / Schema.org  --}}
<link href="https://plus.google.com/+YourPage" rel="publisher">
<meta itemprop="name" content="{{ $seo_title }}">
<meta itemprop="description" content="{{ $seo_description }}">
<meta itemprop="image" content="{{ $seo_image }}">
<link itemprop="url" href="{{ URL::current() }}">

{{-- Social: Facebook / Open Graph --}}
<meta property="fb:app_id" content="">
<meta property="fb:pages" content="">
<meta property="og:url" content="{{ URL::current() }}">
<meta property="og:type" content="{{ $_SERVER['REQUEST_URI'] === '/' ? 'website' : 'article' }}">
<meta property="og:title" content="{{ $seo_title }}">
<meta property="og:image" content="{{ $seo_image }}">
<meta property="og:description" content="{{ $seo_description }}">
<meta property="og:site_name" content="{{ config('app.name') }}">

{{-- Social: Twitter --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@YourID">
<meta name="twitter:creator" content="@YourID">

{{-- Icons --}}
{{-- Generate here - https://realfavicongenerator.net/ --}}
{{--<link rel="apple-touch-icon" href="/assets/img/favicon/apple-touch-icon.png">--}}
{{--<link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon/favicon-32x32.png">--}}
{{--<link rel="manifest" href="/assets/img/favicon/manifest.json">--}}
{{--<link rel="mask-icon" href="/assets/img/favicon/safari-pinned-tab.svg" color="#37cc53">--}}
{{--<link rel="shortcut icon" href="/assets/img/favicon/favicon.ico">--}}
{{--<meta name="msapplication-config" content="/assets/img/favicon/browserconfig.xml">--}}
{{--<meta name="theme-color" content="#37cc53">--}}

{{-- CSRF Token --}}
<meta name="csrf-token" content="{{ csrf_token() }}">