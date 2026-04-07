@extends('layout.app')

@section('title', 'Productos')

@section('content')

<div class="max-w-6xl mx-auto">
    <h2 class="text-3xl font-bold mb-6">Catálogo de productos</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        @include('partials.product-card', [
            'nombre' => 'Pienso perro adulto 12kg',
            'precio' => '29,99 €',
            'descripcion' => 'Alta calidad',
            'imagen' => 'https://m.media-amazon.com/images/I/71pQe6hw2vL.jpg'
        ])

        @include('partials.product-card', [
            'nombre' => 'Arena para gatos 10L',
            'precio' => '8,99 €',
            'descripcion' => 'Aglomerante premium',
            'imagen' => 'https://m.media-amazon.com/images/I/71pQe6hw2vL.jpg'
        ])

        @include('partials.product-card', [
            'nombre' => 'Juguete mordedor',
            'precio' => '6,50 €',
            'descripcion' => 'Perros medianos',
            'imagen' => 'https://m.media-amazon.com/images/I/71pQe6hw2vL.jpg'
        ])

    </div>
</div>

@endsection
