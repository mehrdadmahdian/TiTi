<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>{{ trans('site.title') }} | @yield('page-title')</title>
<meta name="description" content="{{trans('site.description')}}">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="application-name" content="{{trans('site.title')}}">

<!-- Styles -->
@if (config('app.locale') == 'en')
    <link rel="stylesheet" href="{{ asset('bundle/en/frontend/css/core.css') }}">
    {{--<link rel="stylesheet" href="{{ asset('bundle/en/frontend/css/plugins.css') }}">--}}
    @stack('head')
    <link rel="stylesheet" href="{{ asset('bundle/en/frontend/css/style.css') }}">
@else
    <link rel="stylesheet" href="{{ asset('bundle/frontend/css/core.css') }}">
    {{--<link rel="stylesheet" href="{{ asset('bundle/frontend/css/plugins.css') }}">--}}
    @stack('head')
    <link rel="stylesheet" href="{{ asset('bundle/frontend/css/style.css') }}">
@endif

<!-- SEO & Google -->
{{--<meta name="referrer" content="url"> <!-- Prevent disabling referral in HTTPS -->--}}
{{--<meta name="robots" content="index,follow,noodp">--}}
{{--<meta name="googlebot" content="index,follow">--}}
{{--<meta name="google-site-verification" content="VerificationToken"> <!-- Google Webmaster Tools token -->--}}
{{--<meta name="google" content="notranslate">--}}
{{--<meta name="google" content="nositelinkssearchbox">--}}
{{--<link rel="canonical" href="url">--}}
{{--<link rel="amphtml" href="url"> <!-- Link to AMP version of page -->--}}
{{--<link rel="alternate" href="https://en.example.com/" hreflang="en"> <!-- Link to another language -->--}}

<!-- Performance -->
{{--<link rel="dns-prefetch" href="url"> <!-- Link to url -->--}}
{{--<link rel="preconnect" href="url"> <!-- Link to url -->--}}
{{--<link rel="prefetch" href="file"> <!-- Link to file -->--}}

<!-- Social Netoworks -->
{{--<meta property="og:url" content="[url]">--}}
{{--<meta property="og:type" content="article">--}}
{{--<meta property="og:title" content="[title]">--}}
{{--<meta property="og:description" content="[description]">--}}
{{--<meta property="og:image" content="[image url]">--}}
{{--<meta property="article:author" content="[your facebook url]">--}}
{{--<meta property="og:site_name" content="[site name]">--}}
{{--<meta property="article:published_time" content="2014-08-12T00:01:56+00:00">--}}
{{--<meta name="pinterest" content="nopin" description="[no!]">--}}
{{--<meta name="twitter:card" content="summary">--}}
{{--<meta name="twitter:site" content="[@websitetwitter]">--}}
{{--<meta name="twitter:creator" content="[@yourtwitter]">--}}
{{--<meta property="og:url" content="[url]">--}}
{{--<meta property="og:description" content="[description]">--}}
{{--<meta property="og:image" content="[image url]">--}}
{{--<meta itemscope itemtype="http://schema.org/Article">--}}
{{--<meta itemprop="headline" content="[title]">--}}
{{--<meta itemprop="description" content="[description]">--}}
{{--<meta itemprop="image" content="[image url]">--}}

<!-- Laravel Feed -->
{{--@include('laravel-feed::feed-links')--}}

<!-- Fav Icons -->
<link rel="icon" href="{{asset('favicon-16.png')}}" sizes="16x16" type="image/png">
<link rel="icon" href="{{asset('favicon-32.png')}}" sizes="32x32" type="image/png">
<link rel="icon" href="{{asset('favicon-48.png')}}" sizes="48x48" type="image/png">
<link rel="icon" href="{{asset('favicon-62.png')}}" sizes="62x62" type="image/png">
<link rel="icon" href="{{asset('favicon-192.png')}}" sizes="192x192" type="image/png">

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->