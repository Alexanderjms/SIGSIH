@extends('layouts.admin')

@section('page-header')
@endsection

@section('content')
<div x-data="rolesTable()">
    <x-tabla-crud :titulo="'Gestión de Roles'">
        <x-slot name="filtros">
            @include('partials.filtros-generales', [
            'searchModel' => 'search',
            'filtrosSelect' => [
            'filtroPermiso' => [
            'label' => 'permisos',
            'options' => ['Crear', 'Editar', 'Eliminar', 'Ver']
            ]
            ],
            'ordenarOptions' => [
            'rol' => 'Rol',
            'permisos' => 'Permisos',
            'estado' => 'Estado',
            ]
            ])
        </x-slot>
        <x-slot name="boton">
            @include('partials.boton-generico', [
            'texto' => 'Agregar rol',
            'ruta' => '#',
            'onclick' => "document.getElementById('modal-nuevo-rol').showModal()"
            ])
        </x-slot>

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
                            <span
                                :class="rol.estado === 'Activo' ? 'bg-green-100 text-green-700 px-2 py-1 rounded' : 'bg-red-100 text-red-700 px-2 py-1 rounded'"
                                x-text="rol.estado"></span>
                        </td>
                        <td class="py-2 px-4 flex gap-2">
                            <a href="#" class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                            <a href="#" class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </x-tabla-crud>
</div>
<script>
    function rolesTable() {
        return {
            search: '',
            filtroPermiso: '',
            ordenarPor: 'rol',
            ordenAsc: true,
            roles: [{
                    rol: 'Administrador',
                    permisos: 'Crear, Editar, Eliminar',
                    estado: 'Activo'
                },
                {
                    rol: 'Técnico',
                    permisos: 'Ver, Editar',
                    estado: 'Activo'
                },
                {
                    rol: 'Cliente',
                    permisos: 'Ver',
                    estado: 'Inactivo'
                },
            ],
            get rolesFiltrados() {
                let filtrados = this.roles.filter(r => {
                    const searchLower = this.search.toLowerCase();
                    const matchSearch = r.rol.toLowerCase().includes(searchLower) || r.permisos.toLowerCase()
                        .includes(searchLower);
                    const matchPermiso = !this.filtroPermiso || r.permisos.split(',').map(p => p.trim())
                        .includes(this.filtroPermiso);
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
            <button type="button" onclick="document.getElementById('modal-nuevo-rol').close()"
                class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300">Cancelar</button>
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
            <button type="button" onclick="document.getElementById('modal-editar-rol').close()"
                class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300">Cancelar</button>
            <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Guardar
                cambios</button>
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