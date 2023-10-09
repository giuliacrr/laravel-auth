<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\PostController;
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
    return view('guest.welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //READ
    Route::get('/projects/{slug}', [ProjectController::class, "show"])->name("projects.show"); //Dettagli di un Elemento
    Route::get('/projects', [ProjectController::class, "index"])->name("projects.index"); //Anteprima dei progetti
    
    //CREATE //CHIEDI A FLORIAN COSA E COME E PERCHé
    Route::get("/admin/projects/create", [ProjectController::class, "create"])->name("projects.create");//Indirizza ad una pagina con form per inserire i dati del progetto;
    Route::post("/projects", [ProjectController::class, "store"])->name("projects.store");//Rotta di dove verranno inviati i dati. Essa è in POST. 
});





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
