@extends('layout.app')

@section('content')

<h1 class="text-2xl font-bold mb-4">Carrito</h1>

@if(empty($carrito))
    <p>No hay productos en el carrito.</p>
@else
    <table class="w-full border">
        <thead>
            <tr>
                <th class="border p-2">Producto</th>
                <th class="border p-2">Precio</th>
                <th class="border p-2">Cantidad</th>
                <th class="border p-2">Total</th>
                <th class="border p-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($carrito as $item)
                @php $subtotal = $item['precio'] * $item['cantidad']; $total += $subtotal; @endphp
                <tr>
                    <td class="border p-2">{{ $item['nombre'] }}</td>
                    <td class="border p-2">{{ $item['precio'] }} €</td>
                    <td class="border p-2">{{ $item['cantidad'] }}</td>
                    <td class="border p-2">{{ $subtotal }} €</td>
                    <td class="border p-2">
                        <form action="{{ route('carrito.eliminar') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item['id'] }}">
                            <button class="text-red-600">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" class="border p-2 text-right font-bold">Total</td>
                <td class="border p-2 font-bold">{{ $total }} €</td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <form action="{{ route('carrito.vaciar') }}" method="POST" class="mt-4 inline-block">
        @csrf
        <button class="bg-gray-400 text-white px-4 py-2 rounded">Vaciar carrito</button>
    </form>

    @auth
    <form action="{{ route('checkout') }}" method="POST" class="mt-4 inline-block">
        @csrf
        <button class="bg-green-600 text-white px-4 py-2 rounded">Finalizar compra</button>
    </form>
    @else
        <p class="mt-4 text-red-600">Debes iniciar sesión para finalizar la compra.</p>
        <a href="{{ route('login') }}" class="text-blue-600 underline">Iniciar sesión</a>
    @endauth

@endif

@endsection
