<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\ContactSubmissionsController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/servizi', function () {
    return view('servizi');
})->name('servizi');

Route::get('/contatti', function () {
    return view('contatti');
})->name('contatti');

Route::post('/contatti', [ContactController::class, 'send'])->name('contatti.send');
Route::view('/cookie-policy', 'cookie-policy')->name('cookie-policy');

Route::prefix('_admin/contatti')->group(function () {
    Route::get('login', [ContactSubmissionsController::class, 'login'])->name('admin.contatti.login');
    Route::post('login', [ContactSubmissionsController::class, 'doLogin'])->name('admin.contatti.doLogin');
    Route::post('logout', [ContactSubmissionsController::class, 'logout'])->name('admin.contatti.logout');

    Route::get('/', [ContactSubmissionsController::class, 'index'])
        ->middleware('contact.submissions')
        ->name('admin.contatti.index');
});