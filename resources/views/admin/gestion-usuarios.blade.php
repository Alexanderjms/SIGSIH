@extends('layouts.admin')

@section('page-header')
@endsection

@section('content')
<div class="bg-white rounded-lg shadow p-6 mb-8 transition-colors" x-data="usuariosTable()">
    <!-- Header visual fijo -->
    <div class="sticky top-0 z-10 bg-white pb-4 mb-4 border-b flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <h2 class="text-2xl font-bold text-gray-800">Lista de Usuarios</h2>
        <div class="flex flex-col sm:flex-row gap-2 flex-1 md:ml-6">
            <input type="text" x-model="search" placeholder="Buscar usuario..." class="border rounded px-3 py-2 text-sm w-full sm:w-48" />
            <select x-model="filtroPerfil" class="border rounded px-3 py-2 text-sm w-full sm:w-40">
                <option value="">Todos los perfiles</option>
                <option>Técnico</option>
                <option>Admin</option>
                <option>Cliente</option>
            </select>
            <select x-model="ordenarPor" class="border rounded px-3 py-2 text-sm w-full sm:w-44">
                <option value="nombre">Ordenar por Nombre</option>
                <option value="usuario">Ordenar por Usuario</option>
                <option value="perfil">Ordenar por Perfil</option>
                <option value="estado">Ordenar por Estado</option>
            </select>
        </div>
        <a href="#" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-semibold transition whitespace-nowrap">Agregar usuario</a>
    </div>
    <table class="min-w-full text-sm">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-2 px-4 text-left cursor-pointer" @click="ordenar('nombre')">Nombre</th>
                <th class="py-2 px-4 text-left cursor-pointer" @click="ordenar('usuario')">Usuario</th>
                <th class="py-2 px-4 text-left cursor-pointer" @click="ordenar('perfil')">Perfil</th>
                <th class="py-2 px-4 text-left cursor-pointer" @click="ordenar('estado')">Estado</th>
                <th class="py-2 px-4 text-left">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <template x-for="usuario in usuariosFiltrados" :key="usuario.usuario">
                <tr>
                    <td class="py-2 px-4" x-text="usuario.nombre"></td>
                    <td class="py-2 px-4" x-text="usuario.usuario"></td>
                    <td class="py-2 px-4" x-text="usuario.perfil"></td>
                    <td class="py-2 px-4">
                        <span :class="usuario.estado === 'Activo' ? 'bg-green-100 text-green-700 px-2 py-1 rounded' : 'bg-red-100 text-red-700 px-2 py-1 rounded'" x-text="usuario.estado"></span>
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
function usuariosTable() {
    return {
        search: '',
        filtroPerfil: '',
        ordenarPor: 'nombre',
        ordenAsc: true,
        usuarios: [
            { nombre: 'Juan Pérez', usuario: 'jperez', perfil: 'Técnico', estado: 'Activo' },
            { nombre: 'Ana López', usuario: 'alopez', perfil: 'Admin', estado: 'Activo' },
            { nombre: 'Carlos Ruiz', usuario: 'cruiz', perfil: 'Cliente', estado: 'Inactivo' },
        ],
        get usuariosFiltrados() {
            let filtrados = this.usuarios.filter(u =>
                (u.nombre.toLowerCase().includes(this.search.toLowerCase()) ||
                 u.usuario.toLowerCase().includes(this.search.toLowerCase())) &&
                (!this.filtroPerfil || u.perfil === this.filtroPerfil)
            );
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
@endsection