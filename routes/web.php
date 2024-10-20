<?php

use App\Http\Controllers\FalloController;
use App\Http\Controllers\ProfileController;
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
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');
});
/** 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
 */

Route::post('/corrector', [\App\Http\Controllers\CorrectorController::class, 'corregir'])->name('corrector');
Route::get('/test', [App\Http\Controllers\TestPorCateriasController::class, 'index'])->name('test');
Route::post('/preguntastema', [App\Http\Controllers\PreguntaController::class, 'showByBloque'])->name('preguntastema');
Route::post('/preguntastema', [App\Http\Controllers\PreguntaController::class, 'showByBloque'])->name('preguntastema');

Route::post('/preguntas', [App\Http\Controllers\PreguntaController::class, 'showByCategory'])->name('preguntas');
Route::post('/preguntasgeneral', [App\Http\Controllers\PreguntaController::class, 'general'])->name('preguntasgeneral');



Route::post('/guardar-fallos', [FalloController::class, 'guardarFallos'])->name('guardarFallos');


Route::get('/fallos', [FalloController::class, 'index'])
    ->middleware('auth')
    ->name('fallos.index');

require __DIR__ . '/auth.php';
