@extends('layouts.admin')

@section('content')
    <div>
        <h1 class="text-2xl font-bold mb-4">Gestión de Usuarios</h1>
        @livewire('usuarios-lista')
    </div>
@endsection
