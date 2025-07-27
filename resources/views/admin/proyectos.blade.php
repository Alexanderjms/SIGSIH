@extends('layouts.admin')

@section('content')
    {{-- Pestañas --}}
    <div x-data="{ tab: 'proyectos' }">
        <ul class="flex border-b nunito-bold">
            <li @click="tab='proyectos'" :class="tab==='proyectos' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'" class="mr-6 pb-2">Proyectos</li>
            <li @click="tab='categorias'" :class="tab==='categorias' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'" class="mr-6 pb-2">Categorías</li>
            <li @click="tab='movimientos'" :class="tab==='movimientos' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'" class="pb-2">Movimientos</li>
        </ul>
        <div x-show="tab==='proyectos'" class="overflow-x-auto" x-data="{ isModalOpen: false }">
    <div class="rounded-xl bg-white shadow-sm mt-6">
    <button @click="isModalOpen = true" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 nunito-bold">Nuevo proyecto</button>

    <table class="min-w-full border-collapse border border-blue-200 mt-6">
        <thead class="bg-blue-100 text-blue-500 nunito-bold">
            <tr>
                <th class="border border-blue-200 px-4 py-3 text-left tracking-wider">ID</th>
                <th class="border border-blue-200 px-4 py-3 text-left tracking-wider">Nombre</th>
                <th class="border border-blue-200 px-4 py-3 text-left tracking-wider">Fecha Inicial del Proyecto</th>
                <th class="border border-blue-200 px-4 py-3 text-left tracking-wider">Fecha Estimada de Finalización</th>
                <th class="border border-blue-200 px-4 py-3 text-left tracking-wider">Fecha de Finalización</th>
                <th class="border border-blue-200 px-4 py-3 text-left tracking-wider">Descripción</th>
                <th class="border border-blue-200 px-4 py-3 text-left tracking-wider">Actividades</th>
                <th class="border border-blue-200 px-4 py-3 text-left tracking-wider">Orden de Servicio</th>
                <th class="border border-blue-200 px-4 py-3 text-left tracking-wider">Estado de Proyecto</th>
                <th class="border border-blue-200 px-4 py-3 text-center tracking-wider">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-sm text-black nunito-regular">
                <td class="border border-blue-200 px-4 py-3">1</td>
                <td class="border border-blue-200 px-4 py-3">Proyecto Alpha</td>
                <td class="border border-blue-200 px-4 py-3">2025-01-15</td>
                <td class="border border-blue-200 px-4 py-3">2025-07-30</td>
                <td class="border border-blue-200 px-4 py-3">2025-07-29</td>
                <td class="border border-blue-200 px-4 py-3">Implementación inicial del sistema</td>
                <td class="border border-blue-200 px-4 py-3">5 tareas</td>
                <td class="border border-blue-200 px-4 py-3">OS-00123</td>
                <td class="border border-blue-200 px-4 py-3">Finalizado</td>
                <td class="border border-blue-200 px-4 py-3 text-center space-x-4">
                    <a href="#" class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                    <a href="#" class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            <tr class="text-sm text-black nunito-regular">
                <td class="border border-blue-200 px-4 py-3">2</td>
                <td class="border border-blue-200 px-4 py-3">Proyecto Beta</td>
                <td class="border border-blue-200 px-4 py-3">2025-02-01</td>
                <td class="border border-blue-200 px-4 py-3">2025-08-20</td>
                <td class="border border-blue-200 px-4 py-3">-</td>
                <td class="border border-blue-200 px-4 py-3">Planificación y diseño preliminar</td>
                <td class="border border-blue-200 px-4 py-3">3 tareas</td>
                <td class="border border-blue-200 px-4 py-3">OS-00124</td>
                <td class="border border-blue-200 px-4 py-3">En Proceso</td>
                <td class="border border-blue-200 px-4 py-3 text-center space-x-4">
                    <a href="#" class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                    <a href="#" class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div x-show="isModalOpen" 
     x-transition:enter="transition ease-out duration-100"
     x-transition:enter-start="opacity-0 transform scale-90"
     x-transition:enter-end="opacity-100 transform scale-100"
     x-transition:leave="transition ease-in duration-100"
     x-transition:leave-start="opacity-100 transform scale-100"
     x-transition:leave-end="opacity-0 transform scale-90"
     class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50"
     @click.away="isModalOpen = false"
     style="display: none;">
    <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-4xl" @click.stop>
        <div class="flex justify-between items-center border-b pb-3">
            <h3 class="text-xl font-bold text-gray-700">Nuevo Proyecto</h3>
            <button @click="isModalOpen = false" class="text-gray-500 hover:text-gray-800">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form class="mt-4 space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" id="nombre" name="nombre"
                        class="mt-1 block w-full rounded-md border-blue-300 shadow-sm border focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                </div>
                <div>
                    <label for="fecha_inicio" class="block text-sm font-medium text-gray-700">Fecha Inicial del Proyecto</label>
                    <input type="date" id="fecha_inicio" name="fecha_inicio"
                        class="mt-1 block w-full rounded-md border-blue-300 shadow-sm border focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                </div>
                <div>
                    <label for="fecha_estimada_fin" class="block text-sm font-medium text-gray-700">Fecha Estimada de Finalización</label>
                    <input type="date" id="fecha_estimada_fin" name="fecha_estimada_fin"
                        class="mt-1 block w-full rounded-md border-blue-300 shadow-sm border focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                </div>
                <div>
                    <label for="fecha_fin" class="block text-sm font-medium text-gray-700">Fecha de Finalización</label>
                    <input type="date" id="fecha_fin" name="fecha_fin"
                        class="mt-1 block w-full rounded-md border-blue-300 shadow-sm border focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                </div>
                <div class="col-span-2">
                    <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                    <textarea id="descripcion" name="descripcion" rows="3"
                        class="mt-1 block w-full rounded-md border-blue-300 shadow-sm border focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"></textarea>
                </div>
                <div>
                    <label for="actividades" class="block text-sm font-medium text-gray-700">Actividades</label>
                    <input type="text" id="actividades" name="actividades"
                        class="mt-1 block w-full rounded-md border-blue-300 shadow-sm border focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                </div>
                <div>
                    <label for="orden_servicio" class="block text-sm font-medium text-gray-700">Orden de Servicio</label>
                    <input type="text" id="orden_servicio" name="orden_servicio"
                        class="mt-1 block w-full rounded-md border-blue-300 shadow-sm border focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                </div>
                <div>
                    <label for="estado_proyecto" class="block text-sm font-medium text-gray-700">Estado de Proyecto</label>
                    <select id="estado_proyecto" name="estado_proyecto"
                        class="mt-1 block w-full rounded-md border-blue-300 shadow-sm border focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <option>En Proceso</option>
                        <option>Finalizado</option>
                        <option>Pendiente</option>
                        <option>Cancelado</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-end pt-4">
                <button type="button" @click="isModalOpen = false"
                    class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400 mr-2">Cancelar</button>
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Guardar Proyecto</button>
            </div>
        </form>

    </div>
