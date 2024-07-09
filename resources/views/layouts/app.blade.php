<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <style>
            table {
            border-collapse: collapse;
            color: white;
            width: 80%;
            margin: 20px 0;
            box-shadow: 0 2px 3px rgba(0,0,0,0.1);
            border-radius: 15px;
            }
            th, td {
                padding: 12px 15px;
                border: 1px solid #ddd;
                text-align: left;
            }
            th {
                background-color: #840000;
                color: white;
                font-weight: bold;
            }
            tr {
                background-color: rgb(31 41 55 / var(--tw-bg-opacity));
            }
            .contenedor{
                display: flex;
                flex-direction: column;
                align-items: center;
                background-color: rgb(31 41 55 / var(--tw-bg-opacity));
                border-radius: 15px;
                padding-top: 25px;
                padding-bottom: 25px;
            }
            .alineacion{
                width: 80%;
                font-size: 30px;
                color: white;
                font-weight: bold;
            }
            .boton-1,.boton-2{
                border: 1px solid white;
                width: 50%;
                
            }
            .boton-1:hover,.boton-2:hover{
                background-color: white;
                color: black;
            }
        </style>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
