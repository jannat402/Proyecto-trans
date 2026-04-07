<div class="bg-white shadow rounded-lg p-4 hover:shadow-lg transition">

    <!-- Imagen -->
    <img src="{{ $imagen }}" class="rounded mb-3">

    <!-- Nombre -->
    <h4 class="text-lg font-semibold">{{ $nombre }}</h4>

    <!-- Descripción -->
    <p class="text-gray-600">{{ $descripcion }}</p>

    <!-- Precio -->
    <p class="text-xl font-bold mt-2">{{ $precio }}</p>

    <!-- Botón Añadir al carrito -->
    <form action="{{ route('carrito.agregar') }}" method="POST" class="mt-3">
        @csrf

        <!-- Datos del producto -->
        <input type="hidden" name="id" value="{{ $id ?? 1 }}">
        <input type="hidden" name="nombre" value="{{ $nombre }}">
        <input type="hidden" name="precio" value="{{ $precio }}">
        <input type="hidden" name="imagen" value="{{ $imagen }}">

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 w-full">
            Añadir al carrito
        </button>
    </form>

    <!-- Botón Ver producto -->
    <a href="/producto/{{ $id ?? 1 }}" 
       class="mt-3 block text-center bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300">
        Ver producto
    </a>

</div>
