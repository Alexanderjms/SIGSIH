<div 
    x-data="{ isTipoVisitaModalOpen: false }"
    class="bg-white rounded-lg shadow p-6"
>
    <div class="mb-6">
        <h2 class="text-2xl text-gray-800 nunito-bold">Catálogo de Tipo de Visita</h2>
        <p class="text-gray-600 nunito-regular">Gestionar tipos de visita del sistema</p>
    </div>
    
    <div class="flex flex-col sm:flex-row justify-between gap-4 mb-6">
        <div class="flex flex-col sm:flex-row gap-2 flex-1">
            <input 
                type="text" 
                placeholder="Buscar tipo de visita..." 
                class="border rounded px-3 py-2 text-sm w-full sm:w-48"
            />
            <select class="border rounded px-3 py-2 text-sm w-full sm:w-40">
                <option value="">Todos los tipos</option>
                <option>Técnica</option>
                <option>Supervisión</option>
                <option>Capacitación</option>
            </select>
        </div>
        <button 
            @click="isTipoVisitaModalOpen = true"
            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap"
        >
            Nuevo tipo de visita
        </button>
    </div>

    <div class="overflow-x-auto">
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

    <!-- Modal Nuevo Tipo de Visita -->
    <x-admin.form-modal modalName="isTipoVisitaModalOpen" title="Nuevo Tipo de Visita"
        submitLabel="Guardar Tipo de Visita" maxWidth="max-w-2xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="nombre_tipo_visita" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" id="nombre_tipo_visita" name="nombre_tipo_visita"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div class="col-span-2">
                <label for="descripcion_tipo_visita"
                    class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea id="descripcion_tipo_visita" name="descripcion_tipo_visita" rows="2"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2"></textarea>
            </div>
        </div>
    </x-admin.form-modal>
</div>
