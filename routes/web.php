<?php

use App\Http\Controllers\AnnouncmentController;
use App\Http\Controllers\CompanieController;
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

Route::get('/', [AnnouncmentController::class, 'indexH'])->name('afficherH');

Route::middleware('auth')->group(function(){
    Route::get('/add', [AnnouncmentController::class, 'create'])->name('add');
    Route::post('/annonce', [AnnouncmentController::class, 'store'])->name('store');
    Route::get('/home', function(){return view('home');})->name('home');
    Route::get('/allannonce', [AnnouncmentController::class, 'index'])->name('afficher');
    Route::delete('/delete/{id}',[AnnouncmentController::class,'delete'])->name('delete');
    Route::put('/update/{id}', [AnnouncmentController::class, 'update'])->name('update');


    Route::get('/companie', [CompanieController::class, 'index'])->name('companie')->middleware('auth');
Route::get('/addcompanie', [CompanieController::class, 'create'])->name('addcompanie');
Route::post('/companiestore', [CompanieController::class, 'store'])->name('storecompanie');
Route::delete('/deletecompanie/{id}',[CompanieController::class,'destroy'])->name('deletecompanie');
Route::put('/updatecompanie/{id}', [CompanieController::class, 'update'])->name('updatecompanie');

});














Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