</div>
</div>

        <div x-show="tab==='categorias'" class="overflow-x-auto">
            <div class="rounded-xl bg-white shadow-sm mt-6">
                <table class="min-w-full border-collapse border border-blue-200">
                    <thead class="bg-blue-100 text-blue-500 nunito-bold">
                        <tr>
                            <th class="border border-blue-200 px-4 py-3 text-center tracking-wider">ID de la Categoría</th>
                            <th class="border border-blue-200 px-4 py-3 text-center tracking-wider">Tipo de Categoría</th>
                            <th class="border border-blue-200 px-4 py-3 text-center tracking-wider">Nombre de la categoría</th>
                            <th class="border border-blue-200 px-4 py-3 text-center  tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-sm text-black nunito-regular">
                            <td class="border border-blue-200 px-4 py-3">1</td>
                            <td class="border border-blue-200 px-4 py-3">Ingreso</td>
                            <td class="border border-blue-200 px-4 py-3">Salarios</td>
                            <td class="border border-blue-200 px-4 py-3 text-center text-sm space-x-4">
                                <a href="#" class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                                <a href="#" class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <tr class="text-sm text-black nunito-regular">
                            <td class="border border-blue-200 px-4 py-3">2</td>
                            <td class="border border-blue-200 px-4 py-3">Gasto</td>
                            <td class="border border-blue-200 px-4 py-3">Alquiler</td>
                            <td class="border border-blue-200 px-4 py-3 text-center text-sm space-x-4">
                                <a href="#" class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                                <a href="#" class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <div x-show="tab==='movimientos'" class="space-y-6">
            <div class="flex space-x-4 pt-4">
                <a href="#" class="bg-green-800 text-white px-4 py-2 rounded hover:bg-green-700 nunito-bold">Agregar Ingreso</a>
                <a href="#" class="bg-red-900 text-white px-4 py-2 rounded hover:bg-red-800 nunito-bold">Agregar Gasto</a>
            </div>

            {{-- Tabla de Ingresos --}}
            <div>
                <h3 class="text-xl nunito-bold text-gray-700 mb-2">Ingresos</h3>
                <div class="overflow-x-auto">
                    <div class="rounded-xl bg-white shadow-sm">
                        <table class="min-w-full border-collapse border border-blue-200">
                            <thead class="bg-blue-100 text-blue-500 nunito-bold">
                                <tr>
                                    <th class="border border-blue-200 px-4 py-3 text-left tracking-wider">ID Ingreso</th>
                                    <th class="border border-blue-200 px-4 py-3 text-left tracking-wider">Proyecto</th>
                                    <th class="border border-blue-200 px-4 py-3 text-left tracking-wider">Nombre del Ingreso</th>
                                    <th class="border border-blue-200 px-4 py-3 text-left tracking-wider">Fecha</th>
                                    <th class="border border-blue-200 px-4 py-3 text-left tracking-wider">Monto</th>
                                    <th class="border border-blue-200 px-4 py-3 text-left tracking-wider">Categoría</th>
                                    <th class="border border-blue-200 px-4 py-3 text-left tracking-wider">Descripción</th>
                                    <th class="border border-blue-200 px-4 py-3 text-right tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-sm text-black nunito-regular">
                                    <td class="border border-blue-200 px-4 py-3">1</td>
                                    <td class="border border-blue-200 px-4 py-3">Proyecto BAC</td>
                                    <td class="border border-blue-200 px-4 py-3">Pago inicial</td>
                                    <td class="border border-blue-200 px-4 py-3">2025-07-20</td>
                                    <td class="border border-blue-200 px-4 py-3">L. 15,000.00</td>
                                    <td class="border border-blue-200 px-4 py-3">Salarios</td>
                                    <td class="border border-blue-200 px-4 py-3">Primer pago del Proyecto BAC</td>
                                    <td class="border border-blue-200 px-4 py-3 text-center text-sm space-x-4">
                                        <a href="#" class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Tabla de Gastos --}}
            <div>
                <h3 class="text-xl nunito-bold text-gray-700 mb-2">Gastos</h3>
                <div class="overflow-x-auto">
                    <div class="rounded-xl bg-white shadow-sm">
                        <table class="min-w-full border-collapse border border-blue-200">
                            <thead class="bg-blue-100 text-blue-500 nunito-bold">
                                <tr>
                                    <th class="border border-blue-200 px-4 py-3 text-left tracking-wider">ID Gasto</th>
                                    <th class="border border-blue-200 px-4 py-3 text-left tracking-wider">Proyecto</th>
                                    <th class="border border-blue-200 px-4 py-3 text-left tracking-wider">Nombre del Gasto</th>
                                    <th class="border border-blue-200 px-4 py-3 text-left tracking-wider">Fecha</th>
                                    <th class="border border-blue-200 px-4 py-3 text-left tracking-wider">Monto</th>
                                    <th class="border border-blue-200 px-4 py-3 text-left tracking-wider">Categoría</th>
                                    <th class="border border-blue-200 px-4 py-3 text-left tracking-wider">Descripción</th>
                                    <th class="border border-blue-200 px-4 py-3 text-right tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-sm text-black nunito-regular">
                                    <td class="border border-blue-200 px-4 py-3">1</td>
                                    <td class="border border-blue-200 px-4 py-3">Proyecto BAC</td>
                                    <td class="border border-blue-200 px-4 py-3">Compra de software</td>
                                    <td class="border border-blue-200 px-4 py-3">2025-07-22</td>
                                    <td class="border border-blue-200 px-4 py-3">L. 5,500.00</td>
                                    <td class="border border-blue-200 px-4 py-3">Licencias</td>
                                    <td class="border border-blue-200 px-4 py-3">Licencias de software de desarrollo</td>
                                    <td class="border border-blue-200 px-4 py-3 text-center text-sm space-x-4">
                                        <a href="#" class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
