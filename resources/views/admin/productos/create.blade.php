@extends('admin.layout')

@section('title', 'Crear producto')

@section('content')

<h1 class="text-3xl font-bold mb-6">Crear producto</h1>

<form class="bg-white shadow p-6 rounded-lg max-w-xl">

    <label class="block mb-3">
        <span class="text-gray-700">Nombre</span>
        <input type="text" class="w-full border p-2 rounded">
    </label>

    <label class="block mb-3">
        <span class="text-gray-700">Precio</span>
        <input type="number" class="w-full border p-2 rounded">
    </label>

    <label class="block mb-3">
        <span class="text-gray-700">Descripción</span>
        <textarea class="w-full border p-2 rounded"></textarea>
    </label>

    <button class="bg-green-600 text-white px-4 py-2 rounded">Guardar</button>

</form>

@endsection
