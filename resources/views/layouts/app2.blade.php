<!DOCTYPE html>
<html x-data="{mobile : false}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

          <title>{{ config('app.name', 'MexicanShop - Transformamos conciencias') }}</title>
    <html lang="es-MX">
    <meta name="author" content="Carlos Ramirez & Servicios Informaticos Peninsula">
<meta name="description" content="En este espacio digital encontrarás algo con lo que te identificarás. Tienda Oficial de Carlos Ramirez">
    
    <meta name="keywords" content="prolife, provida, carlos ramirez, agustin laje, choose life, prolifearmy, elsa mendez, celeste">
    
    <link rel="shortcut icon" href="https://res.cloudinary.com/hfakqpuzy/image/upload/v1624517371/TOXIK_1_hprtza.png" type="image/x-icon">
    
    
        <meta name="twitter:title" content="MexicanShop">
        <meta property="og:image" content="https://res.cloudinary.com/hfakqpuzy/image/upload/v1624517371/TOXIK_1_hprtza.png">
<meta property="og:description" content="En este espacio digital encontrarás algo con lo que te identificarás. Tienda Oficial de Carlos Ramirez">
<meta property="og:title" content="MexicanShop">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@1.1.x/dist/index.min.js" defer></script>

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <script src="//code.tidio.co/hgr8jru4lx01fco2dqtfmdgkpjg6tq1i.js"></script>
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body :class="{ 'overflow-hidden max-h-screen': mobileMenu }" x-data="{ mobileMenu: false }">
        <div id="main">
            <div x-data="{
        triggerNavItem(id) {
            $scroll(id)
        },
        triggerMobileNavItem(id) {
            $parent.mobileMenu = false;
            this.triggerNavItem(id)
        }
    }">


        <header>
            @include('layouts.nav-store')
            @include('layouts.nav-store-mobile')
        </header>

        <main>
            {{ $slot }}
        </main>

        <footer >
            @include('layouts.footer')
        </footer>

        @livewireScripts

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <x-livewire-alert::scripts />

        @stack('modals')
        @stack('javascript')
    </body>
</html>
