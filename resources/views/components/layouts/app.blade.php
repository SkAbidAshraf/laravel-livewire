<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')

    <title>{{ $title ?? 'Page Title' }}</title>
</head>

<body>
    {{-- <div class="flex items-center justify-center h-screen">
        @livewire('registration')
    </div> --}}

    <div class="grid grid-cols-5 gap-5 mx-6 my-12">
        <div class="col-span-5 lg:col-span-2">
            @livewire('posts.create')
        </div>
        <div class="col-span-5 lg:col-span-3">
            <livewire:posts.index search='test' />
        </div>
    </div>
</body>

</html>
