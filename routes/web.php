<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Models\Request;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/verify-account',[HomeController::class,'verifyaccount'])->name('verifyaccount');
Route::post('/verityotp',[HomeController::class,'useractivication'])->name('verifyotp');

Route::middleware(['guest'])->group(function () {
    Route::get('/', function (){
        return view('welcome_page');
    })->name('welcome_page');
});

// accept
Route::middleware(['auth'])->group(function () {
    Route::get('/accept_page', function () {
        $userId = Auth::user()->id;
        $job_id = Request::where('user_id',$userId)->first();
        return view('accept_page',compact('job_id'));
    })->name('accept_page');
});

Route::middleware('auth', 'verified')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // request
    Route::get('/request-page', [RequestController::class,'request_page'])->name('request-page');
    Route::post('/request_register',[RequestController::class,'request_register'])->name('request_register');
    Route::post('/get_color',[RequestController::class,'get_color'])->name('get.color');

});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
