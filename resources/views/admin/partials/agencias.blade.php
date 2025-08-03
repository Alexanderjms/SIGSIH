<div x-data="{ tab: 'agencias', isAgenciaModalOpen: false, isPaisModalOpen: false, isDepartamentoModalOpen: false, isCiudadModalOpen: false, isDireccionModalOpen: false, isDeleteAgenciaModalOpen: false, agenciaToEdit: null, agenciaToDelete: null }">
  <div class="w-full">
    <ul class="flex border-b nunito-bold">
      <li @click="tab='agencias'" :class="tab==='agencias' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'" class="mr-6 pb-2">Agencias</li>
      <li @click="tab='pais'" :class="tab==='pais' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'" class="mr-6 pb-2">País</li>
      <li @click="tab='departamento'" :class="tab==='departamento' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'" class="mr-6 pb-2">Departamento</li>
      <li @click="tab='ciudad'" :class="tab==='ciudad' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'" class="mr-6 pb-2">Ciudad</li>
      <li @click="tab='direccion'" :class="tab==='direccion' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'" class="mr-6 pb-2">Dirección</li>
    </ul>

    <div x-show="tab==='agencias'" class="overflow-x-auto w-full">
      <div class="bg-white rounded-lg shadow p-6 mt-6 w-full">
        <div class="sticky top-0 z-10 bg-white pb-4 mb-4 border-b flex flex-col md:flex-row md:items-center md:justify-between gap-4 w-full">
          <h2 class="text-2xl text-gray-800 nunito-bold">Agencias</h2>
          <div class="flex flex-col sm:flex-row gap-2 flex-1 md:ml-6 nunito-bold">
            <input type="text" placeholder="Buscar agencia..." class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
            <select class="border rounded px-1 py-2 text-sm w-full sm:w-40">
              <option class="nunito-bold" value="">Todas las ciudades</option>
              <option class="nunito-bold">Tegucigalpa</option>
              <option class="nunito-bold">San Pedro Sula</option>
            </select>
          </div>
          <button @click="isAgenciaModalOpen = true" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Nueva agencia</button>
        </div>
        <table class="min-w-full text-sm w-full">
          <thead class="bg-gray-100 nunito-bold">
            <tr>
              <th class="py-2 px-4 text-left">Nombre</th>
              <th class="py-2 px-4 text-left">Horario</th>
              <th class="py-2 px-4 text-left">Dirección</th>
              <th class="py-2 px-4 text-left">Ciudad</th>
              <th class="py-2 px-4 text-left">Departamento</th>
              <th class="py-2 px-4 text-left">País</th>
              <th class="py-2 px-4 text-left">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b nunito-regular">
              <td class="py-2 px-4">Agencia Central</td>
              <td class="py-2 px-4">Lunes a Viernes, 8am - 5pm</td>
              <td class="py-2 px-4">Col. Centro</td>
              <td class="py-2 px-4">Tegucigalpa</td>
              <td class="py-2 px-4">Francisco Morazán</td>
              <td class="py-2 px-4">Honduras</td>
              <td class="py-2 px-4 flex gap-2">
                <a href="#" class="text-blue-500 hover:text-blue-700"><i class="fas fa-eye"></i></a>
                <a href="#" @click="isDeleteAgenciaModalOpen = true; agenciaToDelete = {nombre: 'Agencia Central'}" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div x-show="tab==='pais'" class="overflow-x-auto w-full">
      <div class="bg-white rounded-lg shadow p-6 mt-6">
        <div class="sticky top-0 z-10 bg-white pb-4 mb-4 border-b flex flex-col md:flex-row md:items-center md:justify-between gap-4">
          <h2 class="text-2xl text-gray-800 nunito-bold">País</h2>
          <button @click="isPaisModalOpen = true" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Nuevo país</button>
        </div>
        <table class="min-w-full text-sm">
          <thead class="bg-gray-100 nunito-bold">
            <tr>
              <th class="py-2 px-4 text-left">ID País</th>
              <th class="py-2 px-4 text-left">Nombre País</th>
              <th class="py-2 px-4 text-left">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b nunito-regular">
              <td class="py-2 px-4">1</td>
              <td class="py-2 px-4">Honduras</td>
              <td class="py-2 px-4 flex gap-2">
                <a href="#" class="text-blue-500 hover:text-blue-700"><i class="fas fa-eye"></i></a>
                <a href="#" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div x-show="tab==='departamento'" class="overflow-x-auto w-full">
      <div class="bg-white rounded-lg shadow p-6 mt-6">
        <div class="sticky top-0 z-10 bg-white pb-4 mb-4 border-b flex flex-col md:flex-row md:items-center md:justify-between gap-4">
          <h2 class="text-2xl text-gray-800 nunito-bold">Departamento</h2>
          <button @click="isDepartamentoModalOpen = true" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Nuevo departamento</button>
        </div>
        <table class="min-w-full text-sm">
          <thead class="bg-gray-100 nunito-bold">
            <tr>
              <th class="py-2 px-4 text-left">ID Departamento</th>
              <th class="py-2 px-4 text-left">Nombre Departamento</th>
              <th class="py-2 px-4 text-left">País</th>
              <th class="py-2 px-4 text-left">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b nunito-regular">
              <td class="py-2 px-4">1</td>
              <td class="py-2 px-4">Francisco Morazán</td>
              <td class="py-2 px-4">Honduras</td>
              <td class="py-2 px-4 flex gap-2">
                <a href="#" class="text-blue-500 hover:text-blue-700"><i class="fas fa-eye"></i></a>
                <a href="#" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div x-show="tab==='ciudad'" class="overflow-x-auto w-full">
      <div class="bg-white rounded-lg shadow p-6 mt-6">
        <div class="sticky top-0 z-10 bg-white pb-4 mb-4 border-b flex flex-col md:flex-row md:items-center md:justify-between gap-4">
          <h2 class="text-2xl text-gray-800 nunito-bold">Ciudad</h2>
          <button @click="isCiudadModalOpen = true" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Nueva ciudad</button>
        </div>
        <table class="min-w-full text-sm">
          <thead class="bg-gray-100 nunito-bold">
            <tr>
              <th class="py-2 px-4 text-left">ID Ciudad</th>
              <th class="py-2 px-4 text-left">Nombre Ciudad</th>
              <th class="py-2 px-4 text-left">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b nunito-regular">
              <td class="py-2 px-4">1</td>
              <td class="py-2 px-4">Tegucigalpa</td>
              <td class="py-2 px-4 flex gap-2">
                <a href="#" class="text-blue-500 hover:text-blue-700"><i class="fas fa-eye"></i></a>
                <a href="#" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div x-show="tab==='direccion'" class="overflow-x-auto w-full">
      <div class="bg-white rounded-lg shadow p-6 mt-6">
        <div class="sticky top-0 z-10 bg-white pb-4 mb-4 border-b flex flex-col md:flex-row md:items-center md:justify-between gap-4">
          <h2 class="text-2xl text-gray-800 nunito-bold">Dirección</h2>
          <button @click="isDireccionModalOpen = true" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg nunito-bold transition whitespace-nowrap">Nueva dirección</button>
        </div>
        <table class="min-w-full text-sm">
          <thead class="bg-gray-100 nunito-bold">
            <tr>
              <th class="py-2 px-4 text-left">ID Dirección</th>
              <th class="py-2 px-4 text-left">Nombre Dirección</th>
              <th class="py-2 px-4 text-left">Ciudad</th>
              <th class="py-2 px-4 text-left">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b nunito-regular">
              <td class="py-2 px-4">1</td>
              <td class="py-2 px-4">Col. Centro</td>
              <td class="py-2 px-4">Tegucigalpa</td>
              <td class="py-2 px-4 flex gap-2">
                <a href="#" class="text-blue-500 hover:text-blue-700"><i class="fas fa-eye"></i></a>
                <a href="#" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Modal Nueva Agencia -->
    <x-admin.form-modal 
      modalName="isAgenciaModalOpen" 
      title="Nueva Agencia" 
      submitLabel="Guardar Agencia"
      maxWidth="max-w-2xl">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label for="nombre_agencia" class="block text-sm font-medium text-gray-700">Nombre de la agencia</label>
          <input type="text" id="nombre_agencia" name="nombre_agencia" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
        </div>
        <div>
          <label for="horario_agencia" class="block text-sm font-medium text-gray-700">Horario</label>
          <input type="text" id="horario_agencia" name="horario_agencia" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
        </div>
        <div>
          <label for="pais_agencia" class="block text-sm font-medium text-gray-700">País</label>
          <input type="text" id="pais_agencia" name="pais_agencia" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
        </div>
        <div>
          <label for="departamento_agencia" class="block text-sm font-medium text-gray-700">Departamento</label>
          <input type="text" id="departamento_agencia" name="departamento_agencia" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
        </div>
        <div>
          <label for="ciudad_agencia" class="block text-sm font-medium text-gray-700">Ciudad</label>
          <input type="text" id="ciudad_agencia" name="ciudad_agencia" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
        </div>
        <div>
          <label for="direccion_agencia" class="block text-sm font-medium text-gray-700">Dirección</label>
          <input type="text" id="direccion_agencia" name="direccion_agencia" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
        </div>
      </div>
    </x-admin.form-modal>

    <!-- Modal Nuevo País -->
    <x-admin.form-modal 
      modalName="isPaisModalOpen" 
      title="Nuevo País" 
      submitLabel="Guardar País"
      maxWidth="max-w-2xl">
      <div class="grid grid-cols-1 gap-4">
        <div>
          <label for="nombre_pais" class="block text-sm font-medium text-gray-700">Nombre País</label>
          <input type="text" id="nombre_pais" name="nombre_pais" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
        </div>
      </div>
    </x-admin.form-modal>

    <!-- Modal Nuevo Departamento -->
    <x-admin.form-modal 
      modalName="isDepartamentoModalOpen" 
      title="Nuevo Departamento" 
      submitLabel="Guardar Departamento"
      maxWidth="max-w-2xl">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label for="nombre_departamento" class="block text-sm font-medium text-gray-700">Nombre Departamento</label>
          <input type="text" id="nombre_departamento" name="nombre_departamento" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
        </div>
        <div>
          <label for="pais_departamento" class="block text-sm font-medium text-gray-700">País</label>
          <input type="text" id="pais_departamento" name="pais_departamento" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
        </div>
      </div>
    </x-admin.form-modal>

    <!-- Modal Nueva Ciudad -->
    <x-admin.form-modal 
      modalName="isCiudadModalOpen" 
      title="Nueva Ciudad" 
      submitLabel="Guardar Ciudad"
      maxWidth="max-w-2xl">
      <div class="grid grid-cols-1 gap-4">
        <div>
          <label for="nombre_ciudad" class="block text-sm font-medium text-gray-700">Nombre Ciudad</label>
          <input type="text" id="nombre_ciudad" name="nombre_ciudad" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
        </div>
      </div>
    </x-admin.form-modal>

    <!-- Modal Nueva Dirección -->
    <x-admin.form-modal 
      modalName="isDireccionModalOpen" 
      title="Nueva Dirección" 
      submitLabel="Guardar Dirección"
      maxWidth="max-w-2xl">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label for="nombre_direccion" class="block text-sm font-medium text-gray-700">Nombre Dirección</label>
          <input type="text" id="nombre_direccion" name="nombre_direccion" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
        </div>
        <div>
          <label for="ciudad_direccion" class="block text-sm font-medium text-gray-700">Ciudad</label>
          <input type="text" id="ciudad_direccion" name="ciudad_direccion" class="mt-1 block w-full rounded-md border-gray-500 shadow-sm border focus:border-gray-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 nunito-regular px-2">
        </div>
      </div>
    </x-admin.form-modal>

    <!-- Modal Confirmar Eliminación Agencia -->
    <x-admin.confirmation-modal
      modalName="isDeleteAgenciaModalOpen"
      itemToDelete="agenciaToDelete"
      message="¿Estás seguro de que quieres eliminar la agencia?"
    />
  </div>
</div>
