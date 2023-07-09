<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileControllerAdmin;

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

    //Route::resource('products', ProductController::class);
});

Route::middleware('auth')->group(function () {

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/profile-admin', [ProfileControllerAdmin::class, 'edit'])->name('profile.edit');
        Route::patch('/profile-admin', [ProfileControllerAdmin::class, 'update'])->name('profile.update');
        Route::delete('/profile-admin', [ProfileControllerAdmin::class, 'destroy'])->name('profile.destroy');
    
        Route::get('/dashboard', [HomeController::class, 'adminDash']) -> name('dashboard')->middleware('admin');

        Route::post('/products/{product:slug}/restore', [ProductController::class, 'restore'])->name('products.restore')->withTrashed();

        Route::resource('products', ProductController::class)->withTrashed(['show','edit','update','destroy']);
    });
});

Route::get('/home', [HomeController::class, 'index']) -> name('home');

require __DIR__.'/auth.php';
