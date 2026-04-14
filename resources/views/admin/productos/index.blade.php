@extends('admin.layout')

@section('title', 'Productos')

@section('content')

<h1 class="text-3xl font-bold mb-4">Gestió de productes</h1>

<!-- ORDENAR PER ESTOC -->
<a href="{{ route('admin.productos.index', ['orden' => 'asc']) }}"
   class="px-4 py-2 bg-blue-500 text-white rounded">Ordenar per estoc (asc)</a>

<a href="{{ route('admin.productos.index', ['orden' => 'desc']) }}"
   class="px-4 py-2 bg-blue-500 text-white rounded">Ordenar per estoc (desc)</a>

<table class="w-full mt-6 border">
    <thead>
        <tr class="bg-gray-200">
            <th class="p-2 border">ID</th>
            <th class="p-2 border">Nom</th>
            <th class="p-2 border">Preu</th>
            <th class="p-2 border">Estoc</th>
            <th class="p-2 border">Vendes</th>
            <th class="p-2 border">Estat</th>
        </tr>
    </thead>

    <tbody>
        @foreach($productos as $p)
        <tr class="text-center">
            <td class="border p-2">{{ $p->id }}</td>
            <td class="border p-2">{{ $p->nombre }}</td>
            <td class="border p-2">{{ $p->precio }} €</td>
            <td class="border p-2">{{ $p->stock }}</td>
            <td class="border p-2">{{ $p->total_vendido }}</td>

            <td class="border p-2">
                @if($p->stock == 0)
                    <span class="text-red-600 font-bold">ESGOTAT</span>
                @else
                    <span class="text-green-600 font-bold">Disponible</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- FORMULARI DESCOMPTE GLOBAL -->
<h2 class="text-xl font-bold mt-8">Aplicar descompte global</h2>

<form action="{{ route('admin.productos.descuento') }}" method="POST" class="mt-4">
    @csrf
    <input type="number" name="porcentaje" placeholder="Percentatge (%)"
           class="border p-2 rounded">
    <button class="bg-green-600 text-white px-4 py-2 rounded">Aplicar</button>
</form>

<!-- GRÀFIC -->
<h2 class="text-xl font-bold mt-8">Gràfic de vendes</h2>

<canvas id="graficoVendes" width="400" height="200"></canvas>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
fetch("{{ route('admin.productos.ventasData') }}")
    .then(r => r.json())
    .then(data => {
        new Chart(document.getElementById('graficoVendes'), {
            type: 'bar',
            data: {
                labels: data.labels,
                datasets: [{
                    label: 'Unitats venudes',
                    data: data.data,
                    backgroundColor: 'rgba(54, 162, 235, 0.7)'
                }]
            }
        });
    });
</script>
@endsection
