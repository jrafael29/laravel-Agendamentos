<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// auth


Route::controller(App\Http\Controllers\Painel\Auth\AuthController::class)->group(function(){
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/login', 'loginAttempt')->name('loginAttempt');

    Route::get('/registro', 'registro')->name('registro')->middleware('guest');
    Route::post('/registro', 'registroAttempt')->name('registroAttempt');

    Route::get('/logout', 'logout')->name('logout')->middleware('auth');
});



Route::controller(App\Http\Controllers\Site\EventosController::class)->group(function(){
    Route::post('/agendarevento', 'agendarEvento')->name('agendar');
    Route::get('/agendarevento', function(){ return redirect()->route('index');});
});

Route::controller(App\Http\Controllers\Site\SiteController::class)->group(function(){
    Route::get('/', 'index')->name('index');
});

Route::prefix('/painel')->group(function(){
    Route::get('/', [App\Http\Controllers\Painel\PainelController::class, 'index'])->name('painelIndex');    

    Route::controller(App\Http\Controllers\Painel\EventoManagerController::class)->group(function(){
        Route::get('/eventos', 'index')->middleware('auth')->name('eventosManager');
        Route::post('/eventos/{id}/aprove', 'aprovarEvento')->name('aprovarEvento');
        Route::delete('/eventos/{id}', 'deletarEvento')->name('deletarEvento');


        Route::get('/eventos/filtrar-pendentes', 'filtrarPendentes')->name('filtrarPendentes');
        Route::get('/eventos/filtrar-aprovados', 'filtrarAprovados')->name('filtrarAprovados');


        // servicos
        Route::get('/eventos/filtrar-servicosZa', 'filtrarServicosDesc')->name('filtrarServicosDesc');
        Route::get('/eventos/filtrar-servicosAz', 'filtrarServicosAsc')->name('filtrarServicosAsc');

        //clientes
        Route::get('/eventos/filtrar-clientesZa', 'filtrarClientesDesc')->name('filtrarClientesDesc');
        Route::get('/eventos/filtrar-clientesAz', 'filtrarClientesAsc')->name('filtrarClientesAsc');

    });

    Route::resource('service', App\Http\Controllers\Painel\ServiceController::class);
});