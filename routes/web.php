<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardsController;
use App\Http\Controllers\ResidentsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web
 routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function (){
    return view('welcome');
});

Route::get('cards/create', [CardsController::class,'create'])->name('cards.create');
Route::get('cards/{id}', [CardsController::class,'show'] )->where('id','[0-9]+')->name('cards.show');
Route::get('cards/{id}/edit', [CardsController::class,'edit'])->where('id','[0-9]+')->name('cards.edit');
Route::get('cards', [CardsController::class,'index'])->name('cards.index');
Route::post('cards/store',[CardsController::class,'store'])->name('cards.store');
Route::patch('cards/update/{id}',[CardsController::class,'update'])->where('id','[0-9]+')->name('cards.update');
Route::delete('cards/delete/{id}',[CardsController::class,'destroy'])->where('id','[0-9]+')->name('cards.destroy');
Route::get('cards/enter',[CardsController::class,'enter'])->where('id','[0-9]+')->name('cards.enter');


Route::get('residents/create',[ResidentsController::class,'create'])->name('residents.create');
Route::get('residents/{id}', [ResidentsController::class,'show'])->where('id','[0-9]+')->name('residents.show');
Route::get('residents/{id}/edit', [ResidentsController::class,'edit'])->where('id','[0-9]+')->name('residents.edit');
Route::get('residents',[ResidentsController::class,'index'])->name('residents.index');
Route::post('residents/store',[ResidentsController::class,'store'])->name('residents.store');
Route::patch('residents/update/{id}',[ResidentsController::class,'update'])->where('id','[0-9]+')->name('residents.update');
Route::delete('residents/delete/{id}',[ResidentsController::class,'destroy'])->where('id','[0-9]+')->name('residents.destroy');
Route::get('residents/male',[ResidentsController::class,'male'])->name('residents.male');
Route::get('residents/female',[ResidentsController::class,'female'])->name('residents.female');
Route::post('residents/region',[ResidentsController::class,'region'])->name('residents.region');
Route::get('/getCSRFToken',function() { return csrf_toker(); });
