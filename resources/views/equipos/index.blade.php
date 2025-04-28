@extends('layouts.plantilla')

@section('titulo', 'Lista de Equipos')

@section('contenido')

    <div class="container py-5">



        <!-- Mensaje de Éxito -->
        @if(session()->has('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif

        <!-- Card Principal -->
        <div class="card shadow-lg rounded-4 border-0" style="background: linear-gradient(145deg, #f0f8ff, #ffffff);">
            <div class="card-body p-4">

                <!-- Header de la Página -->
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold text-primary">
                        <i class="bi bi-trophy-fill me-2"></i> Equipos Registrados
                    </h1>
                    <a href="{{ route('equipos.create') }}" class="btn btn-primary btn-lg rounded-pill shadow-sm px-4">
                        <i class="bi bi-plus-circle-dotted me-2"></i> Nuevo Equipo
                    </a>
                </div>

                <!-- Tabla de Equipos -->
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">
                        <thead class="table-primary">
                        <tr class="text-uppercase">
                            <th>Nombre</th>
                            <th>Siglas</th>
                            <th>Ciudad</th>
                            <th>País</th>
                            <th>Año</th>
                            <th>Fundador</th>
                            <th>Jugadores</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($equipos as $equipo)
                            <tr class="align-middle">
                                <td class="fw-bold text-primary">{{ $equipo->nombre }}</td>
                                <td>{{ $equipo->siglas }}</td>
                                <td>{{ $equipo->ciudad }}</td>
                                <td>{{ $equipo->pais }}</td>
                                <td>{{ $equipo->anioFundacion }}</td>
                                <td class="text-success">{{ $equipo->user->name ?? 'Sin Fundador' }}</td>
                                <td>
                                    <a href="{{ route('jugadores.index', ['equipo_id' => $equipo->id]) }}" class="btn btn-outline-info btn-sm rounded-pill px-3">
                                        <i class="bi bi-people-fill me-1"></i> Ver Jugadores
                                    </a>
                                </td>
                                <td>
                                    <div class="d-flex flex-wrap justify-content-center gap-2">
                                        <a href="{{ route('equipos.show', $equipo->id) }}" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                                            <i class="bi bi-eye-fill me-1"></i> Ver
                                        </a>
                                        <a href="{{ route('equipos.edit', $equipo->id) }}" class="btn btn-outline-warning btn-sm rounded-pill px-3">
                                            <i class="bi bi-pencil-square me-1"></i> Editar
                                        </a>
                                        <button type="button" class="btn btn-outline-danger btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalEliminar_{{ $equipo->id }}">
                                            <i class="bi bi-trash-fill me-1"></i> Borrar
                                        </button>
                                    </div>

                                    <!-- Modal Eliminar -->
                                    <div class="modal fade" id="modalEliminar_{{ $equipo->id }}" tabindex="-1" aria-labelledby="modalLabelEliminar_{{ $equipo->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content rounded-4 shadow">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title" id="modalLabelEliminar_{{ $equipo->id }}">
                                                        <i class="bi bi-exclamation-triangle-fill me-2"></i> Confirmar Eliminación
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Estás seguro de eliminar el equipo <strong>{{ $equipo->nombre }}</strong>?
                                                    <br><small class="text-muted">Esta acción no se puede deshacer.</small>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <form action="{{ route('equipos.destroy', $equipo->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Sí, Eliminar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-muted py-4">No hay equipos registrados todavía.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $equipos->links() }}
                </div>

            </div>
        </div>

    </div>

@endsection




