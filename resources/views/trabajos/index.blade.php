@extends('layouts.app')

@section('titulo', 'Trabajos')

@section('contenido')

    <div class="d-flex justify-content-between mb-3">
        <h1>Trabajos</h1>
        <a href="{{ route('trabajos.create') }}" class="btn btn-primary">Nuevo</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Prenda</th>
                <th>Arreglo</th>
                <th>Cliente</th>
                <th>Teléfono</th>
                <th>Estado</th>
                <th>Recepción</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($trabajos as $trabajo)
                <tr>
                    <td>{{ $trabajo->tipo_prenda }}</td>
                    <td>{{ $trabajo->arreglo }}</td>
                    <td>{{ $trabajo->cliente_nombre }}</td>
                    <td>{{ $trabajo->cliente_telefono }}</td>
                    <td>{{ $trabajo->estado }}</td>
                    <td>{{ $trabajo->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('trabajos.edit', $trabajo) }}" class="btn btn-sm btn-warning">
                            Editar
                        </a>

                        <form action="{{ route('trabajos.destroy', $trabajo) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Eliminar trabajo?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
