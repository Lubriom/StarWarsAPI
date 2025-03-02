<header class="bg-black/20 p-6 backdrop-blur-xs">
    <nav>
        <ul class="flex flex-row">
            <li class="mx-4">
                <a href="{{route('home')}}" class="bg-black hover:bg-gray-800 py-4 px-7 rounded-full">Inicio</a>
            </li>
            <li class="mx-4">
                <a href="{{route('cliente.index')}}" class="bg-black hover:bg-gray-800 py-4 px-7 rounded-full">Cliente: Peliculas</a>
            </li>
            <li class="mx-4">
                <a href="{{ route('personajes.index') }}" class="bg-black text-white hover:bg-gray-800 py-4 px-7 rounded-full">
                    Personajes
                </a>
            </li>
        </ul>
    </nav>
</header>
