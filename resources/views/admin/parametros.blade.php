@extends('layouts.admin')

@section('content')

<div x-data="{
    isCreateModalOpen: false,
    isEditModalOpen: false,
    isDeleteModalOpen: false,
    parametroToEdit: null,
    parametroToDelete: null
}">
    <div class="overflow-x-auto">
        <x-admin.tabla-crud :titulo="'Gestión de Parámetros'">
            <x-slot name="filtros">
                @include('partials.filtros-generales', [
                'searchModel' => 'search',
                'filtrosSelect' => [
                'usuario' => ['label' => 'Usuario', 'options' => ['admin', 'soporte']],
                'creado_por' => ['label' => 'Creador', 'options' => ['admin', 'soporte']]
                ],
                'ordenarOptions' => [
                'parametro' => 'Parámetro',
                'valor' => 'Valor',
                'fecha' => 'Fecha creación'
                ]
                ])
            </x-slot>
            <x-slot name="boton">
                <button @click="isCreateModalOpen = true"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">
                    Agregar parámetro
                </button>
            </x-slot>
            <table class="min-w-full text-xs md:text-sm whitespace-nowrap">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 text-left">Parámetro</th>
                        <th class="py-2 px-4 text-left">Valor</th>
                        <th class="py-2 px-4 text-left">Usuario</th>
                        <th class="py-2 px-4 text-left">Creado por</th>
                        <th class="py-2 px-4 text-left">Fecha creación</th>
                        <th class="py-2 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="parametro in [
                        {parametro: 'Tiempo de sesión', valor: '30', usuario: 'admin', creado_por: 'admin', fecha: '2025-07-31'},
                        {parametro: 'Longitud mínima clave', valor: '8', usuario: 'admin', creado_por: 'soporte', fecha: '2025-07-25'}
                    ]" :key="parametro.parametro">
                        <tr class="border-b">
                            <td class="py-2 px-4" x-text="parametro.parametro"></td>
                            <td class="py-2 px-4" x-text="parametro.valor"></td>
                            <td class="py-2 px-4" x-text="parametro.usuario"></td>
                            <td class="py-2 px-4" x-text="parametro.creado_por"></td>
                            <td class="py-2 px-4" x-text="parametro.fecha"></td>
                            <td class="py-2 px-2 flex gap-2">
                                <a href="#" @click="isEditModalOpen = true; parametroToEdit = parametro"
                                    class="text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" @click="isDeleteModalOpen = true; parametroToDelete = parametro"
                                    class="text-red-600 hover:text-red-800">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </x-admin.tabla-crud>
    </div>

    <!-- Modal Agregar Parámetro -->
    <x-admin.form-modal modalName="isCreateModalOpen" title="Agregar Parámetro" submitLabel="Guardar"
        maxWidth="max-w-xl">
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Parámetro</label>
            <input type="text" class="w-full border rounded px-3 py-2" placeholder="Ej: Tiempo de sesión" />
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Valor</label>
            <input type="text" class="w-full border rounded px-3 py-2" placeholder="Ej: 30" />
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Usuario</label>
            <input type="text" class="w-full border rounded px-3 py-2" placeholder="Ej: admin" />
        </div>
    </x-admin.form-modal>

    <!-- Modal Editar Parámetro -->
    <x-admin.edit-modal modalName="isEditModalOpen" title="Editar Parámetro" itemToEdit="parametroToEdit"
        maxWidth="max-w-xl">
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Parámetro</label>
            <input type="text" class="w-full border rounded px-3 py-2" :value="parametroToEdit?.parametro" />
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Valor</label>
            <input type="text" class="w-full border rounded px-3 py-2" :value="parametroToEdit?.valor" />
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Usuario</label>
            <input type="text" class="w-full border rounded px-3 py-2" :value="parametroToEdit?.usuario" />
        </div>
    </x-admin.edit-modal>

    <!-- Modal Confirmar Eliminación -->
    <x-admin.confirmation-modal modalName="isDeleteModalOpen" itemToDelete="parametroToDelete"
        message="¿Estás seguro de que deseas eliminar este parámetro?" />
</div>

@endsection