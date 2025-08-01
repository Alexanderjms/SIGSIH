
@extends('layouts.admin')

@section('content')
<div x-data="{ isModalOpen: false, isEditModalOpen: false, movimientoToEdit: null, isDeleteModalOpen: false, movimientoToDelete: null }">
    <x-admin.tabla-crud>
        <x-slot name="titulo">
            <h2 class="text-2xl text-gray-800 nunito-bold">Kardex</h2>
        </x-slot>
        <x-slot name="filtros">
            <input type="text" placeholder="Buscar movimiento..." class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
            <select class="border rounded px-1 py-2 text-sm w-full sm:w-40">
                <option value="">Todos los productos</option>
                <option>Producto Ejemplo</option>
                <option>Producto 2</option>
            </select>
            <select class="border rounded px-1 py-2 text-sm w-full sm:w-40">
                <option value="">Todos los tipos</option>
                <option>Entrada</option>
                <option>Salida</option>
            </select>
        </x-slot>
        <x-slot name="boton">
            <button @click="isModalOpen = true" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Nuevo movimiento</button>
        </x-slot>
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 nunito-bold">
                    <tr>
                        <th class="py-2 px-4 text-left">ID</th>
                        <th class="py-2 px-4 text-left">Producto</th>
                        <th class="py-2 px-4 text-left">Fecha</th>
                        <th class="py-2 px-4 text-left">Tipo</th>
                        <th class="py-2 px-4 text-left">Cantidad</th>
                        <th class="py-2 px-4 text-left">Saldo</th>
                        <th class="py-2 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b nunito-regular">
                        <td class="py-2 px-4">1</td>
                        <td class="py-2 px-4">Producto Ejemplo</td>
                        <td class="py-2 px-4">2025-07-26</td>
                        <td class="py-2 px-4">Entrada</td>
                        <td class="py-2 px-4">10</td>
                        <td class="py-2 px-4">60</td>
                        <td class="py-2 px-4 flex gap-2">
                            <a href="#" @click="isEditModalOpen = true; movimientoToEdit = {id: 1, producto: 'Producto Ejemplo', fecha: '2025-07-26', tipo: 'Entrada', cantidad: 10, saldo: 60}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                            <a href="#" @click="isDeleteModalOpen = true; movimientoToDelete = {id: 1, producto: 'Producto Ejemplo'}" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <!-- Más movimientos aquí -->
                </tbody>
            </table>
        </div>
    </x-admin.tabla-crud>

    <!-- Modal Nuevo Movimiento -->
    <div x-show="isModalOpen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <h3 class="text-lg font-bold mb-4">Nuevo Movimiento</h3>
            <form>
                <select class="border rounded px-3 py-2 mb-2 w-full">
                    <option>Producto Ejemplo</option>
                    <option>Producto 2</option>
                </select>
                <input type="date" class="border rounded px-3 py-2 mb-2 w-full" />
                <select class="border rounded px-3 py-2 mb-2 w-full">
                    <option>Entrada</option>
                    <option>Salida</option>
                </select>
                <input type="number" placeholder="Cantidad" class="border rounded px-3 py-2 mb-2 w-full" />
                <input type="number" placeholder="Saldo" class="border rounded px-3 py-2 mb-2 w-full" />
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" @click="isModalOpen = false" class="px-4 py-2 bg-gray-300 rounded">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Guardar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Editar Movimiento -->
    <div x-show="isEditModalOpen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <h3 class="text-lg font-bold mb-4">Editar Movimiento</h3>
            <form>
                <select x-model="movimientoToEdit.producto" class="border rounded px-3 py-2 mb-2 w-full">
                    <option>Producto Ejemplo</option>
                    <option>Producto 2</option>
                </select>
                <input type="date" x-model="movimientoToEdit.fecha" class="border rounded px-3 py-2 mb-2 w-full" />
                <select x-model="movimientoToEdit.tipo" class="border rounded px-3 py-2 mb-2 w-full">
                    <option>Entrada</option>
                    <option>Salida</option>
                </select>
                <input type="number" x-model="movimientoToEdit.cantidad" class="border rounded px-3 py-2 mb-2 w-full" />
                <input type="number" x-model="movimientoToEdit.saldo" class="border rounded px-3 py-2 mb-2 w-full" />
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" @click="isEditModalOpen = false" class="px-4 py-2 bg-gray-300 rounded">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Actualizar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Eliminar Movimiento -->
    <div x-show="isDeleteModalOpen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <h3 class="text-lg font-bold mb-4">Eliminar Movimiento</h3>
            <p>¿Seguro que deseas eliminar el movimiento de <span class="font-bold" x-text="movimientoToDelete.producto"></span>?</p>
            <div class="flex justify-end gap-2 mt-4">
                <button type="button" @click="isDeleteModalOpen = false" class="px-4 py-2 bg-gray-300 rounded">Cancelar</button>
                <button type="button" class="px-4 py-2 bg-red-600 text-white rounded">Eliminar</button>
            </div>
        </div>
    </div>
</div>
@endsection
