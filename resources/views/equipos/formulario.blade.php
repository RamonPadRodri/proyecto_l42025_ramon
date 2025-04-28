@extends('layouts.plantilla')

@section('titulo', isset($equipo) ? 'Editar Equipo' : 'Crear Equipo')

@section('contenido')

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="card shadow-lg border-0 rounded-4 border-top border-4 border-danger" style="background-color: #fff7f0;">
                    <div class="card-body p-5">

                        <h2 class="text-center mb-4 fw-bold text-danger">
                            @isset($equipo)
                                Editar Equipo
                            @else
                                Crear Equipo
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

                        <form method="post" action="{{ isset($equipo) ? route('equipos.update', $equipo->id) : route('equipos.store') }}">
                            @csrf
                            @isset($equipo)
                                @method('PUT')
                            @endisset

                            <div class="mb-3">
                                <label for="nombre" class="form-label fw-semibold text-primary">Nombre del Equipo</label>
                                <input type="text"
                                       class="form-control rounded-pill"
                                       id="nombre"
                                       name="nombre"
                                       placeholder="Ej: Real Danlí"
                                       value="{{ old('nombre', $equipo->nombre ?? '') }}"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label for="siglas" class="form-label fw-semibold text-primary">Siglas</label>
                                <input type="text"
                                       class="form-control rounded-pill"
                                       id="siglas"
                                       name="siglas"
                                       placeholder="Ej: RDA"
                                       maxlength="5"
                                       value="{{ old('siglas', $equipo->siglas ?? '') }}"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label for="ciudad" class="form-label fw-semibold text-primary">Ciudad</label>
                                <input type="text"
                                       class="form-control rounded-pill"
                                       id="ciudad"
                                       name="ciudad"
                                       placeholder="Ej: Danlí"
                                       value="{{ old('ciudad', $equipo->ciudad ?? '') }}"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label for="pais" class="form-label fw-semibold text-primary">País</label>
                                <input type="text"
                                       class="form-control rounded-pill"
                                       id="pais"
                                       name="pais"
                                       placeholder="Ej: Honduras"
                                       value="{{ old('pais', $equipo->pais ?? '') }}"
                                       required>
                            </div>

                            <div class="mb-4">
                                <label for="anioFundacion" class="form-label fw-semibold text-primary">Año de Fundación</label>
                                <input type="number"
                                       class="form-control rounded-pill"
                                       id="anioFundacion"
                                       name="anioFundacion"
                                       placeholder="Ej: 1998"
                                       min="1800" max="{{ date('Y') }}"
                                       value="{{ old('anioFundacion', $equipo->anioFundacion ?? '') }}"
                                       required>
                            </div>

                            <div class="d-flex justify-content-center gap-3">
                                <button type="submit" class="btn btn-success btn-lg rounded-pill px-5 shadow-sm">
                                    <i class="bi bi-save-fill me-2"></i> Guardar
                                </button>
                                <a href="{{ route('equipos.index') }}" class="btn btn-outline-danger btn-lg rounded-pill px-5 shadow-sm">
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



