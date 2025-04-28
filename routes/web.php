<?php

use App\Http\Controllers\EquipoController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::controller(EquipoController::class)->group(function () {
        Route::get('/equipos', 'index')->name('equipos.index');
        Route::get('/equipos/{id}', 'show')->name('equipos.show')->whereNumber('id');
        //RUTA DEL FORMULARIO
        Route::get('/equipos/crear', 'create')->name('equipos.create');

        //RUTA PARA RECIBIR LOS DATOS DEL FORMULARIO (RUTA POST)
        Route::post('/equipos/crear', 'store')->name('equipos.store');

        //RUTA PARA EDITAR EN EL FORMULARIO
        Route::get('/equipos/{id}/editar', 'edit')->name('equipos.edit')->whereNumber('id');
        //RUTA PARA ACTUALIZAR LOS DATOS EDITADOS (RUTA PUT)
        Route::put('/equipos/{id}/editar', 'update')->name('equipos.update')->whereNumber('id');
        //RUTA PARA ELIMINAR (RUTA DELETE)
        Route::delete('/equipos/{id}/eliminar', 'destroy')->name('equipos.destroy')->whereNumber('id');

    });

    Route::controller(JugadorController::class)->group(function () {
        // Listar jugadores (todos o por equipo si se pasa equipo_id)
        Route::get('/jugadores', 'index')->name('jugadores.index');

        // Formulario para crear jugador
        Route::get('/jugadores/crear/{equipo_id}', 'create')->name('jugadores.create');

        // Guardar nuevo jugador (POST)
        Route::post('/jugadores', 'store')->name('jugadores.store');

        // Formulario para editar jugador
        Route::get('/jugadores/{id}/editar', 'edit')->name('jugadores.edit')->whereNumber('id');

        // Actualizar jugador (PUT)
        Route::put('/jugadores/{id}/editar', 'update')->name('jugadores.update')->whereNumber('id');

        // Eliminar jugador (DELETE)
        Route::delete('/jugadores/{id}/eliminar', 'destroy')->name('jugadores.destroy')->whereNumber('id');
    });
});

require __DIR__.'/auth.php';
