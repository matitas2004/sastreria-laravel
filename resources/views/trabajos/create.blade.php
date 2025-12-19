@extends('layouts.app')

@section('titulo', 'Nuevo Trabajo')

@section('contenido')

    <h1>Registrar Trabajo</h1>

    <form action="{{ route('trabajos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Tipo de prenda *</label>
            <input type="text" name="tipo_prenda" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Arreglo a realizar *</label>
            <input type="text" name="arreglo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nombre del cliente *</label>
            <input type="text" name="cliente_nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Teléfono *</label>
            <input type="text" name="cliente_telefono" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Estado *</label>
            <select name="estado" class="form-select" required>
                <option value="">Seleccione...</option>
                <option value="Recibido">Recibido</option>
                <option value="En proceso">En proceso</option>
                <option value="Listo">Listo</option>
                <option value="Entregado">Entregado</option>
            </select>
        </div>

        <a href="{{ route('trabajos.index') }}" class="btn btn-secondary">
            Cancelar
        </a>

        <button type="submit" class="btn btn-primary">
            Guardar
        </button>
    </form>

@endsection
