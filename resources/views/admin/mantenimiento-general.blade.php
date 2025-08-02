@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-8" x-data="{
    tab: 'personalizacion',
    logoUrl: '/images/logo.png',
    tema: 'claro',
    nombreSistema: 'HARDLAN',
    colorPrimario: '#0056b3',
}">
    <h1 class="text-2xl font-bold mb-6">Personalización del Sistema</h1>

    <div class="flex border-b mb-6 gap-4">
        <button @click="tab = 'personalizacion'"
            :class="tab === 'personalizacion' ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-700'"
            class="px-4 py-2 font-semibold focus:outline-none">Personalización</button>
        <button @click="tab = 'parametros'"
            :class="tab === 'parametros' ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-700'"
            class="px-4 py-2 font-semibold focus:outline-none">Parámetros</button>
    </div>

    <!-- TAB Personalización -->
    <div x-show="tab === 'personalizacion'" class="bg-white rounded-lg shadow p-6 mb-8">
        <h2 class="text-lg font-semibold mb-4">Apariencia e Identidad</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block font-medium mb-1">Logo del sistema</label>
                <img :src="logoUrl" alt="Logo actual" class="h-16 mb-2">
                <input type="file" class="block mb-2" @change="/* lógica para subir logo */">
            </div>
            <div>
                <label class="block font-medium mb-1">Tema</label>
                <select x-model="tema" class="border rounded px-3 py-2 w-full">
                    <option value="claro">Claro</option>
                    <option value="oscuro">Oscuro</option>
                </select>
            </div>
            <div>
                <label class="block font-medium mb-1">Color Primario</label>
                <input type="color" x-model="colorPrimario" class="w-16 h-10 p-0 border-0">
            </div>

        </div>
        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block font-medium mb-1">Nombre del sistema</label>
                <input type="text" x-model="nombreSistema" class="border rounded px-3 py-2 w-full">
            </div>
        </div>
    </div>

    <!-- TAB Parámetros -->
    <div x-show="tab === 'parametros'" class="bg-white rounded-lg shadow p-6">
        <h2 class="text-lg font-semibold mb-4">Parámetros Generales</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block font-medium mb-1">Zona horaria</label>
                <select class="border rounded px-3 py-2 w-full">
                    <option>America/Tegucigalpa</option>
                    <option>America/Mexico_City</option>
                    <option>UTC</option>
                </select>
            </div>
            <div>
                <label class="block font-medium mb-1">Formato de fecha</label>
                <select class="border rounded px-3 py-2 w-full">
                    <option value="d/m/Y">dd/mm/yyyy</option>
                    <option value="m/d/Y">mm/dd/yyyy</option>
                    <option value="Y-m-d">yyyy-mm-dd</option>
                </select>
            </div>
            <div>
                <label class="block font-medium mb-1">Límite de sesiones</label>
                <input type="number" min="1" max="5" value="2" class="border rounded px-3 py-2 w-full">
            </div>
        </div>
    </div>
</div>
@endsection