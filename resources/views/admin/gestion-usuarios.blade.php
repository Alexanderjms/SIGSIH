@extends('layouts.admin')

@section('page-header')
@endsection

@section('content')
<div x-data="usuariosTable()">
    <!-- REFERENCIA A LA TABLA -->
    <x-admin.tabla-crud :titulo="'Lista de Usuarios'">
        <x-slot name="filtros">
            @include('partials.filtros-generales', [
            'searchModel' => 'search',
            'filtrosSelect' => [
            'filtroPerfil' => [
            'label' => 'perfiles',
            'options' => ['Técnico', 'Admin', 'Cliente']
            ]
            ],
            'ordenarOptions' => [
            'nombre' => 'Nombre',
            'usuario' => 'Usuario',
            'perfil' => 'Perfil',
            'estado' => 'Estado',
            ]
            ])
        </x-slot>

        <x-slot name="boton">
            @include('partials.boton-buscar', [
            'texto' => 'Agregar usuario',
            'ruta' => '#',
            'onclick' => "alert('Aquí abrirías un modal o redirigirías')"
            ])
        </x-slot>

        <!-- Tu tabla -->
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
                            <span
                                :class="usuario.estado === 'Activo' ? 'bg-green-100 text-green-700 px-2 py-1 rounded' : 'bg-red-100 text-red-700 px-2 py-1 rounded'"
                                x-text="usuario.estado"></span>
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
    function usuariosTable() {
        return {
            search: '',
            filtroPerfil: '',
            ordenarPor: 'nombre',
            ordenAsc: true,
            usuarios: [{
                    nombre: 'Juan Pérez',
                    usuario: 'jperez',
                    perfil: 'Técnico',
                    estado: 'Activo'
                },
                {
                    nombre: 'Ana López',
                    usuario: 'alopez',
                    perfil: 'Admin',
                    estado: 'Activo'
                },
                {
                    nombre: 'Carlos Ruiz',
                    usuario: 'cruiz',
                    perfil: 'Cliente',
                    estado: 'Inactivo'
                },
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