<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuotesController;

Route::get('/', function () {
  return view('welcome');
});

Route::post('/quotes', [QuotesController::class, 'store']); //form
Route::get('/quotes', [QuotesController::class, 'index']);
Route::get('/quotes/create', [QuotesController::class, 'create']); //form
Route::get('/quotes/randome', [QuotesController::class, 'randQuote']);
Route::post('/quotes/delete',  [QuotesController::class, 'deleteQuote']);
Route::get('/quotes/{quoteid}', action: [QuotesController::class, 'showQuote'])->name('quote.id');
Route::put('/quotes/{quoteid}', action: [QuotesController::class, 'updateQuote']);
Route::get('/quotes/{quoteid}/edit', action: [QuotesController::class, 'editQuote'])->name('quote.edit');