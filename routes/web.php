<?php

use App\Http\Controllers\ContactCreateController;
use App\Http\Controllers\ContactList;
use App\Http\Controllers\ContactShowController;
use App\Http\Controllers\ContactUpdateController;
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

Route::get('/', ContactList::class)->name('contacts.index');

Route::prefix('contacts')->middleware('auth')->group(function () {
    Route::post('/create', ContactCreateController::class)->name('contact.store');
    Route::get('/{contact}', ContactShowController::class)->name('contact.show');
    Route::post('/{contact}/update', ContactUpdateController::class)->name('contact.update');
});

require __DIR__.'/auth.php';
