<div x-data="{
        tab: 'empresas',
        isEmpresaModalOpen: false,
        isEmpresaRegistradaModalOpen: false,
        isOficinaModalOpen: false,
        empresaToEdit: null,
        empresaRegistradaToEdit: null,
        oficinaToEdit: null,
        empresas: [
            {id: 1, nombre_empresa: 'Empresa Ejemplo', descripcion_empresa: 'Descripción de ejemplo', estado_empresa: 'Activo'},
            {id: 2, nombre_empresa: 'Soluciones S.A.', descripcion_empresa: 'Empresa de tecnología', estado_empresa: 'Activo'},
            {id: 3, nombre_empresa: 'Comercial XYZ', descripcion_empresa: 'Comercio mayorista', estado_empresa: 'Inactivo'}
        ],
        empresasRegistradas: [
            {id: 1, nombre_empresa: 'Empresa Registrada 1', descripcion_empresa: 'Desc 1', estado_empresa: 'Activo'},
            {id: 2, nombre_empresa: 'Empresa Registrada 2', descripcion_empresa: 'Desc 2', estado_empresa: 'Inactivo'}
        ],
        openEmpresaModal(edit = false, empresa = null) {
            this.isEmpresaModalOpen = true;
            this.empresaToEdit = edit ? empresa : null;
        },
        openEmpresaRegistradaModal(edit = false, empresa = null) {
            this.isEmpresaRegistradaModalOpen = true;
            this.empresaRegistradaToEdit = edit ? empresa : null;
        },
        openOficinaModal(edit = false, oficina = null) {
            this.isOficinaModalOpen = true;
            this.oficinaToEdit = edit ? oficina : null;
        },
        oficinas: [
            {id: 1, nombre: 'Oficina Central'},
            {id: 2, nombre: 'Sucursal Norte'},
            {id: 3, nombre: 'Sucursal Sur'}
        ]
    }"
    @keydown.window.escape="isEmpresaModalOpen = false; isEmpresaRegistradaModalOpen = false; isOficinaModalOpen = false">

    <!-- Tabs -->
    <ul class="flex border-b nunito-bold mb-6 flex-wrap gap-2">
        <li @click="tab='empresas'"
            :class="tab==='empresas' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'"
            class="pb-2 mr-4">Empresas</li>
        <li @click="tab='form-nombre'"
            :class="tab==='form-nombre' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'"
            class="pb-2 mr-4">Empresas Registradas</li>
        <li @click="tab='oficinas'"
            :class="tab==='oficinas' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600 hover:text-blue-500 cursor-pointer'"
            class="pb-2">Oficinas Empresa</li>
    </ul>

    <!-- TAB 1: Empresas Cliente -->
    <div x-show="tab==='empresas'" class="overflow-x-auto">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2 md:gap-4 w-full mb-4">
            <div class="flex flex-col md:flex-row md:items-center gap-2 md:gap-4 w-full">
                <input type="text" placeholder="Buscar empresa..."
                    class="border rounded px-3 py-2 text-sm w-full md:w-56" />
                <select class="border rounded px-3 py-2 text-sm w-full md:w-48">
                    <option>Todos los tipos</option>
                    <option>Pública</option>
                    <option>Privada</option>
                </select>
                <select class="border rounded px-3 py-2 text-sm w-full md:w-48">
                    <option>Ordenar por Nombre</option>
                    <option>Fecha Registro</option>
                </select>
            </div>
            <button @click="openEmpresaModal(false)"
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg nunito-bold transition whitespace-nowrap font-bold w-full md:w-auto">
                Nueva Empresa
            </button>
        </div>
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100 nunito-bold">
                <tr>
                    <th class="py-2 px-4 text-left">ID</th>
                    <th class="py-2 px-4 text-left">Fecha Registro</th>
                    <th class="py-2 px-4 text-left">Nombre Empresa</th>
                    <th class="py-2 px-4 text-left">Dirección</th>
                    <th class="py-2 px-4 text-left">Oficina</th>
                    <th class="py-2 px-4 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b nunito-regular">
                    <td class="py-2 px-4">1</td>
                    <td class="py-2 px-4">2025-08-03</td>
                    <td class="py-2 px-4">Empresa Ejemplo</td>
                    <td class="py-2 px-4">Av. Principal 123</td>
                    <td class="py-2 px-4">Oficina Central</td>
                    <td class="py-2 px-4 flex gap-2">
                        <a href="#"
                            @click.prevent="openEmpresaModal(true, {id: 1, nombre_empresa: 'Empresa Ejemplo', descripcion_empresa: 'Descripción de ejemplo', estado_empresa: 'Activo'})"
                            class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                        <a href="#" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- TAB 2: Empresas Registradas -->
    <div x-show="tab==='form-nombre'" class="overflow-x-auto">
        <!-- Filtros -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2 md:gap-4 w-full mb-4">
            <div class="flex flex-col md:flex-row md:items-center gap-2 md:gap-4 w-full">
                <input type="text" placeholder="Buscar por nombre..."
                    class="border rounded px-3 py-2 text-sm w-full md:w-56" />
                <input type="text" placeholder="Buscar por descripción..."
                    class="border rounded px-3 py-2 text-sm w-full md:w-56" />
                <select class="border rounded px-3 py-2 text-sm w-full md:w-48">
                    <option>Ordenar por Nombre</option>
                    <option>Ordenar por ID</option>
                </select>
            </div>
            <button @click="openEmpresaRegistradaModal(false)"
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg nunito-bold transition whitespace-nowrap font-bold w-full md:w-auto">
                Agregar empresa registrada
            </button>
        </div>
        <table class="min-w-full text-sm mt-2">
            <thead class="bg-gray-100 nunito-bold">
                <tr>
                    <th class="py-2 px-4 text-left">ID</th>
                    <th class="py-2 px-4 text-left">Nombre Empresa</th>
                    <th class="py-2 px-4 text-left">Descripción</th>
                    <th class="py-2 px-4 text-left">Estado</th>
                    <th class="py-2 px-4 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <template x-for="empresa in empresasRegistradas" :key="empresa.id">
                    <tr class="border-b nunito-regular">
                        <td class="py-2 px-4" x-text="empresa.id"></td>
                        <td class="py-2 px-4" x-text="empresa.nombre_empresa"></td>
                        <td class="py-2 px-4" x-text="empresa.descripcion_empresa"></td>
                        <td class="py-2 px-4">
                            <span class="px-2 py-1 rounded"
                                :class="empresa.estado_empresa === 'Activo' ? 'bg-green-100 text-green-700' : 'bg-gray-200 text-gray-600'"
                                x-text="empresa.estado_empresa"></span>
                        </td>
                        <td class="py-2 px-4 flex gap-2">
                            <a href="#" @click.prevent="openEmpresaRegistradaModal(true, empresa)"
                                class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                            <a href="#" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>

    <!-- TAB 3: Oficinas Empresa -->
    <div x-show="tab==='oficinas'" class="overflow-x-auto">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2 md:gap-4 w-full mb-4">
            <div class="flex flex-col md:flex-row md:items-center gap-2 md:gap-4 w-full">
                <input type="text" placeholder="Buscar oficina..."
                    class="border rounded px-3 py-2 text-sm w-full md:w-56" />
                <select class="border rounded px-3 py-2 text-sm w-full md:w-48">
                    <option>Todos los departamentos</option>
                    <option>Ventas</option>
                    <option>Soporte</option>
                </select>
                <select class="border rounded px-3 py-2 text-sm w-full md:w-48">
                    <option>Ordenar por Nombre</option>
                    <option>Ordenar por ID Oficina</option>
                </select>
            </div>
            <button @click="openOficinaModal(false)"
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg nunito-bold transition whitespace-nowrap font-bold w-full md:w-auto">
                Nueva Oficina
            </button>
        </div>
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100 nunito-bold">
                <tr>
                    <th class="py-2 px-4 text-left">ID Oficina</th>
                    <th class="py-2 px-4 text-left">Nombre Oficina</th>
                    <th class="py-2 px-4 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b nunito-regular">
                    <td class="py-2 px-4">1</td>
                    <td class="py-2 px-4">Oficina Central</td>
                    <td class="py-2 px-4 flex gap-2">
                        <a href="#" @click.prevent="openOficinaModal(true, {id: 1, nombre: 'Oficina Central'})"
                            class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                        <a href="#" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Modal Empresas Cliente -->
    <div x-show="isEmpresaModalOpen" x-transition.opacity
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40"
        @click.self="isEmpresaModalOpen = false">
        <div class="bg-white rounded-xl shadow-lg p-8 max-w-lg w-full relative">
            <h2 class="text-xl font-bold mb-4" x-text="empresaToEdit ? 'Editar Empresa' : 'Agregar Empresa'"></h2>
            <form @submit.prevent="isEmpresaModalOpen = false">
                <div class="mb-4">
                    <label class="block font-medium mb-1">Empresa Registrada <span class="text-red-500">*</span></label>
                    <select class="border rounded px-3 py-2 w-full" required>
                        <option value="">Seleccionar empresa registrada...</option>
                        <template x-for="empresa in empresasRegistradas" :key="empresa.id">
                            <option :value="empresa.id" x-text="empresa.nombre_empresa"
                                :selected="empresaToEdit && empresaToEdit.id === empresa.id"></option>
                        </template>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-1">Dirección <span class="text-red-500">*</span></label>
                    <input type="text" class="border rounded px-3 py-2 w-full" maxlength="255"
                        :value="empresaToEdit ? empresaToEdit.direccion : ''"
                        :placeholder="empresaToEdit ? '' : 'Ejemplo: Av. Principal 123'" required>
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-1">Oficina <span class="text-red-500">*</span></label>
                    <select class="border rounded px-3 py-2 w-full" required>
                        <option value="">Seleccionar oficina...</option>
                        <template x-for="oficina in oficinas" :key="oficina.id">
                            <option :value="oficina.id" x-text="oficina.nombre"
                                :selected="empresaToEdit && empresaToEdit.oficina_id === oficina.id"></option>
                        </template>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-1">Estado <span class="text-red-500">*</span></label>
                    <select class="border rounded px-3 py-2 w-full" maxlength="20" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]+"
                        required>
                        <option value="">Seleccionar estado</option>
                        <option :selected="empresaToEdit && empresaToEdit.estado_empresa === 'Activo'">Activo</option>
                        <option :selected="empresaToEdit && empresaToEdit.estado_empresa === 'Inactivo'">Inactivo
                        </option>
                    </select>
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" @click="isEmpresaModalOpen = false"
                        class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Cancelar</button>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded"
                        x-text="empresaToEdit ? 'Guardar Cambios' : 'Agregar Empresa'"></button>
                </div>
            </form>
            <button @click="isEmpresaModalOpen = false"
                class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 text-2xl">
                &times;
            </button>
        </div>
    </div>

    <!-- Modal Empresas Registradas -->
    <div x-show="isEmpresaRegistradaModalOpen" x-transition.opacity
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40"
        @click.self="isEmpresaRegistradaModalOpen = false">
        <div class="bg-white rounded-xl shadow-lg p-8 max-w-lg w-full relative">
            <h2 class="text-xl font-bold mb-4"
                x-text="empresaRegistradaToEdit ? 'Editar Empresa Registrada' : 'Agregar Empresa Registrada'"></h2>
            <form @submit.prevent="isEmpresaRegistradaModalOpen = false">
                <div class="mb-4">
                    <label class="block font-medium mb-1">Nombre de Empresa <span class="text-red-500">*</span></label>
                    <input type="text" class="border rounded px-3 py-2 w-full" maxlength="100"
                        pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]+"
                        :value="empresaRegistradaToEdit ? empresaRegistradaToEdit.nombre_empresa : ''"
                        :placeholder="empresaRegistradaToEdit ? '' : 'Ejemplo S.A.'" required>
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-1">Descripción</label>
                    <textarea class="border rounded px-3 py-2 w-full" rows="2" maxlength="255"
                        :placeholder="empresaRegistradaToEdit ? '' : 'Descripción de la empresa'"
                        x-text="empresaRegistradaToEdit ? empresaRegistradaToEdit.descripcion_empresa : ''"></textarea>
                </div>
                <div class="mb-4">
                    <label class="block font-medium mb-1">Estado <span class="text-red-500">*</span></label>
                    <select class="border rounded px-3 py-2 w-full" maxlength="20" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]+"
                        required>
                        <option value="">Seleccionar estado</option>
                        <option
                            :selected="empresaRegistradaToEdit && empresaRegistradaToEdit.estado_empresa === 'Activo'">
                            Activo</option>
                        <option
                            :selected="empresaRegistradaToEdit && empresaRegistradaToEdit.estado_empresa === 'Inactivo'">
                            Inactivo
                        </option>
                    </select>
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" @click="isEmpresaRegistradaModalOpen = false"
                        class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Cancelar</button>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded"
                        x-text="empresaRegistradaToEdit ? 'Guardar Cambios' : 'Agregar Empresa Registrada'"></button>
                </div>
            </form>
            <button @click="isEmpresaRegistradaModalOpen = false"
                class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 text-2xl">
                &times;
            </button>
        </div>
    </div>

    <!-- Modal Oficina -->
    <div x-show="isOficinaModalOpen" x-transition.opacity
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40"
        @click.self="isOficinaModalOpen = false">
        <div class="bg-white rounded-xl shadow-lg p-8 max-w-lg w-full relative">
            <h2 class="text-xl font-bold mb-4" x-text="oficinaToEdit ? 'Editar Oficina' : 'Agregar Oficina'"></h2>
            <form @submit.prevent="isOficinaModalOpen = false">
                <div class="mb-4">
                    <label class="block font-medium mb-1">Nombre de Oficina</label>
                    <input type="text" class="border rounded px-3 py-2 w-full"
                        :value="oficinaToEdit ? oficinaToEdit.nombre : ''"
                        :placeholder="oficinaToEdit ? '' : 'Oficina Central'">
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" @click="isOficinaModalOpen = false"
                        class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Cancelar</button>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded"
                        x-text="oficinaToEdit ? 'Guardar Cambios' : 'Agregar Oficina'"></button>
                </div>
            </form>
            <button @click="isOficinaModalOpen = false"
                class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 text-2xl">
                &times;
            </button>
        </div>
    </div>
</div>
