@extends('layouts.admin')

@section('content')

<div class="max-w-4xl mx-auto py-8" x-data="{
        tab: 'respaldo',
        showModal: false,
        modalMsg: '',
        openModal(msg) { this.modalMsg = msg; this.showModal = true; },
        closeModal() { this.showModal = false; },
        estadoConexion: 'inicial'
     }">

    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Gestión de Base de Datos</h2>

        <div class="flex border-b mb-4 space-x-4 text-base">
            <button @click="tab = 'respaldo'"
                :class="tab === 'respaldo' ? 'border-b-2 border-blue-600 text-blue-600' : 'text-gray-600 hover:text-blue-600'"
                class="pb-2 px-2 focus:outline-none transition">Respaldo</button>
            <button @click="tab = 'restore'"
                :class="tab === 'restore' ? 'border-b-2 border-blue-600 text-blue-600' : 'text-gray-600 hover:text-blue-600'"
                class="pb-2 px-2 focus:outline-none transition">Restaurar</button>
        </div>

        <!-- RESPALDO -->
        <div x-show="tab === 'respaldo'" class="space-y-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Respaldar base de datos</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="text-sm font-medium text-gray-700">Servidor</label>
                    <input type="text" value="(local)" class="w-full border rounded px-3 py-2" />
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-700">Base de Datos</label>
                    <input type="text" value="SIGSIH" class="w-full border rounded px-3 py-2" />
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-700">Usuario</label>
                    <input type="text" value="sa" class="w-full border rounded px-3 py-2" />
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-700">Contraseña</label>
                    <input type="password" value="123456" class="w-full border rounded px-3 py-2" />
                </div>
                <div class="md:col-span-2">
                    <label class="text-sm font-medium text-gray-700">Guardar respaldo en:</label>
                    <input type="text" value="C:\backups\SIGSIH.bak" class="w-full border rounded px-3 py-2" />
                </div>
            </div>

            <div class="flex justify-end gap-3 mt-4 items-center">
                <!-- Simulación -->
                <button @click="
                        estadoConexion = 'cargando';
                        setTimeout(() => { estadoConexion = 'exito'; }, 2000);
                    "
                    class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg font-semibold transition flex items-center justify-center gap-2 min-w-[150px]"
                    :disabled="estadoConexion === 'cargando'" style="min-width:150px;">
                    <template x-if="estadoConexion === 'inicial'">
                        <span>Probar conexión</span>
                    </template>
                    <template x-if="estadoConexion === 'cargando'">
                        <svg class="animate-spin h-4 w-4 mr-2 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                        </svg>
                        <span>Conectando...</span>
                    </template>
                    <template x-if="estadoConexion === 'exito'">
                        <span class="flex items-center gap-1">
                            <div class="w-2.5 h-2.5 rounded-full bg-green-400 border border-white"></div> Éxito
                        </span>
                    </template>
                </button>

                <button @click="openModal('¿Deseas confirmar el respaldo de la base de datos?')"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg font-semibold transition">
                    Respaldar
                </button>
            </div>
        </div>

        <!-- RESTORE -->
        <div x-show="tab === 'restore'" class="space-y-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Restaurar base de datos</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="text-sm font-medium text-gray-700">Servidor Local</label>
                    <input type="text" value="(local)" class="w-full border rounded px-3 py-2" />
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-700">Base de Datos</label>
                    <input type="text" value="SIGSIH" class="w-full border rounded px-3 py-2" />
                </div>
                <div class="md:col-span-2">
                    <label class="text-sm font-medium text-gray-700">Seleccionar archivo .bak</label>
                    <div class="flex gap-2">
                        <input type="text" value="C:\backups\SIGSIH.bak" class="w-full border rounded px-3 py-2" />
                        <button class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded">Examinar</button>
                    </div>
                </div>
            </div>
            <div class="flex justify-end gap-3 mt-4">
                <button @click="openModal('¿Deseas confirmar la restauración de la base de datos?')"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg font-semibold transition">
                    Restaurar
                </button>
            </div>
        </div>
    </div>

    <!-- MODAL -->
    <div x-show="showModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full">
            <div class="text-gray-800 text-lg font-semibold mb-4" x-text="modalMsg"></div>
            <div class="flex justify-end gap-2 mt-4">
                <button @click="closeModal()"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Cancelar</button>
                <button @click="closeModal()"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Aceptar</button>
            </div>
        </div>
    </div>
</div>

@endsection