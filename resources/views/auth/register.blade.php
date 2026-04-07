@extends('layout.app')

@section('title', 'Registro')

@section('content')

<div class="max-w-md mx-auto bg-white shadow p-8 rounded-lg">
    <h2 class="text-2xl font-bold mb-4 text-center">Crear cuenta</h2>

    @if($errors->any())
        <p class="text-pink-500 mb-3">{{ $errors->first() }}</p>
    @endif

    <form id="formRegister" method="POST" action="{{ route('register') }}">
        @csrf

        <!-- NOMBRE Y APELLIDOS -->
        <label class="block font-semibold">Nombre y apellidos</label>
        <input type="text" id="nom" name="nom"
               class="input"
               placeholder="Ej: María García López">
        <p id="nomError" class="error"></p>

        <!-- FECHA DE NACIMIENTO -->
        <label class="block font-semibold mt-4">Fecha de nacimiento</label>
        <input type="date" id="naixement" name="naixement" class="input">
        <p id="naixementError" class="error"></p>

        <!-- TELÉFONO -->
        <label class="block font-semibold mt-4">Teléfono (+XX)</label>
        <input type="text" id="telefon" name="telefon" class="input" placeholder="+34 612345678">
        <p id="telefonError" class="error"></p>

        <!-- DIRECCIÓN DE ENVÍO -->
        <label class="block font-semibold mt-4">Dirección de envío</label>
        <input type="text" id="adreca" name="adreca" class="input">
        <p id="adrecaError" class="error"></p>

        <!-- DIRECCIÓN DE FACTURACIÓN -->
        <div class="flex items-center mt-4">
            <input type="checkbox" id="mateixa" class="mr-2">
            <label for="mateixa">La facturación es igual que el envío</label>
        </div>

        <label class="block font-semibold mt-2">Dirección de facturación</label>
        <input type="text" id="facturacio" name="facturacio" class="input">
        <p id="facturacioError" class="error"></p>

        <!-- CAMPOS EXTRA -->
        <label class="block font-semibold mt-4">Preferencia de contacto</label>
        <select id="preferencia" name="preferencia" class="input">
            <option value="">Selecciona...</option>
            <option value="email">Email</option>
            <option value="telefon">Teléfono</option>
        </select>
        <p id="preferenciaError" class="error"></p>

        <label class="block font-semibold mt-4">Interés principal</label>
        <input type="text" id="interes" name="interes" class="input" placeholder="Ej: Electrónica, Moda...">
        <p id="interesError" class="error"></p>

        <!-- EMAIL -->
        <label class="block font-semibold mt-4">Email</label>
        <input type="email" id="email" name="email" class="input">
        <p id="emailError" class="error"></p>

        <!-- CONTRASEÑA -->
        <label class="block font-semibold mt-4">Contraseña</label>
        <input type="password" id="password" name="password" class="input">
        <meter id="passwordMeter" min="0" max="4" value="0" class="w-full mt-1"></meter>
        <p id="passwordError" class="error"></p>

        <!-- CONFIRMAR CONTRASEÑA -->
        <label class="block font-semibold mt-4">Confirmar contraseña</label>
        <input type="password" id="password2" name="password_confirmation" class="input">
        <p id="password2Error" class="error"></p>

        <!-- BOTÓN -->
        <button id="btnSubmit"
                class="bg-blue-600 text-white px-6 py-2 rounded mt-6 opacity-50 cursor-not-allowed"
                disabled>
            Registrarse
        </button>

    </form>

</div>

@endsection

