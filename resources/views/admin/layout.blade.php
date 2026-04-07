<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Panel Admin')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-gray-900 text-white min-h-screen p-6">
        <h2 class="text-2xl font-bold mb-6">Admin</h2>

        <ul class="space-y-4">
            <li><a href="/admin" class="hover:text-blue-400">Dashboard</a></li>
            <li><a href="/admin/productos" class="hover:text-blue-400">Productos</a></li>
        </ul>
    </aside>

    <!-- CONTENIDO -->
    <main class="flex-1 p-10">
        @yield('content')
    </main>

</body>
</html>
