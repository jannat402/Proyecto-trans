@extends('layout.app')

@section('title', 'Registro')

@section('content')

<div class="max-w-md mx-auto bg-white shadow p-6 rounded-lg">

    <h2 class="text-2xl font-bold mb-4 text-center">Crear cuenta</h2>

    @if($errors->any())
        <p class="text-pink-500 mb-3">{{ $errors->first() }}</p>
    @endif

    <form action="/register" method="POST">
        @csrf

        <label class="block mb-3">
            <span>Nombre</span>
            <input type="text" name="name" class="w-full border p-2 rounded" required>
        </label>

        <label class="block mb-3">
            <span>Email</span>
            <input type="email" name="email" class="w-full border p-2 rounded" required>
        </label>

        <label class="block mb-3">
            <span>Contraseña</span>
            <input type="password" name="password" class="w-full border p-2 rounded" required>
        </label>

        <button class="w-full bg-pink-500 text-white py-2 rounded hover:bg-pink-700">
            Registrarse
        </button>
    </form>

    <p class="mt-4 text-center">
        ¿Ya tienes cuenta?
        <a href="/login" class="text-blue-600">Inicia sesión</a>
    </p>

</div>

@endsection
