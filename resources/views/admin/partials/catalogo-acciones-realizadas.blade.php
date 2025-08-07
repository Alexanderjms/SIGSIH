<div x-data="{
        isAccionesModalOpen: false,
        acciones: [
            {
                id_accion: 'AC-001',
                nombre: 'Revisión',
                descripcion: 'Revisión de equipos de red'
            }
        ],
        filtroAccion: '',
        filtroTipo: ''
    }" class="overflow-x-auto">
    <div class="bg-white rounded-lg shadow p-6 mt-6 w-full">
        <div
            class="sticky top-0 z-10 bg-white pb-4 mb-4 border-b flex flex-col md:flex-row md:items-center md:justify-between gap-4 w-full">
            <h2 class="text-2xl text-gray-800 nunito-bold">Acciones Realizadas</h2>
            <div class="flex flex-col sm:flex-row gap-2 flex-1 md:ml-6 nunito-bold">
                <input type="text" x-model="filtroAccion" placeholder="Buscar acción..."
                    class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
                <select x-model="filtroTipo" class="border rounded px-1 py-2 text-sm w-full sm:w-40">
                    <option value="">Todas las acciones</option>
                    <option>Revisión</option>
                    <option>Mantenimiento</option>
                    <option>Capacitación</option>
                </select>
            </div>
            <button @click="isAccionesModalOpen = true"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">
                Nueva acción
            </button>
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
                <template x-for="accion in acciones
                    .filter(a => 
                        (!filtroAccion || a.descripcion.toLowerCase().includes(filtroAccion.toLowerCase()))
                        && (!filtroTipo || a.nombre === filtroTipo)
                    )" :key="accion.id_accion">
                    <tr class="border-b nunito-regular">
                        <td class="py-2 px-4" x-text="accion.id_accion"></td>
                        <td class="py-2 px-4" x-text="accion.nombre"></td>
                        <td class="py-2 px-4" x-text="accion.descripcion"></td>
                        <td class="py-2 px-4 flex gap-2">
                            <a href="#" class="text-blue-500 hover:text-blue-700"><i class="fas fa-eye"></i></a>
                            <a href="#" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>

    <!-- Modal Nueva Acción Realizada -->
    <x-admin.form-modal modalName="isAccionesModalOpen" title="Nueva Acción Realizada" submitLabel="Guardar Acción"
        maxWidth="max-w-2xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="nombre_accion" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" id="nombre_accion" name="nombre_accion"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
            </div>
            <div class="col-span-2">
                <label for="descripcion_accion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea id="descripcion_accion" name="descripcion_accion" rows="2"
                    class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2"></textarea>
            </div>
        </div>
    </x-admin.form-modal>
</div>