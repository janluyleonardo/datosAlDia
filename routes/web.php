<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\CodeController;
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

// Route::get('/', function () { ruta original del welcome
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });

Route::get('/', function () {
    $msj ="";
    return view('students.index', compact('msj'));
});

Route::get('/codeindex', [CodeController::class, 'index'])->name('codeindex');
Route::post('/verifyCode', [CodeController::class, 'verifyCode'])->name('verifyCode');

Route::get('states', [StateController::class, 'index'])->name('states.index');

Route::get('cities', [CityController::class, 'index'])->name('cities.index');

Route::resource('/students', studentController::class);
