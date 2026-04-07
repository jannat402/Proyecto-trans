@extends('layout.app')

@section('title', $producto->nombre)

@section('content')

<div class="max-w-4xl mx-auto bg-white shadow p-6 rounded-lg">

    {{-- Imagen del producto --}}
    <img src="{{ $producto->imagen }}" 
         alt="{{ $producto->nombre }}" 
         class="rounded mb-6 w-full max-h-96 object-cover">

    {{-- Nombre --}}
    <h2 class="text-3xl font-bold mb-2">{{ $producto->nombre }}</h2>

    {{-- Descripción --}}
    <p class="text-gray-600 mb-4">
        {{ $producto->descripcion }}
    </p>

    {{-- Precio --}}
    <p class="text-2xl font-bold mb-6 text-green-700">
        {{ number_format($producto->precio, 2) }} €
    </p>

    {{-- Botón añadir al carrito (localStorage) --}}
    <button
        onclick="agregarAlCarrito({
            id: {{ $producto->id }},
            nombre: '{{ $producto->nombre }}',
            precio: {{ $producto->precio }},
            imagen: '{{ $producto->imagen }}'
        })"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
    >
        Añadir al carrito
    </button>

    {{-- Botón volver --}}
    <a href="{{ url()->previous() }}"
       class="ml-4 text-gray-600 underline hover:text-gray-800">
        Volver
    </a>

</div>

@endsection
