<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnimalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/dashboard', [AnimalController::class, 'listarAnimales'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Este middleware es para comporbar si alguien es admin
Route::middleware(['auth', 'admin'])->group(function () {
    //Ruta en la que solo si un usuario es admin, le sale la vista del crud de los usuarios
    Route::match(['get', 'post'], '/admin/dashboard', [AdminController::class, 'dashboard'])->name('crud_usuarios');
});

require __DIR__.'/auth.php';
