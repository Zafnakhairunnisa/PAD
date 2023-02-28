<!doctype html>
<html
    lang="{{ htmlLang() }}"
    @langrtl
        dir="rtl"
    @endlangrtl
>

<head>
    @routes
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >
    {{-- <title>{{ appName() }} | @yield('title')</title> --}}
    <meta
        name="description"
        content="@yield('meta_description', appName())"
    >
    <meta
        name="author"
        content="@yield('meta_author', 'PT Kaha Solusi Indonesia')"
    >
    @yield('meta')

    @stack('before-styles')
    <link
        rel="dns-prefetch"
        href="//fonts.gstatic.com"
    >
    <link
        href="https://fonts.googleapis.com/css?family=Nunito"
        rel="stylesheet"
    >
    <link
        href="{{ mix('css/frontend.css') }}"
        rel="stylesheet"
    >
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css"
    />

    @stack('after-styles')
    @inertiaHead
</head>

<body>
    {{-- @include('includes.partials.read-only') --}}
    {{-- @include('includes.partials.logged-in-as') --}}

    {{-- <div id="app">
        <fe-layout>
            @yield('content')
        </fe-layout>
    </div> --}}
    <!--app-->
    @inertia
    @stack('before-scripts')
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/frontend.js') }}"></script>
    @stack('after-scripts')
</body>

</html>
