@extends('layouts.app')

@section('titulo', 'Editar Trabajo')

@section('contenido')

    <h1>Editar Trabajo</h1>

    <form action="{{ route('trabajos.update', $trabajo) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Tipo de prenda *</label>
            <input type="text" name="tipo_prenda" class="form-control"
                   value="{{ $trabajo->tipo_prenda }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Arreglo a realizar *</label>
            <input type="text" name="arreglo" class="form-control"
                   value="{{ $trabajo->arreglo }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nombre del cliente *</label>
            <input type="text" name="cliente_nombre" class="form-control"
                   value="{{ $trabajo->cliente_nombre }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Teléfono *</label>
            <input type="text" name="cliente_telefono" class="form-control"
                   value="{{ $trabajo->cliente_telefono }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Estado *</label>
            <select name="estado" class="form-select" required>
                <option value="Recibido" {{ $trabajo->estado == 'Recibido' ? 'selected' : '' }}>Recibido</option>
                <option value="En proceso" {{ $trabajo->estado == 'En proceso' ? 'selected' : '' }}>En proceso</option>
                <option value="Listo" {{ $trabajo->estado == 'Listo' ? 'selected' : '' }}>Listo</option>
                <option value="Entregado" {{ $trabajo->estado == 'Entregado' ? 'selected' : '' }}>Entregado</option>
            </select>
        </div>

        <a href="{{ route('trabajos.index') }}" class="btn btn-secondary">
            Cancelar
        </a>

        <button type="submit" class="btn btn-primary">
            Actualizar
        </button>
    </form>

@endsection
