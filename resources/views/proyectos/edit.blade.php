


@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Editar Proyecto</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('proyectos.update', $proyecto->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Proyecto</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $proyecto->nombre) }}" required>
        </div>

        <div class="mb-3">
            <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ old('fecha_inicio', $proyecto->fecha_inicio) }}" required>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <input type="text" class="form-control" id="estado" name="estado" value="{{ old('estado', $proyecto->estado) }}" required>
        </div>

        <div class="mb-3">
            <label for="responsable" class="form-label">Responsable</label>
            <input type="text" class="form-control" id="responsable" name="responsable" value="{{ old('responsable', $proyecto->responsable) }}" required>
        </div>

        <div class="mb-3">
            <label for="monto" class="form-label">Monto</label>
            <input type="number" step="0.01" class="form-control" id="monto" name="monto" value="{{ old('monto', $proyecto->monto) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Proyecto</button>
        <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection


