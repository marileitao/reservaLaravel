<?php

use App\Http\Controllers\ProfileController;
use App\Mail\ReservaCriada;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('reservas.index');
})->middleware(['auth', 'verified'])->name('reservas');

Route::get('/email', function (){
    return new ReservaCriada(
        'Aniversário da Mariane',
        5,
        '10/01/2025',
        '20:00',
    );
});

require __DIR__.'/auth.php';

