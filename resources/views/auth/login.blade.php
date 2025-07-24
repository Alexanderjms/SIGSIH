@extends('layouts.auth')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen bg-gray-900">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-16">
        </div>
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6 nunito-bold">Iniciar Sesión</h2>
        <form>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Correo electrónico</label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="email" type="email" placeholder="usuario@correo.com">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Contraseña</label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    id="password" type="password" placeholder="********">
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full"
                    type="button">
                    Ingresar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection