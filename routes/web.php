<?php
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;



Route::get('/',          [PortfolioController::class, 'home'])     ->name('home');
Route::get('/about',     [PortfolioController::class, 'about'])    ->name('about');
Route::get('/Biodata',  [PortfolioController::class, 'Biodata']) ->name('Biodata');
Route::get('/Hobi',  [PortfolioController::class, 'Hobby']) ->name('Hobby');
Route::get('/contact',   [PortfolioController::class, 'contact'])  ->name('contact');


Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

