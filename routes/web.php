<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnimalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Api\AuthController;




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

//Ruta del api service
Route::get('/dashboard', [AnimalController::class, 'listarAnimales'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/admin/dashboard-admin', [UserController::class, 'listarUsuarios'])->middleware(['auth', 'admin','verified'])->name('dashboard-admin');




Route::middleware(['auth','verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/animal', [AnimalController::class, 'animalAdoptado'])->name('adoptar.animal');
    Route::post('/dashboard', [AnimalController::class, 'listarAnimales'])->name('dashboard');

});

//Este middleware es para comporbar si alguien es admin, y todas las rutas funcionan solo para el usuario administrador
Route::middleware(['auth', 'admin', 'verified'])->group(function () {
    Route::match(['get', 'post'], '/admin/dashboard', [AdminController::class, 'dashboard'])->name('crud_usuarios');
    Route::post('/dashboard', [AdminController::class, 'redirectDashboard'])->name('dashboard');
    Route::resource('animales', AnimalController::class);
    Route::resource('usuarios', UserController::class);
    Route::resource('admin', AdminController::class);
    Route::post('/dashboard', [AnimalController::class, 'listarAnimales'])->name('dashboard');
    Route::post('/registroAnimal', [AnimalController::class, 'store'])->name('registroAnimal');
    Route::post('/crearusuario', [AdminController::class, 'redirigirCrearUsuario'])->name('crearusuario');
    Route::put('/editanimal/{id}', [AnimalController::class, 'edit'])->name('editarAnimal');
    Route::put('/editausuario/{id}', [UserController::class, 'edit'])->name('editarUsuario');
});


require __DIR__.'/auth.php';
