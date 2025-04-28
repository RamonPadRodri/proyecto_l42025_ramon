@extends('layouts.plantilla')

@section('titulo', isset($jugador) ? 'Editar Jugador' : 'Crear Jugador')

@section('contenido')

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="card shadow-lg border-0 rounded-4 border-top border-4 border-primary" style="background-color: #eef7ff;">
                    <div class="card-body p-5">

                        <h2 class="text-center mb-4 fw-bold text-primary">
                            @isset($jugador)
                                Editar Jugador
                            @else
                                Crear Jugador
                            @endisset
                        </h2>

                        @if($errors->any())
                            <div class="alert alert-warning rounded-3 shadow-sm">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="post" action="{{ isset($jugador) ? route('jugadores.update', $jugador->id) : route('jugadores.store') }}">
                            @csrf
                            @isset($jugador)
                                @method('PUT')
                            @endisset

                            <div class="mb-3">
                                <label for="nombre" class="form-label fw-semibold text-primary">Nombre del Jugador</label>
                                <input type="text"
                                       class="form-control rounded-pill"
                                       id="nombre"
                                       name="nombre"
                                       placeholder="Ej: Luis Pérez"
                                       value="{{ old('nombre', $jugador->nombre ?? '') }}"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label for="codigo" class="form-label fw-semibold text-primary">Código del Jugador</label>
                                <div class="input-group rounded-pill overflow-hidden">
                                    <span class="input-group-text bg-primary text-white">JUG-</span>
                                    <input type="text"
                                           class="form-control"
                                           id="codigo"
                                           name="codigo"
                                           placeholder="123"
                                           maxlength="3"
                                           pattern="\d{3}"
                                           title="Debe ser un número de 3 dígitos"
                                           value="{{ old('codigo', isset($jugador) ? substr($jugador->codigo, 4) : '') }}"
                                           required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="posicion" class="form-label fw-semibold text-primary">Posición</label>
                                <select class="form-select rounded-pill" id="posicion" name="posicion" required>
                                    <option value="" disabled {{ old('posicion', $jugador->posicion ?? '') ? '' : 'selected' }}>Seleccione una posición</option>
                                    <option value="Portero" {{ old('posicion', $jugador->posicion ?? '') == 'Portero' ? 'selected' : '' }}>Portero</option>
                                    <option value="Defensa" {{ old('posicion', $jugador->posicion ?? '') == 'Defensa' ? 'selected' : '' }}>Defensa</option>
                                    <option value="Centrocampista" {{ old('posicion', $jugador->posicion ?? '') == 'Centrocampista' ? 'selected' : '' }}>Centrocampista</option>
                                    <option value="Delantero" {{ old('posicion', $jugador->posicion ?? '') == 'Delantero' ? 'selected' : '' }}>Delantero</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="edad" class="form-label fw-semibold text-primary">Edad</label>
                                <input type="number"
                                       class="form-control rounded-pill"
                                       id="edad"
                                       name="edad"
                                       placeholder="Ej: 25"
                                       min="15" max="50"
                                       value="{{ old('edad', $jugador->edad ?? '') }}"
                                       required>
                            </div>

                            <div class="mb-4">
                                <label for="pais" class="form-label fw-semibold text-primary">País</label>
                                <input type="text"
                                       class="form-control rounded-pill"
                                       id="pais"
                                       name="pais"
                                       placeholder="Ej: Honduras"
                                       value="{{ old('pais', $jugador->pais ?? '') }}"
                                       required>
                            </div>

                            <input type="hidden" name="equipo_id" value="{{ $equipo->id }}">

                            <div class="d-flex justify-content-center gap-3">
                                <button type="submit" class="btn btn-success btn-lg rounded-pill px-5 shadow-sm">
                                    <i class="bi bi-save-fill me-2"></i> Guardar
                                </button>
                                <a href="{{ route('jugadores.index', ['equipo_id' => $equipo->id]) }}" class="btn btn-outline-danger btn-lg rounded-pill px-5 shadow-sm">
                                    <i class="bi bi-x-circle-fill me-2"></i> Cancelar
                                </a>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection



