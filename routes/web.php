<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Jenssegers\Agent\Facades\Agent;

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

if (!Agent::isMobile()) {
    dd('Please change view go to mobile.');
} else {
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
            Route::get('/contacts-list', function () {
                return Inertia::render('Contacts/Contacts');
            })->name('contacts.list');

            Route::get('/contact/edit', function () {
                return Inertia::render('Contacts/ContactEdit');
            })->name('contact.edit');
        });
    });
}

require __DIR__ . '/auth.php';
