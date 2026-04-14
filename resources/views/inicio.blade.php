@extends('layout.app')

@section('title', 'Inicio')

@section('content')

<!-- HERO -->
<section class="bg-blue-400 text-white text-center py-16">
    <h2 class="text-4xl font-bold mb-4">Todo para tu perro y tu gato</h2>
    <p class="text-lg">Piensos, higiene y accesorios al mejor precio</p>
</section>

<!-- CATEGORÍAS -->
<section class="max-w-6xl mx-auto mt-12">
    <h3 class="text-2xl font-bold mb-6">Categorías</h3>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <a href="/productos?categoria=pienso" class="bg-white shadow rounded-lg p-6 text-center hover:shadow-lg transition">
            <img src="https://cdn-icons-png.flaticon.com/512/194/194279.png" class="w-20 mx-auto mb-4">
            <h4 class="text-xl font-semibold">Piensos</h4>
        </a>

        <a href="/productos?categoria=higiene" class="bg-white shadow rounded-lg p-6 text-center hover:shadow-lg transition">
            <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" class="w-20 mx-auto mb-4">
            <h4 class="text-xl font-semibold">Higiene</h4>
        </a>

        <a href="/productos?categoria=accesorios" class="bg-white shadow rounded-lg p-6 text-center hover:shadow-lg transition">
            <img src="https://cdn-icons-png.flaticon.com/512/616/616430.png" class="w-20 mx-auto mb-4">
            <h4 class="text-xl font-semibold">Accesorios</h4>
        </a>

    </div>
</section>

@endsection
