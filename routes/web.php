<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Auth/Login');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/{user:username}/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/{user:username}/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('contacts')->group(function () {
        Route::get('/contacts-list', [ContactController::class, 'index'])->name('contacts.list');

        Route::get('/create-contact', function () {
            return Inertia::render('Contacts/ContactCreate');
        })->name('contact.create');

        Route::post('/create-contact', [ContactController::class, 'store'])->name('contact.store');

        Route::get('/{contact}/edit', [ContactController::class, 'edit'])->name('contact.edit');
        Route::post('/{contact}/edit', [ContactController::class, 'update'])->name('contact.update');

        Route::delete('/{contact}/delete', [ContactController::class, 'destroy'])->name('contact.destroy');
    });
});


require __DIR__ . '/auth.php';
