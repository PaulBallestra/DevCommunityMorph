<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>


            <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
            <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
            <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
            <link rel="manifest" href="/site.webmanifest">
            <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#0ed3cf">
            <meta name="msapplication-TileColor" content="#0ed3cf">
            <meta name="theme-color" content="#0ed3cf">

            <meta property="og:image" content="https://tailwindcomponents.com/storage/835/temp38896.png?v=2022-01-14 08:48:07">
            <meta property="og:image:width" content="1280">
            <meta property="og:image:height" content="640">
            <meta property="og:image:type" content="image/png">

            <meta property="og:url" content="https://tailwindcomponents.com/component/timeline/landing">
            <meta property="og:title" content="Timeline by rswebdesigner">
            <meta property="og:description" content="Timeline inspired by Facebook &amp; Twitter.">

            <meta name="twitter:card" content="summary_large_image">
            <meta name="twitter:site" content="@TwComponents">
            <meta name="twitter:title" content="Timeline by rswebdesigner">
            <meta name="twitter:description" content="Timeline inspired by Facebook &amp; Twitter.">
            <meta name="twitter:image" content="https://tailwindcomponents.com/storage/835/temp38896.png?v=2022-01-14 08:48:07">
            <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

            <title>Timeline by rswebdesigner. </title>

            <link rel="stylesheet" href="https://unpkg.com/tailwindcss@0.3.0/dist/tailwind.min.css">

            <link rel="stylesheet" href="https://unpkg.com/tailwindcss@1.0.4/dist/tailwind.min.css">

        <style>
            .m-10 {
                 margin: 0rem;
            }
            @media (min-width: 640px) {
                .sm\:p-24 {
                    padding: 6rem;
                }
            }

            .max-w-md {
                max-width: 38rem;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
