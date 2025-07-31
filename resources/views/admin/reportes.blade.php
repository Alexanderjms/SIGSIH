
@extends('layouts.admin')

@section('title', 'Gestión de Reportes')

@section('content')
<div x-data="{ tab: 'reportes', isModalOpen: false, isCategoriaModalOpen: false, isEditCategoriaModalOpen: false, categoriaToEdit: null, isDeleteReporteModalOpen: false, reporteToDelete: null, isServicioModalOpen: false, isTipoVisitaModalOpen: false }">
<div class="w-full">
    <ul class="flex border-b nunito-bold">
      <li @click="tab='reportes'" :class="tab==='reportes' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'" class="mr-6 pb-2">Reportes</li>
      <li @click="tab='servicios'" :class="tab==='servicios' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'" class="mr-6 pb-2">Servicio Realizado</li>
      <li @click="tab='acciones'" :class="tab==='acciones' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'" class="mr-6 pb-2">Acciones Realizadas</li>
      <li @click="tab='tipovisita'" :class="tab==='tipovisita' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'" class="mr-6 pb-2">Tipo de Visita</li>

    </ul>

    <div x-show="tab==='acciones'" class="overflow-x-auto w-full">
      <div class="bg-white rounded-lg shadow p-6 mt-6 w-full">
        <div class="sticky top-0 z-10 bg-white pb-4 mb-4 border-b flex flex-col md:flex-row md:items-center md:justify-between gap-4 w-full">
          <h2 class="text-2xl text-gray-800 nunito-bold">Acciones Realizadas</h2>
          <div class="flex flex-col sm:flex-row gap-2 flex-1 md:ml-6 nunito-bold">
            <input type="text" placeholder="Buscar acción..." class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
            <select class="border rounded px-1 py-2 text-sm w-full sm:w-40">
              <option class="nunito-bold" value="">Todas las acciones</option>
              <option class="nunito-bold">Revisión</option>
              <option class="nunito-bold">Mantenimiento</option>
              <option class="nunito-bold">Capacitación</option>
            </select>
          </div>
          <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Nueva acción</button>
        </div>
        <table class="min-w-full text-sm w-full">
          <thead class="bg-gray-100 nunito-bold">
            <tr>
              <th class="py-2 px-4 text-left">ID Acción</th>
              <th class="py-2 px-4 text-left">Nombre</th>
              <th class="py-2 px-4 text-left">Descripción</th>
              
              <th class="py-2 px-4 text-left">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b nunito-regular">
              <td class="py-2 px-4">AC-001</td>
              <td class="py-2 px-4">Revisión</td>
              <td class="py-2 px-4">Revisión de equipos de red</td>
              
              <td class="py-2 px-4 flex gap-2">
                <a href="#" class="text-blue-500 hover:text-blue-700"><i class="fas fa-eye"></i></a>
                <a href="#" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </ul>

  <div x-show="tab==='tipovisita'" class="overflow-x-auto w-full">
        <div class="bg-white rounded-lg shadow p-6 mt-6">
            <div class="sticky top-0 z-10 bg-white pb-4 mb-4 border-b flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <h2 class="text-2xl text-gray-800 nunito-bold">Tipo de Visita</h2>
                <div class="flex flex-col sm:flex-row gap-2 flex-1 md:ml-6 nunito-bold">
                    <input type="text" placeholder="Buscar tipo de visita..." class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
                    <select class="border rounded px-1 py-2 text-sm w-full sm:w-40">
                        <option class="nunito-bold" value="">Todos los tipos</option>
                        <option class="nunito-bold">Técnica</option>
                        <option class="nunito-bold">Supervisión</option>
                        <option class="nunito-bold">Capacitación</option>
                    </select>
                </div>
                <button @click="isTipoVisitaModalOpen = true" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Nuevo tipo de visita</button>
            </div>
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 nunito-bold">
                    <tr>
                        <th class="py-2 px-4 text-left">ID Tipo</th>
                        <th class="py-2 px-4 text-left">Nombre</th>
                        <th class="py-2 px-4 text-left">Descripción</th>
                        <th class="py-2 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b nunito-regular">
                        <td class="py-2 px-4">TV-001</td>
                        <td class="py-2 px-4">Técnica</td>
                        <td class="py-2 px-4">Visita para revisión técnica de equipos</td>
                        <td class="py-2 px-4 flex gap-2">
                            <a href="#" class="text-blue-500 hover:text-blue-700"><i class="fas fa-eye"></i></a>
                            <a href="#" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </ul>
    <div x-show="tab==='reportes'" class="overflow-x-auto">
        <div class="bg-white rounded-lg shadow p-6 mt-6">
            <div class="sticky top-0 z-10 bg-white pb-4 mb-4 border-b flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <h2 class="text-2xl text-gray-800 nunito-bold">Reportes</h2>
                <div class="flex flex-col sm:flex-row gap-2 flex-1 md:ml-6 nunito-bold">
                    <input type="text" placeholder="Buscar reporte..." class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
                    <select class="border rounded px-1 py-2 text-sm w-full sm:w-40">
                        <option class="nunito-bold" value="">Todos los estados</option>
                        <option class="nunito-bold">Generado</option>
                        <option class="nunito-bold">Pendiente</option>
                        <option class="nunito-bold">Archivado</option>
                    </select>
                </div>
                <button @click="isModalOpen = true" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Nuevo reporte</button>
            </div>
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 nunito-bold">
                    <tr>
                        <th class="py-2 px-4 text-left">ID Reporte</th>
                        <th class="py-2 px-4 text-left">Fecha de Reporte</th>
                        <th class="py-2 px-4 text-left">Observaciones</th>
                        <th class="py-2 px-4 text-left">Tipo de Visita</th>
                        <th class="py-2 px-4 text-left">Servicio Realizado</th>
                        <th class="py-2 px-4 text-left">Acción Realizada</th>
                        <th class="py-2 px-4 text-left">Orden de Servicio</th>
                        <th class="py-2 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b nunito-regular">
                        <td class="py-2 px-4">1</td>
                        <td class="py-2 px-4">2025-07-28</td>
                        <td class="py-2 px-4">Sin novedades</td>
                        <td class="py-2 px-4">Visita Técnica</td>
                        <td class="py-2 px-4">Mantenimiento preventivo</td>
                        <td class="py-2 px-4">Revisión de equipos</td>
                        <td class="py-2 px-4">OS-00123</td>
                        <td class="py-2 px-4 flex gap-2">
                            <a href="#" @click="isModalOpen = true" class="text-blue-500 hover:text-blue-700"><i class="fas fa-eye"></i></a>
                            <a href="#" @click="isDeleteReporteModalOpen = true; reporteToDelete = {id: 1}" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div x-show="tab==='servicios'" class="overflow-x-auto">
        <div class="bg-white rounded-lg shadow p-6 mt-6">
            <div class="sticky top-0 z-10 bg-white pb-4 mb-4 border-b flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <h2 class="text-2xl text-gray-800 nunito-bold">Servicio Realizado</h2>
                <div class="flex flex-col sm:flex-row gap-2 flex-1 md:ml-6 nunito-bold">
                    <input type="text" placeholder="Buscar servicio..." class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
                    <select class="border rounded px-1 py-2 text-sm w-full sm:w-40">
                        <option class="nunito-bold" value="">Todos los tipos</option>
                        <option class="nunito-bold">Mantenimiento</option>
                        <option class="nunito-bold">Instalación</option>
                        <option class="nunito-bold">Reparación</option>
                    </select>
                </div>
                <button @click="isServicioModalOpen = true" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Nuevo servicio</button>
            </div>
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 nunito-bold">
                    <tr>
                        <th class="py-2 px-4 text-left">ID Servicio</th>
                        <th class="py-2 px-4 text-left">Tipo de Servicio</th>
                        <th class="py-2 px-4 text-left">Descripción</th>
                        <th class="py-2 px-4 text-left">Fecha</th>
                        <th class="py-2 px-4 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b nunito-regular">
                        <td class="py-2 px-4">SR-001</td>
                        <td class="py-2 px-4">Mantenimiento</td>
                        <td class="py-2 px-4">Mantenimiento preventivo de equipos</td>
                        <td class="py-2 px-4">2025-07-28</td>
                        <td class="py-2 px-4 flex gap-2">
                            <a href="#" class="text-blue-500 hover:text-blue-700"><i class="fas fa-eye"></i></a>
                            <a href="#" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal Nuevo Reporte -->
    <x-admin.form-modal 
        modalName="isModalOpen" 
        title="Nuevo Reporte" 
        submitLabel="Guardar Reporte"
        maxWidth="max-w-2xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="id_reporte" class="block text-sm font-medium text-gray-700">ID Reporte</label>
                <input type="text" id="id_reporte" name="id_reporte"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="fecha_reporte" class="block text-sm font-medium text-gray-700">Fecha de Reporte</label>
                <input type="date" id="fecha_reporte" name="fecha_reporte"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div class="col-span-2">
                <label for="observaciones" class="block text-sm font-medium text-gray-700">Observaciones</label>
                <textarea id="observaciones" name="observaciones" rows="2"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2"></textarea>
            </div>
            <div>
                <label for="tipo_visita" class="block text-sm font-medium text-gray-700">Tipo de Visita</label>
                <input type="text" id="tipo_visita" name="tipo_visita"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="servicio_realizado" class="block text-sm font-medium text-gray-700">Servicio Realizado</label>
                <input type="text" id="servicio_realizado" name="servicio_realizado"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="accion_realizada" class="block text-sm font-medium text-gray-700">Acción Realizada</label>
                <input type="text" id="accion_realizada" name="accion_realizada"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="orden_servicio" class="block text-sm font-medium text-gray-700">Orden de Servicio</label>
                <input type="text" id="orden_servicio" name="orden_servicio"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
        </div>
    </x-admin.form-modal>

    <!-- Modal Nuevo Servicio -->
    <x-admin.form-modal 
        modalName="isServicioModalOpen" 
        title="Nuevo Servicio Realizado" 
        submitLabel="Guardar Servicio"
        maxWidth="max-w-2xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="id_servicio" class="block text-sm font-medium text-gray-700">ID Servicio</label>
                <input type="text" id="id_servicio" name="id_servicio"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="tipo_servicio" class="block text-sm font-medium text-gray-700">Tipo de Servicio</label>
                <select id="tipo_servicio" name="tipo_servicio" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
                    <option>Mantenimiento</option>
                    <option>Instalación</option>
                    <option>Reparación</option>
                </select>
            </div>
            <div class="col-span-2">
                <label for="descripcion_servicio" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea id="descripcion_servicio" name="descripcion_servicio" rows="2"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2"></textarea>
            </div>
            <div>
                <label for="fecha_servicio" class="block text-sm font-medium text-gray-700">Fecha</label>
                <input type="date" id="fecha_servicio" name="fecha_servicio"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
        </div>
    </x-admin.form-modal>

    <!-- Modal Nuevo Tipo de Visita -->
    <x-admin.form-modal 
        modalName="isTipoVisitaModalOpen" 
        title="Nuevo Tipo de Visita" 
        submitLabel="Guardar Tipo de Visita"
        maxWidth="max-w-2xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="id_tipo_visita" class="block text-sm font-medium text-gray-700">ID Tipo</label>
                <input type="text" id="id_tipo_visita" name="id_tipo_visita"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div>
                <label for="nombre_tipo_visita" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" id="nombre_tipo_visita" name="nombre_tipo_visita"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div class="col-span-2">
                <label for="descripcion_tipo_visita" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea id="descripcion_tipo_visita" name="descripcion_tipo_visita" rows="2"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2"></textarea>
            </div>
        </div>
    </x-admin.form-modal>



    <!-- Modal Confirmar Eliminación Reporte -->
    <x-admin.confirmation-modal
        modalName="isDeleteReporteModalOpen"
        itemToDelete="reporteToDelete"
        message="¿Estás seguro de que quieres eliminar el reporte"
    />
</div>
@endsection
