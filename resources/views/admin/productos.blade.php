
@extends('layouts.admin')

@section('content')
<div x-data="{ isModalOpen: false, isEditModalOpen: false, productoToEdit: null, isDeleteModalOpen: false, productoToDelete: null }">
    <x-admin.tabla-crud>
        <x-slot name="titulo">
            <h2 class="text-2xl text-gray-800 nunito-bold">Productos</h2>
        </x-slot>
        <x-slot name="filtros">
            <input type="text" placeholder="Buscar producto..." class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
            <select class="border rounded px-1 py-2 text-sm w-full sm:w-40">
                <option value="">Todas las categorías</option>
                <option>General</option>
                <option>Electrónica</option>
                <option>Alimentos</option>
                <option>Ropa</option>
            </select>
        </x-slot>
        <x-slot name="boton">
            <button @click="isModalOpen = true" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Nuevo producto</button>
        </x-slot>
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 nunito-bold">
                    <tr>
                        <th class="py-2 px-4 text-left">ID</th>
                        <th class="py-2 px-4 text-left">Nombre</th>
                        <th class="py-2 px-4 text-left">Categoría</th>
                        <th class="py-2 px-4 text-left">Precio</th>
                        <th class="py-2 px-4 text-left">Stock</th>
                        <th class="py-2 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b nunito-regular">
                        <td class="py-2 px-4">1</td>
                        <td class="py-2 px-4">Producto Ejemplo</td>
                        <td class="py-2 px-4">General</td>
                        <td class="py-2 px-4">$100.00</td>
                        <td class="py-2 px-4">50</td>
                        <td class="py-2 px-4 flex gap-2">
                            <a href="#" @click="isEditModalOpen = true; productoToEdit = {id: 1, nombre: 'Producto Ejemplo', categoria: 'General', precio: 100.00, stock: 50}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                            <a href="#" @click="isDeleteModalOpen = true; productoToDelete = {id: 1, nombre: 'Producto Ejemplo'}" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <!-- Más productos aquí -->
                </tbody>
            </table>
        </div>
    </x-admin.tabla-crud>

    <!-- Modal Nuevo Producto -->
    <div x-show="isModalOpen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <h3 class="text-lg font-bold mb-4">Nuevo Producto</h3>
            <form>
                <input type="text" placeholder="Nombre" class="border rounded px-3 py-2 mb-2 w-full" />
                <select class="border rounded px-3 py-2 mb-2 w-full">
                    <option>General</option>
                    <option>Electrónica</option>
                    <option>Alimentos</option>
                    <option>Ropa</option>
                </select>
                <input type="number" placeholder="Precio" class="border rounded px-3 py-2 mb-2 w-full" />
                <input type="number" placeholder="Stock" class="border rounded px-3 py-2 mb-2 w-full" />
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" @click="isModalOpen = false" class="px-4 py-2 bg-gray-300 rounded">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Guardar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Editar Producto -->
    <div x-show="isEditModalOpen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <h3 class="text-lg font-bold mb-4">Editar Producto</h3>
            <form>
                <input type="text" x-model="productoToEdit.nombre" class="border rounded px-3 py-2 mb-2 w-full" />
                <select x-model="productoToEdit.categoria" class="border rounded px-3 py-2 mb-2 w-full">
                    <option>General</option>
                    <option>Electrónica</option>
                    <option>Alimentos</option>
                    <option>Ropa</option>
                </select>
                <input type="number" x-model="productoToEdit.precio" class="border rounded px-3 py-2 mb-2 w-full" />
                <input type="number" x-model="productoToEdit.stock" class="border rounded px-3 py-2 mb-2 w-full" />
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" @click="isEditModalOpen = false" class="px-4 py-2 bg-gray-300 rounded">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Actualizar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Eliminar Producto -->
    <div x-show="isDeleteModalOpen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <h3 class="text-lg font-bold mb-4">Eliminar Producto</h3>
            <p>¿Seguro que deseas eliminar <span class="font-bold" x-text="productoToDelete.nombre"></span>?</p>
            <div class="flex justify-end gap-2 mt-4">
                <button type="button" @click="isDeleteModalOpen = false" class="px-4 py-2 bg-gray-300 rounded">Cancelar</button>
                <button type="button" class="px-4 py-2 bg-red-600 text-white rounded">Eliminar</button>
            </div>
        </div>
    </div>
</div>
@endsection
