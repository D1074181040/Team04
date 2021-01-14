<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CardsController;
use App\Http\Controllers\ResidentsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('register', [AuthController::class, 'register']);

Route::post('login',  [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function(){
    //查詢所有卡片
    Route::get('cards', [CardsController::class, 'api_cards']);
    //修改指定卡片
    Route::patch('cards', [CardsController::class, 'api_update']);
    //刪除指定卡片
    Route::delete('cards', [CardsController::class, 'api_delete']);
    //查詢所有住戶
    Route::get('residents', [ResidentsController::class, 'api_cards']);
    //修改指定住戶
    Route::patch('residents', [ResidentsController::class, 'api_update']);
    //刪除指定住戶
    Route::delete('residents', [ResidentsController::class, 'api_delete']);
});



