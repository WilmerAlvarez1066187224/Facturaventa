<?php
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FacturaController;


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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::controller(App\Http\Controllers\ClienteController::class)->group(function () {
    Route::get('/cliente','index')->name('cliente.index');
    Route::get('/add-cliente','create')->name('cliente.create');
    Route::post('/clientes', 'store')->name('cliente.store');
    Route::get('/edit-cliente/{cliente}','edit')->name('cliente.edit');
    Route::delete('/cliente/{cliente}', [ClienteController::class, 'destroy'])->name('cliente.delete');


        

});

Route::controller(App\Http\Controllers\FacturaController::class)->group(function () {
    Route::get('/factura','index')->name('factura.index');
    Route::get('/add-factura','create')->name('factura.create');
});
