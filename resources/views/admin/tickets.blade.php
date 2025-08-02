
@extends('layouts.admin')

@section('content')
<div x-data="{ isModalOpen: false, isEditModalOpen: false, isDeleteModalOpen: false, ticketToEdit: null, ticketToDelete: null }">
    <x-admin.tabla-crud>
        <x-slot name="titulo">
            <h2 class="text-2xl text-gray-800 nunito-bold">Gestión de Tickets</h2>
        </x-slot>
        <x-slot name="filtros">
            <input type="text" placeholder="Buscar ticket..." class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
            <select class="border rounded px-1 py-2 text-sm w-full sm:w-40">
                <option class="nunito-bold" value="">Todos los estados</option>
                <option class="nunito-bold">Pendiente</option>
                <option class="nunito-bold">En proceso</option>
                <option class="nunito-bold">Finalizado</option>
            </select>
        </x-slot>
        <x-slot name="boton">
            <button @click="isModalOpen = true" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Nuevo ticket</button>
        </x-slot>
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 nunito-bold">
                    <tr>
                        <th class="py-2 px-4 text-left">Número</th>
                        <th class="py-2 px-4 text-left">Cliente</th>
                        <th class="py-2 px-4 text-left">Fecha</th>
                        <th class="py-2 px-4 text-left">Estado</th>
                        <th class="py-2 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b nunito-regular">
                        <td class="py-2 px-4">T-2025-001</td>
                        <td class="py-2 px-4">Empresa Ejemplo S.A.</td>
                        <td class="py-2 px-4">26/07/2025</td>
                        <td class="py-2 px-4">
                            <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded">Pendiente</span>
                        </td>
                        <td class="py-2 px-4 flex gap-2">
                            <a href="#" @click="isEditModalOpen = true; ticketToEdit = {numero: 'T-2025-001', cliente: 'Empresa Ejemplo S.A.', fecha: '26/07/2025', estado: 'Pendiente'}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                            <a href="#" @click="isDeleteModalOpen = true; ticketToDelete = {numero: 'T-2025-001'}" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr class="border-b nunito-regular">
                        <td class="py-2 px-4">T-2025-002</td>
                        <td class="py-2 px-4">Bac Credomatic</td>
                        <td class="py-2 px-4">27/07/2025</td>
                        <td class="py-2 px-4">
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded">En proceso</span>
                        </td>
                        <td class="py-2 px-4 flex gap-2">
                            <a href="#" @click="isEditModalOpen = true; ticketToEdit = {numero: 'T-2025-002', cliente: 'Bac Credomatic', fecha: '27/07/2025', estado: 'En proceso'}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                            <a href="#" @click="isDeleteModalOpen = true; ticketToDelete = {numero: 'T-2025-002'}" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr class="border-b nunito-regular">
                        <td class="py-2 px-4">T-2025-003</td>
                        <td class="py-2 px-4">Ficohsa</td>
                        <td class="py-2 px-4">28/07/2025</td>
                        <td class="py-2 px-4">
                            <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded">Finalizado</span>
                        </td>
                        <td class="py-2 px-4 flex gap-2">
                            <a href="#" @click="isEditModalOpen = true; ticketToEdit = {numero: 'T-2025-003', cliente: 'Ficohsa', fecha: '28/07/2025', estado: 'Finalizado'}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                            <a href="#" @click="isDeleteModalOpen = true; ticketToDelete = {numero: 'T-2025-003'}" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </x-admin.tabla-crud>

    <!-- Modal Nuevo Ticket -->
    <x-admin.form-modal 
        modalName="isModalOpen" 
        title="Nuevo Ticket" 
        submitLabel="Guardar Ticket">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="numero" class="block text-sm font-medium text-gray-700">Número</label>
                <input type="text" id="numero" name="numero" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="cliente" class="block text-sm font-medium text-gray-700">Cliente</label>
                <input type="text" id="cliente" name="cliente" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
                <input type="date" id="fecha" name="fecha" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                <select id="estado" name="estado" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
                    <option>Pendiente</option>
                    <option>En proceso</option>
                    <option>Finalizado</option>
                </select>
            </div>
        </div>
    </x-admin.form-modal>

    <!-- Modal Editar Ticket -->
    <x-admin.edit-modal 
        modalName="isEditModalOpen" 
        title="Editar Ticket" 
        itemToEdit="ticketToEdit">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="edit_numero" class="block text-sm font-medium text-gray-700">Número</label>
                <input type="text" id="edit_numero" name="edit_numero" :value="ticketToEdit.numero" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_cliente" class="block text-sm font-medium text-gray-700">Cliente</label>
                <input type="text" id="edit_cliente" name="edit_cliente" :value="ticketToEdit.cliente" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
                <input type="date" id="edit_fecha" name="edit_fecha" :value="ticketToEdit.fecha" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="edit_estado" class="block text-sm font-medium text-gray-700">Estado</label>
                <select id="edit_estado" name="edit_estado" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
                    <option :selected="ticketToEdit.estado === 'Pendiente'">Pendiente</option>
                    <option :selected="ticketToEdit.estado === 'En proceso'">En proceso</option>
                    <option :selected="ticketToEdit.estado === 'Finalizado'">Finalizado</option>
                </select>
            </div>
        </div>
    </x-admin.edit-modal>

    <!-- Modal Confirmar Eliminación Ticket -->
    <x-admin.confirmation-modal
        modalName="isDeleteModalOpen"
        itemToDelete="ticketToDelete"
        message="¿Estás seguro de que quieres eliminar el ticket?"
    />
</div>
@endsection
