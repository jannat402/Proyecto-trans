@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')

<h1 class="text-3xl font-bold mb-6">Panel de administración</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="bg-white shadow p-6 rounded-lg">
        <h3 class="text-xl font-semibold">Productos</h3>
        <p class="text-gray-600">Gestiona todos los productos</p>
        <a href="/admin/productos" class="mt-3 inline-block bg-blue-600 text-white px-4 py-2 rounded">Entrar</a>
    </div>

    <div class="bg-white shadow p-6 rounded-lg">
        <h3 class="text-xl font-semibold">Pedidos</h3>
        <p class="text-gray-600">Ver pedidos de clientes</p>
        <span class="mt-3 inline-block bg-gray-400 text-white px-4 py-2 rounded">Próximamente</span>
    </div>

    <div class="bg-white shadow p-6 rounded-lg">
        <h3 class="text-xl font-semibold">Usuarios</h3>
        <p class="text-gray-600">Administrar usuarios</p>
        <span class="mt-3 inline-block bg-gray-400 text-white px-4 py-2 rounded">Próximamente</span>
    </div>

</div>

@endsection
