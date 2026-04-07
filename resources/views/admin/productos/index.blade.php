@extends('admin.layout')

@section('title', 'Productos')

@section('content')

<h1 class="text-3xl font-bold mb-6">Productos</h1>

<a href="/admin/productos/crear" class="bg-green-600 text-white px-4 py-2 rounded mb-6 inline-block">
    + Crear producto
</a>

<table class="w-full bg-white shadow rounded-lg overflow-hidden">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-3 text-left">ID</th>
            <th class="p-3 text-left">Nombre</th>
            <th class="p-3 text-left">Precio</th>
            <th class="p-3 text-left">Acciones</th>
        </tr>
    </thead>

    <tbody>
        <tr class="border-b">
            <td class="p-3">1</td>
            <td class="p-3">Pienso perro adulto</td>
            <td class="p-3">29,99 €</td>
            <td class="p-3">
                <a href="/admin/productos/1/editar" class="text-blue-600">Editar</a>
            </td>
        </tr>
    </tbody>
</table>

@endsection
