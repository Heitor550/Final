<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Rota para a lista de eventos ou página inicial
Route::get('/', [EventController::class, "index"]);

Route::get('/maintenance-events', [MaintenanceController::class, 'getEvents']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

// Rota para criar um novo evento
Route::get('/events/create', [EventController::class, "create"]);

// Rota para mostrar detalhes de um evento específico com um nome definido
Route::get('/events/{id}', [EventController::class, "show"])->name('events.show');

// Rota para armazenar um novo evento
Route::post("/events", [EventController::class, "store"]);

Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Rotas para Equipamentos
Route::resource('equipamentos', EquipamentoController::class);

Route::patch('/events/{event}/finish', [EventController::class, 'finish'])->name('events.finish');

Route::get('/events/search', [EventController::class, 'search'])->name('events.search');

// Rotas para Events (como resource)
Route::resource('events', EventController::class);

// Rota para a página de contato
Route::get('/contact', function () {
    return view('contact');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
