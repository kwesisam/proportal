@props(['navLinks'])

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <style>[x-cloak]{display:none}</style>
    <!-- Include the Alpine library on your page -->
    <script src="https://unpkg.com/alpinejs" defer></script>
    <!-- Alpine Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>
    <!-- Alpine Core -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!--For file uploader-->
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/google-libphonenumber/3.2.39/libphonenumber.js" integrity="sha512-1n/KXVQgB6fZi/6dc6+yGx4HC6OvsyTI0DDeBIhBgg0x322ZnzJP0WMQklmFc4poHrJRyT7urpbrGITM5vNBVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Development version -->
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    @vite("resources/css/app.css")
</head>
<body>
    <main class="flex relative bg-gray-50 ">
        <x-leftSidebar :navLinks="$navLinks" />
        <section class="w-full  relative">
            <x-navBar/>
            <div class="px-3 flex gap-2 relative"> 
                {{ $slot }}
                @if(request()->is('/'))
                    <x-rightSidebar/>
                @endif
            </div>
        </section>
    </main>
    @vite('resources/js/app.js')
    
</body>
</html>