<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function (){
    return view('welcome_page');
})->name('welcome_page');

// Route::get('/request-page', function () {
//     return view('request_page');
// })->middleware(['auth', 'verified'])->name('request-page');

// Route::get('/accept-page', function () {
//     return view('accept_page');
// })->middleware(['auth', 'verified'])->name('request-page');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // request 
    Route::get('/request-page', [RequestController::class,'request_page'])->name('request-page');
    Route::post('/request_register',[RequestController::class,'request_register'])->name('request_register');
});

require __DIR__.'/auth.php';
