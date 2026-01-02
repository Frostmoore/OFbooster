<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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
