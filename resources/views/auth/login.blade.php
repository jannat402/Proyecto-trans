@extends('layout.app')

@section('title', 'Iniciar sesión')

@section('content')

<div class="max-w-md mx-auto bg-white shadow p-6 rounded-lg">

    <h2 class="text-2xl font-bold mb-4 text-center">Iniciar sesión</h2>

    @if($errors->any())
        <p class="text-blue-500 mb-3">{{ $errors->first() }}</p>
    @endif

    <form action="/login" method="POST">
        @csrf

        <label class="block mb-3">
            <span>Email</span>
            <input type="email" name="email" class="w-full border p-2 rounded" required>
        </label>

        <label class="block mb-3">
            <span>Contraseña</span>
            <input type="password" name="password" class="w-full border p-2 rounded" required>
        </label>

        <button class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-700">
            Entrar
        </button>
    </form>

    <p class="mt-4 text-center">
        ¿No tienes cuenta?
        <a href="/register" class="text-blue-500">Regístrate</a>
    </p>

</div>

@endsection
