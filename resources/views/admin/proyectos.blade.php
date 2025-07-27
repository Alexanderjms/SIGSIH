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
    <div class="bg-white rounded-lg shadow p-6 mt-6">
        <div class="sticky top-0 z-10 bg-white pb-4 mb-4 border-b flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <h2 class="text-2xl text-gray-800 nunito-bold">Proyectos</h2>
            <div class="flex flex-col sm:flex-row gap-2 flex-1 md:ml-6 nunito-bold">
                <input type="text" placeholder="Buscar proyecto..." class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
                <select class="border rounded px-1 py-2 text-sm w-full sm:w-40">
                    <option class="nunito-bold" value="">Todos los estados</option>
                    <option class="nunito-bold">En Proceso</option>
                    <option class="nunito-bold">Finalizado</option>
                    <option class="nunito-bold">Pendiente</option>
                    <option class="nunito-bold">Cancelado</option>
                </select>
            </div>
            <button @click="isModalOpen = true" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Nuevo proyecto</button>
        </div>

    <table class="min-w-full text-sm">
        <thead class="bg-gray-100 nunito-bold">
            <tr>
                <th class="py-2 px-4 text-left">ID</th>
                <th class="py-2 px-4 text-left">Nombre</th>
                <th class="py-2 px-4 text-left">Fecha Inicial</th>
                <th class="py-2 px-4 text-left">Fecha Fin Estimada</th>
                <th class="py-2 px-4 text-left">Fecha Fin Real</th>
                <th class="py-2 px-4 text-left">Descripción</th>
                <th class="py-2 px-4 text-left">Actividades</th>
                <th class="py-2 px-4 text-left">Orden de Servicio</th>
                <th class="py-2 px-4 text-left">Estado</th>
                <th class="py-2 px-4 text-left">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b nunito-regular">
                <td class="py-2 px-4">1</td>
                <td class="py-2 px-4">Proyecto Alpha</td>
                <td class="py-2 px-4">2025-01-15</td>
                <td class="py-2 px-4">2025-07-30</td>
                <td class="py-2 px-4">2025-07-29</td>
                <td class="py-2 px-4">Implementación inicial del sistema</td>
                <td class="py-2 px-4">5 tareas</td>
                <td class="py-2 px-4">OS-00123</td>
                <td class="py-2 px-4">
                    <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded">Finalizado</span>
                </td>
                <td class="py-2 px-4 flex gap-2">
                    <a href="#" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                    <a href="#" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            <tr class="border-b nunito-regular">
                <td class="py-2 px-4">2</td>
                <td class="py-2 px-4">Proyecto Beta</td>
                <td class="py-2 px-4">2025-02-01</td>
                <td class="py-2 px-4">2025-08-20</td>
                <td class="py-2 px-4">-</td>
                <td class="py-2 px-4">Planificación y diseño preliminar</td>
                <td class="py-2 px-4">3 tareas</td>
                <td class="py-2 px-4">OS-00124</td>
                <td class="py-2 px-4">
                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded">En Proceso</span>
                </td>
                <td class="py-2 px-4 flex gap-2">
                    <a href="#" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                    <a href="#" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
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
            <div class="bg-white rounded-lg shadow p-6 mt-6">
                <div class="sticky top-0 z-10 bg-white pb-4 mb-4 border-b flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <h2 class="text-2xl text-gray-800 nunito-bold">Categorías</h2>
                    <a href="#" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Agregar categoría</a>
                </div>
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-100 nunito-bold">
                        <tr>
                            <th class="py-2 px-4 text-left">ID</th>
                            <th class="py-2 px-4 text-left">Tipo</th>
                            <th class="py-2 px-4 text-left">Nombre</th>
                            <th class="py-2 px-4 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b nunito-regular">
                            <td class="py-2 px-4">1</td>
                            <td class="py-2 px-4">Ingreso</td>
                            <td class="py-2 px-4">Salarios</td>
                            <td class="py-2 px-4 flex gap-2">
                                <a href="#" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                                <a href="#" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr class="border-b nunito-regular">
                            <td class="py-2 px-4">2</td>
                            <td class="py-2 px-4">Gasto</td>
                            <td class="py-2 px-4">Alquiler</td>
                            <td class="py-2 px-4 flex gap-2">
                                <a href="#" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                                <a href="#" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <div x-show="tab==='movimientos'" class="space-y-6">
            <div class="flex space-x-4 pt-4">
                <a href="#" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Agregar Ingreso</a>
                <a href="#" class="bg-red-800 hover:bg-red-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Agregar Gasto</a>
            </div>

            {{-- Tabla de Ingresos --}}
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-2xl text-gray-800 mb-4 border-b pb-4 nunito-bold">Ingresos</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-100 nunito-bold">
                            <tr>
                                <th class="py-2 px-4 text-left">ID</th>
                                <th class="py-2 px-4 text-left">Proyecto</th>
                                <th class="py-2 px-4 text-left">Nombre</th>
                                <th class="py-2 px-4 text-left">Fecha</th>
                                <th class="py-2 px-4 text-left">Monto</th>
                                <th class="py-2 px-4 text-left">Categoría</th>
                                <th class="py-2 px-4 text-left">Descripción</th>
                                <th class="py-2 px-4 text-left">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b nunito-regular">
                                <td class="py-2 px-4">1</td>
                                <td class="py-2 px-4">Proyecto BAC</td>
                                <td class="py-2 px-4">Pago inicial</td>
                                <td class="py-2 px-4">2025-07-20</td>
                                <td class="py-2 px-4">L. 15,000.00</td>
                                <td class="py-2 px-4">Salarios</td>
                                <td class="py-2 px-4">Primer pago del Proyecto BAC</td>
                                <td class="py-2 px-4 flex gap-2">
                                    <a href="#" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Tabla de Gastos --}}
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-2xl text-gray-800 mb-4 border-b pb-4 nunito-bold">Gastos</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-100 nunito-bold">
                            <tr>
                                <th class="py-2 px-4 text-left">ID</th>
                                <th class="py-2 px-4 text-left">Proyecto</th>
                                <th class="py-2 px-4 text-left">Nombre</th>
                                <th class="py-2 px-4 text-left">Fecha</th>
                                <th class="py-2 px-4 text-left">Monto</th>
                                <th class="py-2 px-4 text-left">Categoría</th>
                                <th class="py-2 px-4 text-left">Descripción</th>
                                <th class="py-2 px-4 text-left">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b nunito-regular">
                                <td class="py-2 px-4">1</td>
                                <td class="py-2 px-4">Proyecto BAC</td>
                                <td class="py-2 px-4">Compra de software</td>
                                <td class="py-2 px-4">2025-07-22</td>
                                <td class="py-2 px-4">L. 5,500.00</td>
                                <td class="py-2 px-4">Licencias</td>
                                <td class="py-2 px-4">Licencias de software de desarrollo</td>
                                <td class="py-2 px-4 flex gap-2">
                                    <a href="#" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
