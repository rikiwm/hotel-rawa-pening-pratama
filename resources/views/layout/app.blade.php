<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'Temukan hotel atau villa terbaik untuk liburan Anda.')">
    <meta name="keywords" content="@yield('meta_keywords', 'hotel, villa, penginapan, liburan, akomodasi')">
    <meta name="author" content="Hotel Rawa Pening Pratama">
    <meta property="og:title" content="@yield('meta_og_title', 'Hotel dan Villa Terbaik')">
    <meta property="og:description" content="@yield('meta_og_description', 'Nikmati kenyamanan dan kemewahan di hotel atau villa pilihan kami.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('assets/img/logos/LogoHRPP.png') }}">
    <title>Hotel Rawa Pening Pratama</title>
    @yield('meta')
    @livewireStyles
    @include('layout._link')
    @stack('link-css')
</head>

<body>
    <div class="content-wrapper">
        @include('layout._header')
        @yield('breadcumb')
        @yield('content')
    </div>
    @include('layout._footer')
    @livewireScripts
    @stack('link-js')
    @include('layout._script')
</body>

</html>
