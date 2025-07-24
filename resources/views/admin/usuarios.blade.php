@extends('layouts.admin')

@section('page-header')
    @include('partials.admin-header')
    <h1 class="text-2xl font-semibold mt-4">Gestión de Usuarios</h1>
@endsection
@section('content')
    <div>
        @livewire('usuarios-lista')
    </div>
@endsection
