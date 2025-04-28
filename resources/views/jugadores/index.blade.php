@extends('layouts.plantilla')

@section('titulo', 'Lista de Jugadores')

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
        <div class="card shadow-lg rounded-4 border-0" style="background: linear-gradient(145deg, #f0f9ff, #ffffff);">
            <div class="card-body p-4">

                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold text-primary">
                        <i class="bi bi-people-fill me-2"></i> Jugadores de {{ $equipo->nombre }}
                    </h1>
                    <a href="{{ route('jugadores.create', ['equipo_id' => $equipo->id]) }}" class="btn btn-primary btn-lg rounded-pill shadow-sm px-4">
                        <i class="bi bi-plus-circle-dotted me-2"></i> Nuevo Jugador
                    </a>
                </div>

                <!-- Tabla de Jugadores -->
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">
                        <thead class="table-primary">
                        <tr class="text-uppercase">
                            <th>Nombre</th>
                            <th>Código</th>
                            <th>Posición</th>
                            <th>Edad</th>
                            <th>País</th>
                            <th>Equipo</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($jugadores as $jugador)
                            <tr>
                                <td class="fw-bold text-primary">{{ $jugador->nombre }}</td>
                                <td>{{ $jugador->codigo }}</td>
                                <td>{{ $jugador->posicion }}</td>
                                <td>{{ $jugador->edad }}</td>
                                <td>{{ $jugador->pais }}</td>
                                <td>{{ $jugador->equipo->nombre ?? 'Sin equipo' }}</td>

                                <td>
                                    <div class="d-flex flex-wrap justify-content-center gap-2">
                                        <a href="{{ route('jugadores.edit', $jugador->id) }}" class="btn btn-outline-warning btn-sm rounded-pill px-3">
                                            <i class="bi bi-pencil-fill me-1"></i> Editar
                                        </a>
                                        <button type="button" class="btn btn-outline-danger btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalEliminar_{{ $jugador->id }}">
                                            <i class="bi bi-trash-fill me-1"></i> Eliminar
                                        </button>
                                    </div>

                                    <!-- Modal Eliminar -->
                                    <div class="modal fade" id="modalEliminar_{{ $jugador->id }}" tabindex="-1" aria-labelledby="modalLabelEliminar_{{ $jugador->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content rounded-4 shadow">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title" id="modalLabelEliminar_{{ $jugador->id }}">
                                                        <i class="bi bi-exclamation-triangle-fill me-2"></i> Confirmar Eliminación
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @if($jugador->equipo_id)
                                                        <p class="text-danger"><strong>Este jugador está asociado a un equipo.</strong></p>
                                                    @endif
                                                    <p>¿Deseas eliminar al jugador <strong>{{ $jugador->nombre }}</strong>?</p>
                                                    <small class="text-muted">Esta acción no se puede deshacer.</small>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <form action="{{ route('jugadores.destroy', $jugador->id) }}" method="POST">
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
                                <td colspan="7" class="text-muted py-4">No hay jugadores registrados para este equipo aún.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $jugadores->appends(['equipo_id' => $equipo->id])->links() }}
                </div>

            </div>
        </div>

        <!-- Botón de Regreso -->
        <div class="mt-5 text-center">
            <a href="{{ route('equipos.index') }}" class="btn btn-outline-primary btn-lg rounded-pill shadow-sm px-5">
                <i class="bi bi-arrow-left-circle-fill me-2"></i> Volver a Equipos
            </a>
        </div>

    </div>

@endsection


