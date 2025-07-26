@extends('layouts.admin')

@section('page-header')
@include('partials.admin-header')
@endsection

@section('content')
<div class="bg-white rounded-lg shadow p-6 mb-8 transition-colors">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-bold">Lista de Usuarios</h2>
        <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold transition">Nuevo usuario</a>
    </div>
    <table class="min-w-full text-sm">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-2 px-4 text-left">Nombre</th>
                <th class="py-2 px-4 text-left">Usuario</th>
                <th class="py-2 px-4 text-left">Perfil</th>
                <th class="py-2 px-4 text-left">Estado</th>
                <th class="py-2 px-4 text-left">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="py-2 px-4">Juan Pérez</td>
                <td class="py-2 px-4">jperez</td>
                <td class="py-2 px-4">Técnico</td>
                <td class="py-2 px-4"><span class="bg-green-100 text-green-700 px-2 py-1 rounded">Activo</span></td>
                <td class="py-2 px-4 flex gap-2">
                    <a href="#" class="text-blue-500 hover:underline">Editar</a>
                    <a href="#" class="text-red-500 hover:underline">Eliminar</a>
                </td>
            </tr>
            <tr>
                <td class="py-2 px-4">Ana López</td>
                <td class="py-2 px-4">alopez</td>
                <td class="py-2 px-4">Admin</td>
                <td class="py-2 px-4"><span class="bg-green-100 text-green-700 px-2 py-1 rounded">Activo</span></td>
                <td class="py-2 px-4 flex gap-2">
                    <a href="#" class="text-blue-500 hover:underline">Editar</a>
                    <a href="#" class="text-red-500 hover:underline">Eliminar</a>
                </td>
            </tr>
            <tr>
                <td class="py-2 px-4">Carlos Ruiz</td>
                <td class="py-2 px-4">cruiz</td>
                <td class="py-2 px-4">Cliente</td>
                <td class="py-2 px-4"><span class="bg-red-100 text-red-700 px-2 py-1 rounded">Inactivo</span></td>
                <td class="py-2 px-4 flex gap-2">
                    <a href="#" class="text-blue-500 hover:underline">Editar</a>
                    <a href="#" class="text-red-500 hover:underline">Eliminar</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection