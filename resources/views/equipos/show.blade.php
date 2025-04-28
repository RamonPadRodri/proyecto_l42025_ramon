@extends('layouts.plantilla')

@section('titulo', 'Detalles del Equipo')

@section('contenido')

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card shadow-lg border-0 rounded-4 overflow-hidden" style="background: linear-gradient(135deg, #dff6ff, #ffffff);">
                    <div class="row g-0">

                        <!-- Lado Izquierdo: Imagen o Icono -->
                        <div class="col-md-4 d-flex flex-column align-items-center justify-content-center bg-primary text-white p-4">
                            <div class="display-1 mb-3">
                                ⚽
                            </div>
                            <h3 class="fw-bold text-center">{{ $equipo->nombre }}</h3>
                            <span class="badge bg-light text-primary fs-6 mt-2">{{ $equipo->siglas }}</span>
                        </div>

                        <!-- Lado Derecho: Información -->
                        <div class="col-md-8">
                            <div class="card-body p-5">

                                <h2 class="fw-bold mb-4 text-primary text-center">
                                    Información del Equipo
                                </h2>

                                <div class="row mb-3">
                                    <div class="col-6 mb-3">
                                        <h6 class="text-muted">Ciudad:</h6>
                                        <p class="fw-semibold">{{ $equipo->ciudad }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6 class="text-muted">País:</h6>
                                        <p class="fw-semibold">{{ $equipo->pais }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6 class="text-muted">Año de Fundación:</h6>
                                        <p class="fw-semibold">{{ $equipo->anioFundacion }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6 class="text-muted">Creador:</h6>
                                        <p class="fw-semibold">{{ $equipo->user->name }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6 class="text-muted">Creado:</h6>
                                        <p class="fw-semibold">{{ $equipo->created_at->diffForHumans() }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6 class="text-muted">Actualizado:</h6>
                                        <p class="fw-semibold">{{ $equipo->updated_at->diffForHumans() }}</p>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center mt-4">
                                    <a href="{{ route('equipos.index') }}" class="btn btn-outline-primary btn-lg rounded-pill px-5">
                                        <i class="bi bi-arrow-left-circle me-2"></i> Volver a Equipos
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

