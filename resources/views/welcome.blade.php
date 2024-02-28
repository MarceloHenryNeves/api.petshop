<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">

        <title>Laravel</title>
         @livewireStyles
         @vite('resources/css/app.css')
    </head>
    <body class="bg-gray-400 flex flex-col items-center justify-center">
    <livewire:store-service-form />
    @livewireScripts
    </body>
</html>
