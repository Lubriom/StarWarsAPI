<!DOCTYPEHTML>
<html lang="es">
<head>
    @include("components.head")
    <title>@yield('titulo') - API</title>
</head>
<body>
<div
    class="bg-[url(https://images.pexels.com/photos/956981/milky-way-starry-sky-night-sky-star-956981.jpeg?cs=srgb&dl=pexels-felixmittermeier-956981.jpg&fm=jpg)] text-white">
    <div class="bg-black/10 backdrop-blur-xs min-h-screen flex flex-col">

        @include("components.header")
        @yield('header')
        <main class="p-12 flex-grow">
            <div class="bg-white/10 backdrop-blur-md p-6 rounded-lg">
                @yield('content')
            </div>
        </main>
        @include("components.footer")
    </div>
</div>
</body>
</html>
