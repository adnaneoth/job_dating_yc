<?php

use App\Http\Controllers\AnnouncmentController;
use App\Http\Controllers\CompanieController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SkillController;
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

Route::middleware('auth')->group(function () {
    Route::get('/add', [AnnouncmentController::class, 'create'])->name('add');
    Route::post('/annonce', [AnnouncmentController::class, 'store'])->name('store');
    Route::get('/home', function () {
        return view('home');
    })->name('home');
    Route::get('/allannonce', [AnnouncmentController::class, 'index'])->name('afficher');
    Route::delete('/delete/{id}', [AnnouncmentController::class, 'delete'])->name('delete');
    Route::put('/update/{id}', [AnnouncmentController::class, 'update'])->name('update');

    
    Route::get('/companie', [CompanieController::class, 'index'])->name('companie')->middleware('auth');
    Route::get('/addcompanie', [CompanieController::class, 'create'])->name('addcompanie');
    Route::post('/companiestore', [CompanieController::class, 'store'])->name('storecompanie');
    Route::delete('/deletecompanie/{id}', [CompanieController::class, 'destroy'])->name('deletecompanie');
    Route::put('/updatecompanie/{id}', [CompanieController::class, 'update'])->name('updatecompanie');
    

    Route::put('/editprofil/{id}', [ProfilController::class, 'update'])->name('editprofil');
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil')->middleware('auth');


    Route::get('/allskills', [SkillController::class, 'index'])->name('allskills');
    Route::delete('/deleteskill/{id}', [SkillController::class, 'destroy'])->name('deleteskill');
    Route::put('/updateskill/{id}', [SkillController::class, 'update'])->name('updateskill');
    Route::get('/addskill', [SkillController::class, 'create'])->name('addskill');
    Route::post('/storeskill', [SkillController::class, 'store'])->name('storeskill');


    Route::post('/apply', [AnnouncmentController::class, 'apply'])->name('apply');
    Route::post('/remove', [AnnouncmentController::class, 'remove'])->name('remove');

});


 












Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
