@props(['navLinks'])

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/google-libphonenumber/3.2.39/libphonenumber.js" integrity="sha512-1n/KXVQgB6fZi/6dc6+yGx4HC6OvsyTI0DDeBIhBgg0x322ZnzJP0WMQklmFc4poHrJRyT7urpbrGITM5vNBVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite("resources/css/app.css")
</head>
<body>
    <main class="flex relative bg-gray-50 ">
        <x-leftSidebar :navLinks="$navLinks" />
        <section class="w-full py-2 relative">
            <x-navBar/>
            <div class="px-2 flex relative"> 
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