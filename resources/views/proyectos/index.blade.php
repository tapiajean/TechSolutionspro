@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Listado de Proyectos</h2>
        <a href="{{ route('proyectos.create') }}" class="btn btn-primary">Nuevo Proyecto</a>
    </div>
    @if($ufActual)
    <div class="alert alert-info d-flex justify-content-between align-items-center">
        <span><strong>Indicador economico del dia :</strong>unidad de fomento(UF)</span>
        <span class="badge bg-dark fs-6">${{ number_format($ufActual,2, ', ' , ' . ')}}</span>
    </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha de Inicio</th>
                    <th>Estado</th>
                    <th>Responsable</th>
                    <th>Monto</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($proyectos as $proyecto)
                    <tr>
                        <td>{{ $proyecto->id }}</td>
                        <td>{{ $proyecto->nombre }}</td>
                        <td>{{ $proyecto->fecha_inicio }}</td>
                        <td>
                            <span class="badge bg-info text-dark">{{ $proyecto->estado }}</span>
                        </td>
                        <td>{{ $proyecto->responsable }}</td>
                        <td>${{ number_format($proyecto->monto, 2, ',', '.') }}</td>
                        <td class="text-center">
                            <a href="{{ route('proyectos.edit', $proyecto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            
                            <form action="{{ route('proyectos.destroy', $proyecto->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este proyecto?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">No hay proyectos registrados todavía.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

