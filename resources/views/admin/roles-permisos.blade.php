@extends('layouts.admin')

@section('page-header')
@endsection

@section('content')
<div class="bg-white rounded-lg shadow p-6 mb-8 transition-colors" x-data="rolesTable()">
    <div class="sticky top-0 z-10 bg-white pb-4 mb-4 border-b flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <h2 class="text-2xl font-bold text-gray-800">Gestión de Roles</h2>
        <div class="flex flex-col sm:flex-row gap-2 flex-1 md:ml-6">
            <input type="text" x-model="search" placeholder="Buscar rol o permiso..." class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
            <select x-model="filtroPermiso" class="border rounded px-3 py-2 text-sm w-full sm:w-40">
                <option value="">Todos los permisos</option>
                <option>Crear</option>
                <option>Editar</option>
                <option>Eliminar</option>
                <option>Ver</option>
            </select>
            <select x-model="ordenarPor" class="border rounded px-3 py-2 text-sm w-full sm:w-44">
                <option value="rol">Ordenar por Rol</option>
                <option value="permisos">Ordenar por Permisos</option>
                <option value="estado">Ordenar por Estado</option>
            </select>
        </div>
        <a href="#" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-semibold transition whitespace-nowrap">Agregar rol</a>
    </div>
    <table class="min-w-full text-sm">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-2 px-4 text-left cursor-pointer" @click="ordenar('rol')">Rol</th>
                <th class="py-2 px-4 text-left cursor-pointer" @click="ordenar('permisos')">Permisos</th>
                <th class="py-2 px-4 text-left cursor-pointer" @click="ordenar('estado')">Estado</th>
                <th class="py-2 px-4 text-left">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <template x-for="rol in rolesFiltrados" :key="rol.rol">
                <tr>
                    <td class="py-2 px-4" x-text="rol.rol"></td>
                    <td class="py-2 px-4" x-text="rol.permisos"></td>
                    <td class="py-2 px-4">
                        <span :class="rol.estado === 'Activo' ? 'bg-green-100 text-green-700 px-2 py-1 rounded' : 'bg-red-100 text-red-700 px-2 py-1 rounded'" x-text="rol.estado"></span>
                    </td>
                    <td class="py-2 px-4 flex gap-2">
                        <a href="#" class="text-blue-500 hover:underline">Editar</a>
                        <a href="#" class="text-red-500 hover:underline">Eliminar</a>
                    </td>
                </tr>
            </template>
        </tbody>
    </table>
</div>
<script>
function rolesTable() {
    return {
        search: '',
        filtroPermiso: '',
        ordenarPor: 'rol',
        ordenAsc: true,
        roles: [
            { rol: 'Administrador', permisos: 'Crear, Editar, Eliminar', estado: 'Activo' },
            { rol: 'Técnico', permisos: 'Ver, Editar', estado: 'Activo' },
            { rol: 'Cliente', permisos: 'Ver', estado: 'Inactivo' },
        ],
        get rolesFiltrados() {
            let filtrados = this.roles.filter(r => {
                const searchLower = this.search.toLowerCase();
                const matchSearch = r.rol.toLowerCase().includes(searchLower) || r.permisos.toLowerCase().includes(searchLower);
                const matchPermiso = !this.filtroPermiso || r.permisos.split(',').map(p => p.trim()).includes(this.filtroPermiso);
                return matchSearch && matchPermiso;
            });
            filtrados.sort((a, b) => {
                let campo = this.ordenarPor;
                let valA = a[campo].toLowerCase();
                let valB = b[campo].toLowerCase();
                if (valA < valB) return this.ordenAsc ? -1 : 1;
                if (valA > valB) return this.ordenAsc ? 1 : -1;
                return 0;
            });
            return filtrados;
        },
        ordenar(campo) {
            if (this.ordenarPor === campo) {
                this.ordenAsc = !this.ordenAsc;
            } else {
                this.ordenarPor = campo;
                this.ordenAsc = true;
            }
        }
    }
}
</script>

<!-- Modales -->
<dialog id="modal-nuevo-rol" class="rounded-lg w-full max-w-md p-0 border-none">
    <form method="dialog" class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-bold mb-4">Crear nuevo rol</h3>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Nombre del rol</label>
            <input type="text" class="w-full border rounded px-3 py-2" placeholder="Ej: Supervisor" required />
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Permisos</label>
            <div class="flex flex-wrap gap-2">
                <label class="flex items-center gap-1"><input type="checkbox" /> Crear</label>
                <label class="flex items-center gap-1"><input type="checkbox" /> Editar</label>
                <label class="flex items-center gap-1"><input type="checkbox" /> Eliminar</label>
                <label class="flex items-center gap-1"><input type="checkbox" /> Ver</label>
            </div>
        </div>
        <div class="flex justify-end gap-2 mt-4">
            <button type="button" onclick="document.getElementById('modal-nuevo-rol').close()" class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300">Cancelar</button>
            <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Guardar</button>
        </div>
    </form>
</dialog>

<dialog id="modal-editar-rol" class="rounded-lg w-full max-w-md p-0 border-none">
    <form method="dialog" class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-bold mb-4">Editar rol</h3>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Nombre del rol</label>
            <input type="text" class="w-full border rounded px-3 py-2" value="Administrador" required />
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Permisos</label>
            <div class="flex flex-wrap gap-2">
                <label class="flex items-center gap-1"><input type="checkbox" checked /> Crear</label>
                <label class="flex items-center gap-1"><input type="checkbox" checked /> Editar</label>
                <label class="flex items-center gap-1"><input type="checkbox" checked /> Eliminar</label>
                <label class="flex items-center gap-1"><input type="checkbox" checked /> Ver</label>
            </div>
        </div>
        <div class="flex justify-end gap-2 mt-4">
            <button type="button" onclick="document.getElementById('modal-editar-rol').close()" class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300">Cancelar</button>
            <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Guardar cambios</button>
        </div>
    </form>
</dialog>

<div class="bg-white rounded-lg shadow p-6 transition-colors overflow-x-auto">
    <h2 class="text-lg font-semibold mb-4">Permisos disponibles</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-gray-100 rounded p-3 flex items-center gap-2">
            <i class="fas fa-plus text-blue-500"></i>
            <span>Crear</span>
        </div>
        <div class="bg-gray-100 rounded p-3 flex items-center gap-2">
            <i class="fas fa-edit text-yellow-500"></i>
            <span>Editar</span>
        </div>
        <div class="bg-gray-100 rounded p-3 flex items-center gap-2">
            <i class="fas fa-trash text-red-500"></i>
            <span>Eliminar</span>
        </div>
        <div class="bg-gray-100 rounded p-3 flex items-center gap-2">
            <i class="fas fa-eye text-green-500"></i>
            <span>Ver</span>
        </div>
    </div>
</div>
@endsection
