<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')

    <title>{{ $title ?? 'Page Title' }}</title>
</head>

<body>
    {{-- <div class="h-screen flex justify-center items-center">
        @livewire('registration')
    </div> --}}

    <div class="grid grid-cols-5 gap-5 my-12 mx-6">
        <div class="lg:col-span-2 col-span-5">
            @livewire('posts.create')
        </div>
        <div class="lg:col-span-3 col-span-5">
            @livewire('posts.index', ['lazy' => true])
        </div>
    </div>
</body>

</html>
