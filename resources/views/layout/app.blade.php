<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'PetShop')</title>
    <script src="{{ asset('js/carrito.js') }}"></script>
    <script src="{{ asset('js/register.js') }}"></script>
    @vite('resources/css/app.css')
</head>
<script>
document.addEventListener("DOMContentLoaded", () => {
    @auth
        let carrito = localStorage.getItem('carrito');
        if (carrito) {
            fetch("{{ route('carrito.sincronizar') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: carrito
            }).then(res => res.json())
              .then(data => {
                  if (data.status === 'ok') {
                      localStorage.removeItem('carrito');
                  }
              });
        }
    @endauth
});
</script>

<body class="bg-gray-100">

    <!-- HEADER CON BUSCADOR -->
    <header class="bg-white shadow-md p-4 flex justify-between items-center">

    <!-- Logo -->
    <h1 class="text-2xl font-bold text-pink-500">
        <a href="/">PetShop</a>
    </h1>

    <!-- Buscador -->
    <form action="/buscar" method="GET" class="w-1/2">
        <input 
            type="text" 
            name="q" 
            placeholder="Buscar productos..." 
            class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"
        >
    </form>

    <div class="flex items-center gap-4">

        <!-- Carrito -->
        <a href="/carrito" class="bg-pink-500 text-white px-4 py-2 rounded hover:bg-pink-700">
            Carrito
        </a>

        <!-- Si el usuario está logueado -->
        @auth
        <form action="/logout" method="POST">
            @csrf
            <button class="bg-pink-500 text-white px-4 py-2 rounded hover:bg-pink-700">
                Cerrar sesión
            </button>
        </form>
        @endauth

        <!-- Si NO está logueado -->
        @guest
        <a href="/login" class="bg-pink-500 text-white px-4 py-2 rounded hover:bg-pink-700">Iniciar sesión</a>
        @endguest

    </div>

    </header>

    <!-- CONTENIDO -->
    <main class="py-10">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-gray-800 text-white text-center py-6 mt-10">
        <p class="text-sm">© 2026 PetShop. Todos los derechos reservados.</p>
    </footer>

</body>
</html>
